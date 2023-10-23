<?php

namespace App\Http\Controllers;

    use Illuminate\Support\Facades\DB;
    use App\Models\Producto;
    use App\Models\evento;
    use App\Models\pedido;
    use App\Models\Categoria;
    use App\Models\detallepedido;
    use App\Models\detalleEvento;
    use App\Models\User;
    use Illuminate\Support\Facades\Storage; // Importa la clase Storage
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Session;
    
    class Admincontroller extends Controller
    {

        public function pedidos(Request $request)
        {
            $fechaActual = now()->format('Y-m-d');
            $fecha = $request->input('fecha_pedido', $fechaActual);
            $id_estado = $request->input('id_estado');
            
            // Llamamos al modelo Pedido y creamos una instancia
            $pedidoModel = new Pedido();
            
            // Llamamos al método obtenerPedidosPorUsuario y pasamos la fecha y el ID de estado como argumentos
            $pedidos = $pedidoModel->obtenerPedidosPorUsuario(auth()->user()->id, $fecha, $id_estado);
            
            // Enviamos los resultados a la vista
            return view('Usuario.Pedido', ['pedidos' => $pedidos]);
        }    

        public function pedidosA(Request $request)
        {
            $fechaActual = now()->format('Y-m-d');
            $fecha = $request->input('fecha_pedido', $fechaActual);
            $idEstado = $request->input('id_estado');

            $pedido = new Pedido();
            $pedidos = $pedido->listarPedidos($fecha, $idEstado);

          

            

            return view('Admin.Pedidos', ['pedidos' => $pedidos]);
        }

        public function BorraPedidos(Request $request)
        {
             // Borra todos los registros de la tabla de pedidos
             detallepedido::truncate();
             DB::statement('SET FOREIGN_KEY_CHECKS=0');
             Pedido::truncate();
             DB::statement('SET FOREIGN_KEY_CHECKS=1');

            // Opcionalmente, puedes redirigir a una vista o realizar alguna otra acción después de borrar los registros
            return redirect()->route('home.carrito');

        }


        

        public function Addcategoria()
        {
            return view('categorias.create');
        }

        public function agregarCategoria(Request $request)
            {

                
                if ($request->isMethod('post')) {
                   
                    $file = $request->file('image_url');           

                    if($file){
                       
                        // Verificar que el archivo sea una imagen con una extensión válida
                        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];
                        $file_ext = strtolower($file->getClientOriginalExtension());
                    
                        if (!in_array($file_ext, $allowed_exts)) {
                            return "Error: El archivo no es una imagen válida.";
                        }
                    
                        // Guardar el archivo en el almacenamiento de Laravel (public/storage/uploads)
                        $new_file_name = uniqid('', true) . '.' . $file_ext;
                        $file->storeAs('public/uploads', $new_file_name);
                    
                        // Obtener la URL completa de la imagen
                        $image_url = Storage::url('uploads/' . $new_file_name);

                    }else{
                        dd("No hay imagen");
                    }

                    $descripcion = $request->input('descripcion');
                    $estado = $request->input('estado');                    
                    Categoria::agregarCategoria($descripcion, $estado, $image_url);     

                        return redirect()->route('categorias.editar');
                }
               
            }
        public function listUsers()
            {
                $users = User::all();
                return view('Admin.usuarios', ['users' => $users]);
         }
         public function updateRole(Request $request, User $user)
        {
            $user->update(['rol' => $request->role]);
            return redirect()->back();
        }

        public function EditCategorias()
        {   
            $categoria = new Categoria();
            $categorias = $categoria->listarCategorias();
    
            return view('Categorias.editar', ['categorias' => $categorias]);
        }
        
        public function showCategory(Request $request, $id_categoria)
        {
            // Aquí puedes realizar cualquier lógica necesaria para la edición de la categoría
            // Por ejemplo, obtener los datos de la categoría y pasarlos a la vista de edición
            $categoria = Categoria::find($id_categoria);
          
            return view('categorias.show', ['categoria' => $categoria]);
        }
        

        public function cambiarEstadoCategoria(Request $request) {
            $id_categoria = $request->input('id_categoria');
            $estado_actual = $request->input('estado');
            $nuevo_estado = ($estado_actual == 1) ? 2 : 1;
          
            // Llama al método actualizarEstado del modelo Categoria
            $categoria = new Categoria();
            $categoria->actualizarEstado($id_categoria,$estado_actual);
        
            // Redirige al listado de categorías
            return redirect()->route('categorias.editar');
            // Ajusta la ruta según tu estructura
        }
        public function actualizarcategoria(Request $request)
        {
            if ($request->isMethod('post')) {
                $id_producto = $request->input('id_categoria');
                $descripcion = $request->input('descripcion');
                $estado = $request->input('estado');

                // Lógica para modificar la categoría en la base de datos
                Categoria::modificarCategoria($id_producto, $descripcion, $estado);

                // Redirigir al usuario a la página de listado de categorías
                return redirect()->route('categorias.editar');
            }
        }

        function mostrarEstadoCategoria($categoria) {
            $estado = $categoria->estado; // Acceso a la propiedad "estado" del modelo
            $id_categoria = $categoria->id_categoria; // Acceso a la propiedad "id_categoria" del modelo
            $buttonText = ($estado == 1) ? 'Disponible' : 'No Disponible';
            $buttonClass = ($estado == 1) ? 'btn-success' : 'btn-secondary';
            
            $html = '
            <form method="post" action="'.route("cambiarEstado").'">                  
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <input type="hidden" name="id_categoria" value="'.$id_categoria.'">
                <input type="hidden" name="estado" value="'.($estado == 1 ? 2 : 1).'">
                <button type="submit" class="btn '.$buttonClass.'" onclick="mostrarAlerta('.$estado.')">'.$buttonText.'</button>
            </form>
            ';
        
            return $html;
        }        

        public function detallePedido(Request $request)
        {
            $idPedido = $request->input('id_pedido');
            
            $pedido = new Pedido();
            // Obtenemos el pedido por su id usando Eloquent
            $pedidos = $pedido->obtenerPedidoPorId($idPedido);


            // llamamos al modelo DetallePedido y creamos una instancia
            $detallePedido = new DetallePedido();

            // llamamos al método obtenerDetallesPedido y pasamos el id del pedido como argumento
            $detallesPedido = $detallePedido->obtenerDetallesPedido($idPedido);


            // Pasamos los resultados a la vista del detalle del pedido
            return view('Admin.DetallePedido', ['pedidos' => $pedidos, 'detallesPedido' => $detallesPedido]);
        }

        public function detalleEvento(Request $request)
        {
            $idPedido = $request->input('id_pedido');
            
            $evento = new evento();
            // Obtenemos el pedido por su id usando Eloquent
            $evento = $evento->obtenerPedidoPorId($idPedido);


            // llamamos al modelo DetallePedido y creamos una instancia
            $detallevento = new DetalleEvento();
           
            // llamamos al método obtenerDetallesPedido y pasamos el id del pedido como argumento
            $detallevento = $detallevento->obtenerDetallesPedido($idPedido);

            // Pasamos los resultados a la vista del detalle del pedido
            return view('Admin.detalleEvento', ['eventos' => $evento, 'detalleEventos' => $detallevento]);
        }

        public function ProductosAdd()
            {
                // Creamos una instancia del modelo Categoria
                $categoria = new Categoria();
                
                // Llamamos al método listarCategorias() del modelo Categoria
                $categorias = $categoria->listarCategorias();
                
                // Pasamos los datos a la vista utilizando compact
                return view('productos.create', ['categorias' => $categorias]);
            }

            public function agregarproducto(Request $request)
            {
                $nombre = $request->input('nombre');
                $precio = $request->input('precio');
                $descripcion = $request->input('descripcion');
                $estado = 1;
                $es_promocion = $request->input('es_promocion'); // Capturar el valor del campo es_promocion
            
                if($es_promocion ===1){

                }
                // Obtener el archivo subido
                $file = $request->file('image_url');
            
                // Verificar que el archivo sea una imagen con una extensión válida
                $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];
                $file_ext = strtolower($file->getClientOriginalExtension());
            
                if (!in_array($file_ext, $allowed_exts)) {
                    return "Error: El archivo no es una imagen válida.";
                }
            
                // Guardar el archivo en el almacenamiento de Laravel (public/storage/uploads)
                $new_file_name = uniqid('', true) . '.' . $file_ext;
                $file->storeAs('public/uploads', $new_file_name);
            
                // Obtener la URL completa de la imagen
                $image_url = Storage::url('uploads/' . $new_file_name);
            
                $producto = new Producto();
                if($es_promocion ===1){
                        $categoriaPromocion = DB::table('categorias')
                        ->whereRaw("upper(descripcion) = upper('promocion')")
                        ->select('id_categoria')
                        ->first();              
                    if ($categoriaPromocion) {
                        $categoria = $categoriaPromocion->id_categoria;               
                    } else {
                    $categoria = $request->input('categoria');
                    }
                }else{
                    $categoria = $request->input('categoria');
                }
                // Consulta para obtener la categoría 'promocion'
                
            
                $resultado = $producto->agregarProducto($nombre, $precio, $descripcion, $categoria, $image_url, $estado);
              // Si se agregó el producto correctamente, redirigir al listado de productos
                return redirect()->route('food.index');
            }
            
            

            public function Productos()
            {
                $productos = Producto::listarProductos();
            
                return view('productos.index', ['productos' => $productos]);               
            }
            public function cambiarEstadoProducto(Request $request) {
                $idProducto = $request->input('id_producto');
                $estadoActual = $request->input('estado');
                $nuevoEstado = ($estadoActual == 1) ? 2 : 1;
            
                // Llamar al método actualizarEstado del modelo Producto
                $producto = new Producto();
                $producto->actualizarEstado($idProducto, $estadoActual);
            
                // Redirigir al listado de productos
                return redirect()->route('admin.productos');
            }

            
            function mostrarEstadoProducto($producto) {
                $estado = $producto->estado;
                $idProducto = $producto->id_producto;
                
                if ($estado == 1) {
                    $buttonText = 'Disponible';
                    $buttonClass = 'btn-success';
                } else {
                    $buttonText = 'No Disponible';
                    $buttonClass = 'btn-secondary';
                }
                
                $html = '
                    <form method="post" action="' . route("admin.cambiarEstadoProducto") . '">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                        <input type="hidden" name="id_producto" value="' . $idProducto . '">
                        <input type="hidden" name="estado" value="' . ($estado == 1 ? 2 : 1) . '">
                        <button type="submit" class="btn ' . $buttonClass . '">' . $buttonText . '</button>
                    </form>
                ';
                
                return $html;
            }
            public function editarProducto(Request $request)
            {
                $id_producto = $request->input('id_producto');
                $producto = Producto::editarProducto($id_producto);
                $categoria = new Categoria();
                $categorias = $categoria->listarCategorias();
                
                $data = [
                    'producto' => $producto,
                    'categorias' => $categorias
                ];

                return view('productos.show', $data); // Pasar el arreglo de datos a la vista
            }

                public function actualizarproducto(Request $request)
                {
                    // Comprobar si el formulario se ha enviado
                    if ($request->isMethod('post')) {
                        $request->validate([
                            'image_url' => 'image|mimes:jpg,jpeg,png,gif',
                            // Agrega más validaciones aquí para los otros campos si es necesario
                        ]);
                        $file = $request->file('image_url');                           
                        if($file){
                           
                            $file_ext = $file->getClientOriginalExtension();
                            $new_file_name = uniqid('', true) . '.' . $file_ext;
                            Storage::disk('public')->putFileAs('uploads', $file, $new_file_name);
                            $image_url = asset('storage/uploads/' . $new_file_name);
                        }else{
                            $image_url = $request->input('imagen_actual');
                        }
                        // Obtener el archivo subido
                       
                
                        // Guardar la imagen en la carpeta "uploads"
                      
                
                        // Obtener la URL completa de la imagen
                    
                
                        // Recoger los datos del formulario
                        $id_producto = $request->input('id');
                        $nombre = $request->input('nombre');
                        $precio = $request->input('precio');
                        $descripcion = $request->input('descripcion');
                        $categoria = $request->input('categoria');
                        $estado = $request->input('estado');

                        
                        Producto::actualizarProducto($id_producto, $nombre, $precio, $descripcion, $categoria, $image_url, $estado);
                
                        $productos = Producto::listarProductos();
            
                return view('productos.index', ['productos' => $productos]);     
                    }
                    
                }

        
          //cambiar estadado 
        public function cambiarEstado(Request $request)
        {
            if ($request->isMethod('post')) {
                $id_pedido = $request->input('id_pedido');
                $id_estado = $request->input('id_estado2');
                
                $pedidoModel = new Pedido();
                $pedidoModel->actualizarEstado($id_pedido, $id_estado);
                
                $fechaActual = now()->format('Y-m-d');
                $fecha = $request->input('fecha_pedido', $fechaActual);
                $idEstado = $request->input('id_estado');

                $pedido = new Pedido();
                $pedidos = $pedido->listarPedidos($fecha, $idEstado);

          

            

                return view('Admin.Pedidos', ['pedidos' => $pedidos]);
            }
        }


        public function perfil()
        {
            $id_usuario = auth()->id(); // Obtén el ID del usuario autenticado
            $usuario = User::find($id_usuario); // Suponiendo que UsuarioModel sea tu modelo

           

            return view('usuario.perfil', ['usuario' => $usuario]);
        }

        public function perfilE()
        {
            $id_usuario = auth()->id(); // Obtén el ID del usuario autenticado
            $usuario = User::find($id_usuario); // Suponiendo que UsuarioModel sea tu modelo

           

            return view('usuario.editperfil', ['usuario' => $usuario]);
        }


        public function actualizarPerfil(Request $request)
        {

            $nombreUsuario = $request->input('nombre_usuario');
            $correo = $request->input('correo');

            $id_usuario = auth()->id(); // Obtén el ID del usuario autenticado
            $usuario = User::find($id_usuario); // Suponiendo que tu modelo es UsuarioModel
            $usuario->name = $nombreUsuario;
            $usuario->email = $correo;
            $resultado = $usuario->save();

            if ($resultado) {
                return view('usuario.perfil', ['usuario' => $usuario]);
            } 
        }

  public function PromocionesAdd()
{
    return view('promociones.create');
}




     
    }

    