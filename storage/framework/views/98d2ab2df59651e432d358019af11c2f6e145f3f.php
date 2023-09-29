

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-5">Editar categoría</h1>
    <form method="post" action="<?php echo e(route('categorias.update', ['id_categoria' => $categoria->id_categoria])); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id_categoria" value="<?php echo e($categoria->id_categoria); ?>">
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo e($categoria->descripcion); ?>">
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="1" <?php echo e(($categoria->estado == 1) ? 'selected' : ''); ?>>Disponible</option>
                <option value="2" <?php echo e(($categoria->estado == 2) ? 'selected' : ''); ?>>No disponible</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/categorias/show.blade.php ENDPATH**/ ?>