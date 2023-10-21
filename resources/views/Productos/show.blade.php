@extends('layouts.app')
@section('content')

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
</style>

<div class="container">
    <h1 class="mt-5 vintage-text"><i class="fas fa-sync-alt"></i> Actualizar Producto</h1>
    <form method="post" enctype="multipart/form-data" action="{{ route('actualizar.producto') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $producto->id_producto }}">
        <div class="form-group mt-4">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}">
        </div>
        <div class="form-group mt-3">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}">
        </div>
        <div class="form-group mt-3">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $producto->descripcion_prod }}</textarea>
        </div>
        <div class="form-group mt-3">
            <label for="categoria">Categoría:</label>
            <select class="form-control" id="categoria" name="categoria" required>
                @foreach($categorias as $categoria)
                    @php $selected = ($categoria->id_categoria == $producto->categoria) ? 'selected' : ''; @endphp
                    <option value="{{ $categoria->id_categoria }}" {{ $selected }}>{{ $categoria->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="1" {{ ($producto->estado == 1) ? 'selected' : '' }}>Disponible</option>
                <option value="2" {{ ($producto->estado == 2) ? 'selected' : '' }}>No disponible</option>
            </select>
        </div>
        <div class="form-group row mt-3">
            <label for="image_url" class="col-sm-3 col-form-label"><i class="fas fa-image"></i> Subir imagen:</label>
            <div class="col-sm-9">
                <input type="hidden" name="imagen_actual" value="{{ $producto->image_url }}">
                <img src="{{ $producto->image_url }}" alt="Imagen del Producto" style="max-width: 25%;">
                <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4 vintage-button"><i class="fas fa-sync-alt"></i> Actualizar</button>
    </form>
    <br>
</div>
@endsection
