

<?php $__env->startSection('content'); ?>


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


<div class="container my-4 mx-auto">
    <div class="text-center">
        <h1 class="navbar-brand vintage-text">Mi perfil</h1>
        <hr>
        <div style="display: flex; justify-content: center;">
            <img src="<?php echo e(asset('img/perfil.png')); ?>" class="d-block" alt="..." width="100" height="100">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 col-sm-12 mx-auto">
        <div style="display: flex; justify-content: center;">
            <h3 class="vintage-text">Información personal</h3>
        </div>
            
            <table class="table table-striped vintage-table">
                <tr>
                    <th>Nombre:</th>
                    <td><?php echo e($usuario['name']); ?></td>
                </tr>
                <tr>
                    <th>Correo:</th>
                    <td><?php echo e($usuario['email']); ?></td>
                </tr>
            </table>

            <div class="text-center">
                <a href="<?php echo e(route('usuario.editperfil')); ?>" class="btn btn-primary vintage-button mt-2">
                    <i class="fas fa-user-edit"></i> Editar Información
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kikii\Desktop\BonHouse\resources\views/usuario/perfil.blade.php ENDPATH**/ ?>