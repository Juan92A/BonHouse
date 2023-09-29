
<link rel="stylesheet" href="/css/cardfood.css">
<link rel="stylesheet" href="/css/food.css">



<?php $__env->startSection('content'); ?>
<div class="container pt-2">

    <div class="row">
        <h1 class="text-center mt-3" style="color: #c43f3f;">Listado de productos</h1>

        <form method="GET" action="<?php echo e(route('food.index')); ?>" class="mb-4 form-inline col">
            <div class="form-group d-flex">
                <label for="categoria" class="sr-only">Categoría:</label>
                <select name="categoria" class="form-control">
                    <option value="">Todas las categorías</option>
                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($categoria->id_categoria); ?>"><?php echo e($categoria->descripcion); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button type="submit" class="btn btn-primary ms-2 ml-2 ml-auto">Filtrar</button>
            </div>
        </form>
    </div>

    <?php if(auth()->guard()->guest()): ?>
    <!-- Código para agregar al carrito -->
    <div class="text-center alert alert-info" role="alert">
        <h5>Debes iniciar sesión para agregar productos al carrito.</h5>
    </div>
    <?php endif; ?>

    <div class="container pt-2">
        <div class="products">
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($producto->estado == 1): ?>
                    <div class="product">
                        <div class="image">
                        <img class="imgt" src="<?php echo e($producto->image_url); ?>" alt=""> 
                        </div>
                        <div class="namePrice">
                            <h3><?php echo e($producto->nombre); ?></h3>
                            <span><?php echo e("$ " . $producto->precio); ?></span>
                        </div>
                        <p class="mb-5"><?php echo e($producto->descripcion_prod); ?></p>
                        <?php if(auth()->guard()->check()): ?>
                            <form method="POST" action="<?php echo e(route('carrito.agregarProducto')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id_producto" value="<?php echo e($producto->id_producto); ?>">
                                <div class="bay">
                                    <div style="display: flex; align-items: center;">
                                        <div class="stars">
                                            <input type="number" name="cantidad" value="1" min="1" max="10">
                                        </div>
                                        <button type="submit">Agregar al carrito</button>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/food/index.blade.php ENDPATH**/ ?>