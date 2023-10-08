
<?php $__env->startSection('content'); ?>

<div class="container">
    <h1 class="mt-5">Actualizar Producto</h1>
    <form method="post" enctype="multipart/form-data" action="<?php echo e(route('actualizar.producto')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($producto->id_producto); ?>">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($producto->nombre); ?>">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" value="<?php echo e($producto->precio); ?>">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"><?php echo e($producto->descripcion_prod); ?></textarea>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select class="form-control" id="categoria" name="categoria" required>
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $selected = ($categoria->id_categoria == $producto->categoria) ? 'selected' : ''; ?>
                    <option value="<?php echo e($categoria->id_categoria); ?>" <?php echo e($selected); ?>><?php echo e($categoria->descripcion); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="1" <?php echo e(($producto->estado == 1) ? 'selected' : ''); ?>>Disponible</option>
                <option value="2" <?php echo e(($producto->estado == 2) ? 'selected' : ''); ?>>No disponible</option>
            </select>
        </div>
        <div class="form-group row mb-3">
            <label for="image_url" class="col-sm-3 col-form-label"><i class="fas fa-image"></i> Subir imagen:</label>
            <div class="col-sm-9">
                <!-- Mostrar la imagen actual -->
                <input type="hidden" name="imagen_actual" value="<?php echo e($producto->image_url); ?>">
                <img src="<?php echo e($producto->image_url); ?>" alt="Imagen del Producto" style="max-width: 25%;">
                
                <!-- Input para actualizar la imagen -->
                <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" >
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/productos/show.blade.php ENDPATH**/ ?>