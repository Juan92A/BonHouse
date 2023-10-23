
<link rel="stylesheet" href="/css/cardCats.css">



<?php $__env->startSection('content'); ?>
<div class="imagen" style="
background:#e2d9c2;
background-size: cover;
background-repeat: no-repeat;
background-position: center;
height:100%;
margin:0%
">


    <style>
        .sin-contorno {
            border: none;
    background: none;
    padding: 0;
    margin: 0;
    font-size: inherit;
    color: inherit;
    cursor: pointer;
        }
    </style>

    <?php if(auth()->guard()->guest()): ?>
    <!-- Código para agregar al carrito -->
    <div class="text-center alert alert-info" role="alert">
        <h5>Debes iniciar sesión para agregar productos al carrito.</h5>
    </div>
    <?php endif; ?>

    <div class="container pt-2 " >
        <div class="products mb-5">
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorias): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($tipoventa != 1): ?>
                    <?php if($categorias->estado == 1): ?>
                        <form method="GET" action="<?php echo e(route('food.index')); ?>" class="mb-4 form-inline col">
                            <button type="submit" class="sin-contorno" >
                                <div class="product mt-5">
                                    <div class="image">
                                        <img class="imgt" src="<?php echo e($categorias->imagen_cat); ?>" alt="">
                                        <input type="text" name="cats" id="" value="<?php echo e($categorias->id_categoria); ?>" hidden>
                                        <div class="texto-centrado"><?php echo e($categorias->descripcion); ?></div>
                                    </div>
                                </div>
                            </button>
                        </form>
                    <?php endif; ?>
                    
                
                <?php else: ?>
                    <?php if($categorias->estado == 1): ?>
                        <form method="GET" action="<?php echo e(route('food.evento')); ?>" class="mb-4 form-inline col">
                            <button type="submit" class="sin-contorno" >
                                <div class="product mt-5">
                                    <div class="image">
                                        <img class="imgt" src="<?php echo e($categorias->imagen_cat); ?>" alt="">
                                        <input type="text" name="cats" id="" value="<?php echo e($categorias->id_categoria); ?>" hidden>
                                        <div class="texto-centrado"><?php echo e($categorias->descripcion); ?></div>
                                    </div>
                                </div>
                            </button>
                        </form>
                    <?php endif; ?>
                
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kikii\Desktop\BonHouse\resources\views/categorias/ver.blade.php ENDPATH**/ ?>