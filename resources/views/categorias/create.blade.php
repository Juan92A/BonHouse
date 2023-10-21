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
    <h1 class="mt-5 vintage-text">Agregar Categoría</h1>
    <form class="mt-4" method="post" action="{{ route('categorias.agregar') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="">
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="1">Disponible</option>
                <option value="2">No disponible</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image_url">Subir imagen:</label>
            <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" required>
        </div>
        <div class="row">
            <div class="col mt-3">
                <button type="submit" class="vintage-button" onclick="mostrarAlerta()">Agregar Categoría</button>
            </div>
            <div class="col ">
                <img id="image_preview" src="#" alt="Preview" style="display: none; max-width: 100%; height: auto;">
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function mostrarAlerta() {
        Swal.fire({
            title: 'Categoría Creada',
            text: 'Categoría creada correctamente',
            icon: 'success',
            showConfirmButton: false
        });

        // Opcionalmente, puedes agregar un temporizador para cerrar automáticamente la alerta
        setTimeout(function() {
            Swal.close();
        }, 2000); // Cerrar después de 2 segundos (ajusta el valor a tu preferencia)
    }

    const imageInput = document.getElementById('image_url');
    const imagePreview = document.getElementById('image_preview');

    imageInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onload = (event) => {
            imagePreview.src = event.target.result;
            imagePreview.style.display = 'block';
        };

        reader.readAsDataURL(file);
    });
</script>
@endsection
