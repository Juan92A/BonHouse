<link rel="stylesheet" href="/css/cardCats.css">

@extends('layouts.app')

@section('content')
<div class="imagen" style="
    background:#885838;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    height:100%
">


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

                @if($tipoventa != 1)
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
                        </form>
                    @endif
                    
                
                @else
                    @if ($categorias->estado == 1)
                        <form method="GET" action="{{ route('food.evento') }}" class="mb-4 form-inline col">
                            <button type="submit" class="sin-contorno" >
                                <div class="product mt-5">
                                    <div class="image">
                                        <img class="imgt" src="{{ $categorias->imagen_cat }}" alt="">
                                        <input type="text" name="cats" id="" value="{{ $categorias->id_categoria }}" hidden>
                                        <div class="texto-centrado">{{ $categorias->descripcion }}</div>
                                    </div>
                                </div>
                            </button>
                        </form>
                    @endif
                
                @endif
            @endforeach

          

        </div>
    </div>
</div>
@endsection