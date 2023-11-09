@extends('layouts.app')

@section('content')
<div style="
background: #e2d9c2;
background-size: cover;
background-repeat: no-repeat;
background-position: center;
height: 100%;
margin: 0%;
">
    <style>
    .vintage-text {
        background-color: #f5e8c0;
        font-family: 'Courier New', monospace;
        padding: 10px;
        border-radius: 5px;
        font-size: 44px;
        text-align: center;
    }

    .vintage-button {
        background-color: #f5e8c0;
        color: #964f19;
        border: 2px solid #964f19;
        font-family: 'Courier New', monospace;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s, color 0.3s;
    }

    .vintage-button:hover {
        background-color: #964f19;
        color: #f5e8c0;
    }

    .vintage-table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    .vintage-table th,
    .vintage-table td {
        border: 1px solid #964f19;
        padding: 8px;
        text-align: left;
    }

    .vintage-table thead {
        background-color: #f5e8c0;
    }

    .vintage-table th {
        background-color: #964f19;
        color: #f5e8c0;
    }

    .vintage-table tbody tr:nth-child(even) {
        background-color: #f5e8c0;
    }

    .vintage-table tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    .vintage-table tfoot {
        background-color: #f5e8c0;
    }

    .vintage-table tfoot td {
        font-weight: bold;
    }
    </style>



    <div class="container">
        @if(session('success_pedido'))
        <div class="alert alert-success" role="alert">
            {{ session('success_pedido') }}
        </div>
        @endif


        <h1 class="vintage-text ">Eventos Realizados</h1>

        {{-- <div class="row">
            <form class="mb-5" method="post" action="{{ route('usuario.pedidos') }}">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="fecha_pedido" class="mb-2">Fecha:</label>
                <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido">
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
                <button type="submit" class="btn btn-primary vintage-button">Filtrar Pedidos</button>
            </div>
        </div>
        </form> --}}

        <div class="col-md-12">
            @if(empty($pedidos))
            <p>No tienes pedidos activos en este momento</p>
            @else
            <table id="miTabla" class="vintage-table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Descuento</th>
                        <th scope="col">Total</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Modificar estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id_pedido }}</td>
                        <td>{{ $pedido->nombre_cliente }}</td>
                        <td>{{ $pedido->fecha_evento }}</td>
                        <td>
                        @if($pedido->Estado === 'Cancelado')
                        <p class="text-danger">{{ $pedido->Estado }}</p>
                    @elseif($pedido->Estado === 'Programado')
                        <p class="text-success">{{ $pedido->Estado }}</p>

                    @elseif($pedido->Estado === 'Finalizado')
                        <p class="text-success">{{ $pedido->Estado }}</p>
                    @else
                        <p>{{ $pedido->Estado }}</p>
                    @endif

                 {{--   @if($pedido->Estado === 'Programado')
                        @php
                            $totalfinal += $pedido->total_pagar;
                        @endphp
                    @endif--}}
                        </td>
                        <td>{{ $pedido->porcentaje_descuento }}%</td>
                        <td>${{ $pedido->sub_total }}</td>
                        <td>
                            <form method="post" action="{{ route('detalle.evento') }}">
                                @csrf
                                <input type="hidden" name="id_pedido" value="{{ $pedido->id_pedido }}">
                                <button type="submit" class="btn btn-info vintage-button">Ver Detalle</button>
                            </form>
                        </td>
                        <td class="text-center col-2">
                            @if($pedido->Estado === 'Pendiente' || $pedido->Estado === 'Programado')
                            <form method="post" action="{{ route('evento.cambiarEstado') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="id_estado2">Estado:</label>
                                    <select id="id_estado2" name="id_estado2" class="form-control">
                                    @if($pedido->Estado === 'Pendiente')
                                        <option value="1">Pendiente</option>

                                    @endif
                                      <option value="2">Programado</option>
                                        <option value="3">Cancelado</option>
                                        <option value="4">Finalizado</option>
                                    </select>
                                </div>

                                <input type="hidden" name="id_pedido" value="{{ $pedido->id_pedido }}">
                                <button type="submit" class="vintage-button">Cambiar estado</button>

                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center" style="margin-bottom: 290px">
                <a href="#" onclick="window.print()" class="btn btn-primary btn-sm">Guardar Informe de Eventos</a>
            </div>
            @endif
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
</div>



<script>
$(document).ready(function() {
    $('#miTabla').DataTable({
        paging: true, // Habilita la paginación
        pageLength: 10, // Define la cantidad de filas por página
    });
});
</script>


@endsection
