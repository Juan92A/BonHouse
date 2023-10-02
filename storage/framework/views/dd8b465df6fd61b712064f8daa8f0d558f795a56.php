
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-5"><i class="fas fa-plus-circle"></i> Agregar Producto</h1>
    <form class="mt-5" method="post" action="<?php echo e(route('productos.create')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group row mb-3">
            <label for="nombre" class="col-sm-3 col-form-label"></i> Nombre del
                producto:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="precio" class="col-sm-3 col-form-label"><i class="fas fa-dollar-sign"></i> Precio:</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" required>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="descripcion"><i class="fas fa-align-left"></i> Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" cols="50" required></textarea>
        </div>

        <div class="form-group d-flex align-items-center mb-3">
            <label for="categoria" class="w-25"><i class="fas fa-tags"></i> Categoría:</label>
            <select class="form-control w-50" id="categoria" name="categoria" required>
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($categoria->id_categoria); ?>"><?php echo e($categoria->descripcion); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
              
        </div>

           <div class="form-group row mb-3">
            <label for="image_url" class="col-sm-3 col-form-label"><i class="fas fa-image"></i> Subir imagen:</label>
            <div class="col">
                <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" required>
             
            </div>
            <div class="col row">
                <label for="">Imagen seleccionada</label>
                <img id="image_preview"  src="#" alt="Preview" style="display: none; max-width: 25%; height: auto;">
            </div>
        </div>
        <input type="hidden" name="estado" value="1">
        <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-plus-circle"></i> Agregar producto</button>
    </form>
</div>
<script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/productos/create.blade.php ENDPATH**/ ?>