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
    <h1 class="mt-5 vintage-text">Editar categoría</h1>
    <form method="post" action="{{ route('categorias.update', ['id_categoria' => $categoria->id_categoria]) }}">
        @csrf
        <input type="hidden" name="id_categoria" value="{{ $categoria->id_categoria }}">
        <div class="form-group mt-3">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $categoria->descripcion }}">
        </div>
        <div class="form-group mt-3">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="1" {{ ($categoria->estado == 1) ? 'selected' : '' }}>Disponible</option>
                <option value="2" {{ ($categoria->estado == 2) ? 'selected' : '' }}>No disponible</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4 vintage-button">Actualizar</button>
    </form>
</div>
@endsection

