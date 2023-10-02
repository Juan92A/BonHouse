@extends('layouts.app')

@section('content')
<div class="container">
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
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: 'Courier New', monospace; /* Fuente de estilo retro */
        }

        .vintage-table th,
        .vintage-table td {
            border: 1px solid #964f19; /* Borde con color del texto */
            padding: 8px;
            text-align: left;
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

    <h1 class="vintage-text">Pedidos por Fecha</h1>
    <form method="post" action="{{ route('admin.pedidos') }}">
        @csrf

        <div class="row">
            <div class="form-group col-md-4">
                <label for="fecha_pedido" class="mb-2">Fecha:</label>
                <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido" >
            </div>
            <div class="form-group col-md-4">
                <label for="id_estado" class="mb-2">Estado:</label>
                <select id="id_estado" name="id_estado" class="form-control">
                    <option value="">Todos</option>
                    <option value="1">En proceso</option>
                    <option value="2">Finalizado</option>
                    <option value="3">Cancelado</option>
                </select>
            </div>
            <div class="form-group col-md-4 mt-4">
                <button type="submit" class="vintage-button">Filtrar</button>
            </div>
        </div>
    </form>

    <hr>

    <div class="table-container">
        <table class="vintage-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Total a Pagar</th>
                    <th>Fecha del Pedido</th>
                    <th>Estado</th>
                    <th>Ver</th>
                    <th>Modificar estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalfinal = 0; // Inicializa la variable $totalfinal a 0
                @endphp
                @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id_pedido }}</td>
                    <td>{{ $pedido->total_pagar }}</td>
                    <td>{{ $pedido->fecha_pedido }}</td>
                     
                    <td>

                    @if($pedido->Estado === 'Cancelado')
                        <p class="text-danger">{{ $pedido->Estado }}</p>
                    @elseif($pedido->Estado === 'Pagado')
                        <p class="text-success">{{ $pedido->Estado }}</p>
                    @else
                        <p>{{ $pedido->Estado }}</p>
                    @endif

                    @if($pedido->Estado === 'Pagado')
                        @php    
                            $totalfinal += $pedido->total_pagar;
                        @endphp
                    @endif
                    </td>
                    <td>
                        <form method="post" action="{{ route('detalle.pedido') }}">
                            @csrf
                            <input type="hidden" name="id_pedido" value="{{ $pedido->id_pedido }}">
                            <button type="submit" class="vintage-button">Ver Detalle</button>
                        </form>
                    </td>
                    <td class="text-center col-2">
                    @if($pedido->Estado === 'En Proceso')
                        <form method="post" action="{{ route('admin.cambiarEstado') }}">
                            @csrf
                          
                                <div class="form-group">
                                    <label for="id_estado2">Estado:</label>
                                    <select id="id_estado2" name="id_estado2" class="form-control">
                                        <option value="1">En proceso</option>
                                        <option value="2">Pagado</option>
                                        <option value="3">Cancelado</option>
                                    </select>
                                </div>
                          
                            <input type="hidden" name="id_pedido" value="{{ $pedido->id_pedido }}">
                            <button type="submit" class="vintage-button">Cambiar estado</button>
                           
                        </form>
                    @endif
                    </td>
                </tr>
                @endforeach
               
                <tr>
                    <td class="vintage-button">Total</td>
                    <td class="vintage-button">{{ $totalfinal }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection