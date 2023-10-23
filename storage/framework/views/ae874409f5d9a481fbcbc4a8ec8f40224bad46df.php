
<?php $__env->startSection('content'); ?>

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
    <form method="post" enctype="multipart/form-data" action="<?php echo e(route('actualizar.producto')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($producto->id_producto); ?>">
        <div class="form-group mt-4">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($producto->nombre); ?>">
        </div>
        <div class="form-group mt-3">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" value="<?php echo e($producto->precio); ?>">
        </div>
        <div class="form-group mt-3">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"><?php echo e($producto->descripcion_prod); ?></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="categoria">Categoría:</label>
            <select class="form-control" id="categoria" name="categoria" required>
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $selected = ($categoria->id_categoria == $producto->categoria) ? 'selected' : ''; ?>
                    <option value="<?php echo e($categoria->id_categoria); ?>" <?php echo e($selected); ?>><?php echo e($categoria->descripcion); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="1" <?php echo e(($producto->estado == 1) ? 'selected' : ''); ?>>Disponible</option>
                <option value="2" <?php echo e(($producto->estado == 2) ? 'selected' : ''); ?>>No disponible</option>
            </select>
        </div>
        <div class="form-group row mt-3">
            <label for="image_url" class="col-sm-3 col-form-label"><i class="fas fa-image"></i> Subir imagen:</label>
            <div class="col-sm-9">
                <input type="hidden" name="imagen_actual" value="<?php echo e($producto->image_url); ?>">
                <img src="<?php echo e($producto->image_url); ?>" alt="Imagen del Producto" style="max-width: 25%;">
                <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4 vintage-button" onclick="mostrarAlerta()"><i class="fas fa-sync-alt"></i> Actualizar</button>
    </form>
    <br>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   function mostrarAlerta() {
        Swal.fire({
            title: 'Producto actualizado',
            text: 'Producto actualizado correctamente',
            icon: 'success',
            showConfirmButton: false
        });

        // Opcionalmente, puedes agregar un temporizador para cerrar automáticamente la alerta
        setTimeout(function() {
            Swal.close();
        }, 2000); // Cerrar después de 2 segundos (ajusta el valor a tu preferencia)
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kikii\Desktop\BonHouse\resources\views/productos/show.blade.php ENDPATH**/ ?>