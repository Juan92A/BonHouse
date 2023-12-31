<link rel="stylesheet" href="/css/cardfood.css">
<link rel="stylesheet" href="/css/food.css">

@extends('layouts.app')

@section('content')
<div class="container pt-2">

    <div class="row">
        <h1 class="text-center mt-3" style="color: #c43f3f;">Listado de productos</h1>

        {{-- <form method="GET" action="{{ route('food.index') }}" class="mb-4 form-inline col">
            <div class="form-group d-flex">
                <label for="categoria" class="sr-only">Categoría:</label>
                <select name="categoria" class="form-control">
                    <option value="">Todas las categorías</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}">{{ $categoria->descripcion }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary ms-2 ml-2 ml-auto">Filtrar</button>
            </div>
        </form> --}}
    </div>

    @guest
    <!-- Código para agregar al carrito -->
    <div class="text-center alert alert-info" role="alert">
        <h5>Debes iniciar sesión para agregar productos al carrito.</h5>
    </div>
    @endguest

    <div class="container pt-2">
        <div class="products">
            @foreach ($productos as $producto)
            @if ($producto->estado == 1)
            <div class="product">
                <div class="image">
                    <img class="imgt" src="{{ $producto->image_url }}" alt="">
                </div>
                <div class="namePrice">
                    <h3>{{ $producto->nombre }}</h3>
                    <span>{{ "$ " . $producto->precio }}</span>
                </div>
                <p class="mb-5">{{ $producto->descripcion_prod }}</p>
                @auth
                @if($tipoventa !=1)
                <form method="POST" action="{{ route('carrito.agregarProducto') }}">
                    @csrf
                    <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                    <div class="bay">
                        <div style="display: flex; align-items: center;">
                           
                            <div class="stars">
                                <input type="number" name="cantidad" value="1" min="1">
                            </div>
                       
                            
                            <button type="submit" onclick="mostrarAlerta()">Agregar al carrito</button>
                        </div>
                    </div>
                </form>
                @else
                <form method="POST" action="{{ route('evento.agregarProducto') }}">
                    @csrf
                    <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                    <div class="bay">
                        <div style="display: flex; align-items: center;">
                           
                            
                            <button type="submit" onclick="mostrarAlerta()">Agregar al carrito</button>
                        </div>
                    </div>
                </form>
                @endif
                @endauth
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   function mostrarAlerta() {
        Swal.fire({
            title: 'Se ha agregado al carrito',
            text: 'El producto seleccionado se ha agregado al carrito',
            icon: 'success',
            showConfirmButton: false,
            timer: 3000
        }); 

        // Opcionalmente, puedes agregar un temporizador para cerrar automáticamente la alerta
        setTimeout(function() {
            Swal.close();
        }, 2000); // Cerrar después de 2 segundos (ajusta el valor a tu preferencia)
    }
</script>
@endsection