

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="pt-3" style="color: #c43f3f;">Mis pedidos</h1>

    <hr>
    <?php if(session('success_pedido')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('success_pedido')); ?>

        </div>
    <?php endif; ?>

    <div class="row">
        <form class="mb-5" method="post" action="<?php echo e(route('usuario.pedidos')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="fecha_pedido" class="mb-2">Fecha:</label>
                    <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido" >
                </div>
                <div class="form-group col-md-4">
                    <label for="id_estado" class="mb-2">Estado:</label>
                    <select id="id_estado" name="id_estado" class="form-control">
                        <option value="">Todos</option>
                        <option value="1">En proceso</option>
                        <option value="2">Finalizado</option>
                        <option value="3">Cancelado</option>
                    </select>
                </div>
                <div class="form-group col-md-4  mt-4">
                    <button type="submit" class="btn btn-primary">Filtrar Pedidos</button>
                </div>
            </div>
        </form>

        <div class="col-md-12">
            <?php if(empty($pedidos)): ?>
                <p>No tienes pedidos activos en este momento</p>
            <?php else: ?>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($pedido->id_pedido); ?></td>
                                <td><?php echo e($pedido->fecha_pedido); ?></td>
                                <td><?php echo e($pedido->id_estado_pedido); ?></td>
                                <td>
                                    <form method="post" action="<?php echo e(route('detalle.pedido')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id_pedido" value="<?php echo e($pedido->id_pedido); ?>">
                                        <button type="submit" class="btn btn-info">Ver Detalle</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/Usuario/Pedido.blade.php ENDPATH**/ ?>