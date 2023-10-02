<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Producto; // Asegúrate de tener el namespace correcto para el modelo Producto

class EventoController extends Controller
{
    protected $producto;

    public function __construct(Producto $producto)
    {
        $this->producto = $producto;
    }



    public function agregarProducto(Request $request)
    {
        // Verificar si se ha enviado el formulario
        if ($request->isMethod('post')) {
            // Obtener los datos del formulario
            $id_producto = $request->input('id_producto');
            $cantidad = $request->input('cantidad');

    
            // Obtener el producto de la base de datos (asegúrate de que esta parte funcione correctamente)
            $producto = Producto::buscarPorId($id_producto);
    
            // Verificar si el producto existe
            if ($producto) {
                // Obtener el carrito actual
                $carritoEvento = session()->has('carritoEvento') ? session('carritoEvento') : array();
    
                // Verificar si el producto ya está en el carrito
                if (isset($carrito[$id_producto])) {
                    // Actualizar la cantidad del producto en el carrito
                    $carritoEvento[$id_producto]['cantidad'] += $cantidad;
                } else {
                    // Agregar el producto al carrito
                    $carritoEvento[$id_producto] = array(
                        'producto' => $producto,
                        'cantidad' => $cantidad
                    );
                }
    
                // Actualizar el carrito en la sesión
                session(['carritoEvento' => $carritoEvento]);

                // Imprimir el carrito para verificar los datos (opcional)
                //dd($carrito);
    
                // Redirigir al listado de productos
                return redirect()->route('food.evento'); // Ajusta la ruta de redirección según tu proyecto
            }
        }
    }
    
    
    public function verEvento()
    {
        // Obtiene los datos del carrito de la sesión
        $carritoEvento = session()->has('carritoEvento') ? session('carritoEvento') : array();
    
        // Renderiza la vista del carrito con los datos del carrito
        return view('evento.carrito', ['carritoEvento' => $carritoEvento]);
    }
    

    public function eliminarProducto(Request $request)
    {
        // Verificar si se ha enviado el formulario
        if ($request->isMethod('post')) {
            // Obtener el ID del producto a eliminar
            $id_producto = $request->input('id_producto');

            // Obtener el carrito actual
            $carritoEvento = session()->has('carritoEvento') ? session('carritoEvento') : array();

            // Verificar si el producto está en el carrito
            if (isset($carritoEvento[$id_producto])) {
                // Eliminar el producto del carrito
                unset($carritoEvento[$id_producto]);

                // Actualizar el carrito en la sesión
                session(['carritoEvento' => $carritoEvento]);
            }
        }

        // Redirigir al carrito
        return redirect()->route('evento.carrito');
    }

    
}

