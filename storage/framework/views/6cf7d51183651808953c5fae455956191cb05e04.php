

<?php
    use App\Http\Controllers\Admincontroller;
    use App\Models\Categoria; // Asegúrate de importar el modelo correcto
    
    $adminController = new Admincontroller();
?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-5">Listado de categorias</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="display:none;">#</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($categoria->descripcion); ?></td>
                <td>
                    <!-- Mostrar estado actual -->
                    <?php echo $adminController->mostrarEstadoCategoria($categoria); ?>    
                </td>
                <td>
                <form method="post" action="<?php echo e(route('categorias.show', ['id_categoria' => $categoria->id_categoria])); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-primary">Editar</button>
                </form>
                    
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/Categorias/editar.blade.php ENDPATH**/ ?>