<?php $__env->startSection('template_title'); ?>
    <?php echo e($categoria->name ?? "{{ __('Show') Categoria"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><?php echo e(__('Show')); ?> Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="<?php echo e(route('categoria.index')); ?>"> <?php echo e(__('Back')); ?></a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Categoria:</strong>
                            <?php echo e($categoria->id_categoria); ?>

                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            <?php echo e($categoria->nombre); ?>

                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            <?php echo e($categoria->descripcion); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/categoria/show.blade.php ENDPATH**/ ?>