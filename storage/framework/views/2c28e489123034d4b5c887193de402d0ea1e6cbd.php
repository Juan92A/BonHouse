
<?php $__env->startSection('content'); ?>
<div class="container">
  <h1 class="mt-5">Agregar categoria</h1>
  <form class="mt-5" method="post" action="<?php echo e(route('categorias.agregar')); ?>">
    <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="">
            </div>    
            <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1">Disponible</option>
                    <option value="2">No disponible</option>
                </select>
                <button type="submit" class="btn btn-primary">Agregar categoria</button>

            </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/categorias/create.blade.php ENDPATH**/ ?>