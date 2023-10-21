@php
    use App\Http\Controllers\Admincontroller;
    $adminController = new Admincontroller();
@endphp

@extends('layouts.app')
@section('content')

<style>
  
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
  <h1 class="mt-5 vintage-text">Listado de Productos</h1>
  <div class="table-container">
    <table class="vintage-table table table-striped">
      <thead>
        <tr>
          <th style="display:none;" scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Precio</th>
          <th scope="col">Descripción</th>
          <th scope="col">Categoría</th>
          <th scope="col">Imagen</th>
          <th scope="col">Estado</th>
          <th scope="col">Editar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($productos as $producto)
        <tr>
          <th style="display:none;" scope="row">{{ $producto->id_producto }}</th>
          <td>{{ $producto->nombre }}</td>
          <td>{{ $producto->precio }}</td>
          <td>{{ $producto->descripcion_prod }}</td>
          <td>{{ $producto->categoria }}</td>
          <td>
            <img src="{{ $producto->image_url }}" alt="Imagen del producto" width="100">
          </td> 
          <td>
            {!! $adminController->mostrarEstadoProducto($producto) !!}
          </td>
          <td>
            <form action="{{ route('producto.editar') }}">
              @csrf
              <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
              <button type="submit" class="vintage-button"><i class="fas fa-edit"></i> Editar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
