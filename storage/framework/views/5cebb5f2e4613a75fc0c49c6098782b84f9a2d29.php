<?php
    use App\Http\Controllers\Admincontroller;

    
    $adminController = new Admincontroller();
?>


<?php $__env->startSection('content'); ?>
<div class="container">
  <h1 class="mt-5">Listado de Productos</h1>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th style="display:none;" scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Precio</th>
          <th scope="col">Descripción</th>
          <th scope="col">Categoría</th>
          <th scope="col">Imagen</th>
          <th scope="col">Estado</th>
          <th scope="col">Editar</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <th style="display:none;" scope="row"><?php echo e($producto->id_producto); ?></th>
          <td><?php echo e($producto->nombre); ?></td>
          <td><?php echo e($producto->precio); ?></td>
          <td><?php echo e($producto->descripcion_prod); ?></td>
          <td><?php echo e($producto->categoria); ?></td>
          <td>
            <img src="<?php echo e($producto->image_url); ?>" alt="Imagen del producto" width="100">
          </td> 
          <td>
          <?php echo $adminController->mostrarEstadoProducto($producto); ?>    
          </td>
          <td>
            <form action="<?php echo e(route('producto.editar')); ?>">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="id_producto" value="<?php echo e($producto->id_producto); ?>">
              <button type="submit" class="btn btn-primary">Editar</button>
            </form>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/productos/index.blade.php ENDPATH**/ ?>