@extends('layouts.app')

@section('content')

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
        font-weigh
        
        .text-center {
text-align: center;
}


t: bold; /* Texto del pie de tabla en negrita */
    }
</style>


<div class="container">
    <h1 class="vintage-text my-5">Pedido de {{ $pedidos->nombre_cliente }}</h1>
    <h2 class="vintage-text">Fecha de Pedido: {{ $pedidos->fecha_pedido }}</h2>

    <div class="row">
        <div class="col-md-12">
            <table class="vintage-table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nombre del Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detallesPedido as $detalle)
                        <tr>
                            <td>{{ $detalle->nombre }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>${{ $detalle->precio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin")
        <hr class="vintage-text">
        <form method="post" action="{{ URL::to('Admin/CambiarEstado') }}">
            @csrf
            <div class="form-group">
                <label for="id_estado2" class="vintage-text">Estado:</label>
                <select id="id_estado2" name="id_estado2" class="form-control vintage-button">
                    <option value="1">En Proceso</option>
                    <option value="2">Finalizado</option>
                    <option value="3">Cancelado</option>
                </select>
            </div>
            <input type="hidden" name="id_pedido" value="{{ $pedido->id_pedido }}">
            <button type="submit" class="vintage-button">Cambiar Estado</button>
        </form>
    @endif

    <hr class="vintage-text">
    <a href="#" onclick="window.print()" class="vintage-button">Guardar Pedido</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
