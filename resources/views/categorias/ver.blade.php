
<link rel="stylesheet" href="/css/cardCats.css">

@extends('layouts.app')

@section('content')
<div class="imagen" style="
    background-image: url('imgC/fondo2.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    height: 950px; 
">

    {{-- <div class="row">
        <h1 class="text-center mt-3" style="color: #c43f3f;">Listado de productos</h1>

        <form method="GET" action="{{ route('food.index') }}" class="mb-4 form-inline col">
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
        </form>
    </div> --}}

    <style>
        .sin-contorno {
            border: none;
    background: none;
    padding: 0;
    margin: 0;
    font-size: inherit;
    color: inherit;
    cursor: pointer;
        }
    </style>

    @guest
    <!-- Código para agregar al carrito -->
    <div class="text-center alert alert-info" role="alert">
        <h5>Debes iniciar sesión para agregar productos al carrito.</h5>
    </div>
    @endguest

    <div class="container pt-2 " >
        <div class="products mb-5">
            @foreach ($categorias as $categorias)
                @if ($categorias->estado == 1)
                    <form method="GET" action="{{ route('food.index') }}" class="mb-4 form-inline col">
                        <button type="submit" class="sin-contorno" >
                            <div class="product mt-5">
                                <div class="image">
                                    <img class="imgt" src="{{ $categorias->imagen_cat }}" alt="">
                                    <input type="text" name="cats" id="" value="{{ $categorias->id_categoria }}" hidden>
                                    <div class="texto-centrado">{{ $categorias->descripcion }}</div>
                                </div>
                            </div>
                        </button>

                        {{-- {{ dd($categoria->imagen_cat) }} --}}
                        
                    </form>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
