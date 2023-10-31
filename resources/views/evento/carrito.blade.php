@extends('layouts.app')

@section('content')

<div style="
background:#e2d9c2;
background-size: cover;
background-repeat: no-repeat;
background-position: center;
height:100%;
margin:0%
">

<style>
   .card {
        transition: transform 0.3s, box-shadow 0.3s;
        transform-style: preserve-3d;
    }

    .card:hover {
        transform: rotateY(10deg);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.4); /* Ajusta los valores según tu preferencia */
    }

    .vintage-text {
        background-color: #f5e8c0; /* Fondo desgastado */
        font-family: 'Courier New', monospace; /* Fuente de estilo retro */
        padding: 10px; /* Espacio interno para el texto */
        border-radius: 5px; /* Bordes redondeados */
        font-size: 44px; /* Tamaño de fuente */
        text-align: center; /* Centrar el texto horizontalmente */
    }

    .vintage-button {
        background-color: #f5e8c0; /* Color de fondo */
        color: #964f19; /* Color del texto */
        border: 2px solid #964f19; /* Borde con color del texto */
        font-family: 'Courier New', monospace; /* Fuente de estilo retro */
        padding: 10px 20px; /* Espaciado interior del botón */
        border-radius: 5px; /* Bordes redondeados */
        text-decoration: none; /* Elimina el subrayado del enlace */
        display: inline-block; /* Hace que el botón se comporte como un bloque en línea */
        transition: background-color 0.3s, color 0.3s; /* Transición suave al pasar el cursor */
    }

    .vintage-button:hover {
        background-color: #964f19; /* Cambia el color de fondo al pasar el cursor */
        color: #f5e8c0; /* Cambia el color del texto al pasar el cursor */
    }

    .vintage-table {
        border-collapse: collapse; /* Combina los bordes de las celdas */
        width: 100%;
        margin-top: 20px; /* Espaciado superior */
    }

    .vintage-table th, .vintage-table td {
        border: 1px solid #964f19; /* Borde con color del texto */
        padding: 8px; /* Espaciado interior de celdas */
        text-align: left; /* Alineación del texto a la izquierda */
    }

    .vintage-table thead {
        background-color: #f5e8c0; /* Color de fondo para la fila de encabezados */
    }

    .vintage-table th {
        background-color: #964f19; /* Color de fondo para las celdas de encabezado */
        color: #f5e8c0; /* Color del texto de encabezado */
    }

    .vintage-table tbody tr:nth-child(even) {
        background-color: #f5e8c0; /* Color de fondo para filas pares */
    }

    .vintage-table tbody tr:nth-child(odd) {
        background-color: #fff; /* Color de fondo para filas impares */
    }

    .vintage-table tfoot {
        background-color: #f5e8c0; /* Color de fondo para la fila de pie de tabla */
    }

    .vintage-table tfoot td {
        font-weight: bold; /* Texto del pie de tabla en negrita */
    }
</style>

    <div class="container p-5">
        <div class="card ">
            <div class="card-body mt-5 mb-5">
                {{-- @if (empty($carrito))
                    <div class="alert alert-warning" role="alert">
                        El carrito está vacío.
                    </div>
                @else --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Tabla del carrito de compras -->
                                    <h1 class="vintage-text">Programar un Evento</h1>
                                    <div class="table-responsive container pt-2">
                                        <!-- Código de la tabla del carrito -->
                                        <a class="btn vintage-button mb-2" href="{{route('food.categorias2')}}">Agregar Productos</a>
                                        <table class="vintage-table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio unitario</th>
                                                    <th>Precio total</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $total = 0; // variable para acumular el total
                                                @endphp
                                                @foreach ($carritoEvento as $item)
                                                    <tr>
                                                        <td>{{ $item['producto']->nombre }}</td>
                                                        <td>{{ $item['cantidad'] }}</td>
                                                        <td>{{ '$' . $item['producto']->precio }}</td>
                                                        <td>
                                                            @php
                                                            $precioTotal = $item['producto']->precio * $item['cantidad'];
                                                            $total += $precioTotal; // sumar al total acumulado
                                                            echo '$' . number_format($precioTotal, 2);
                                                            @endphp
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('evento.eliminarProducto') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id_producto" value="{{ $item['producto']->id_producto }}">
                                                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3">Total:</td>
                                                    <td>{{ '$' . number_format($total, 2) }}</td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <form action="{{ route('pago.evento') }}" method="POST" id="formularioPedido">
                                    @csrf
                                    <div class="d-flex justify-content-center align-items-center flex-column">
                                        <div class="my-3">
                                            <input type="radio" name="pago" value="efectivo" id="pago-efectivo" class="mr-2" checked hidden>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button class="btn btn-success" type="submit" id="continuarPedidoBtn">Continuar Pedido</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                {{-- @endif --}}
            </div>
        </div>
        
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obten el formulario y el botón de continuar
        var formularioPedido = document.getElementById("formularioPedido");
        var continuarPedidoBtn = document.getElementById("continuarPedidoBtn");

        // Agrega un controlador de eventos al formulario cuando se envíe
        formularioPedido.addEventListener("submit", function(event) {
            // Valida si la tabla está vacía
            if (document.querySelectorAll('.vintage-table tbody tr').length === 0) {
                Swal.fire({
                    title: 'Vacio',
                    text: 'No tiene productos agregados',
                    icon: 'error',
                    // showConfirmButton: false
                });
                event.preventDefault();
            }
        });
    });
</script>
@endsection