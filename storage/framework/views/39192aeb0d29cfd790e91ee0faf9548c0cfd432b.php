

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Pedidos por Fecha</h1>
    <form method="post" action="<?php echo e(route('admin.pedidos')); ?>">
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
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <hr>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Total a Pagar</th>
                    <th>Fecha del Pedido</th>
                    <th>Estado</th>
                    <th>Ver</th>
                    <th>Modificar estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($pedido->id_pedido); ?></td>
                    <td><?php echo e($pedido->total_pagar); ?></td>
                    <td><?php echo e($pedido->fecha_pedido); ?></td>
                    <td>
                    <?php if($pedido->Estado === 'Cancelado'): ?>
                    <p class="text-danger">
                    <?php else: ?>
                    <p>
                    <?php endif; ?>
                    <?php echo e($pedido->Estado); ?> <p/>
                    
                    </td>
                    <td>
                        <form method="post" action="<?php echo e(route('detalle.pedido')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id_pedido" value="<?php echo e($pedido->id_pedido); ?>">
                            <button type="submit" class="btn btn-info">Ver Detalle</button>
                        </form>
                    </td>
                    <td class="text-center col-2">
                    <?php if($pedido->Estado === 'En proceso'): ?>
                        <form method="post" action="<?php echo e(route('admin.cambiarEstado')); ?>">
                            <?php echo csrf_field(); ?>
                          
                                <div class="form-group">
                                    <label for="id_estado2">Estado:</label>
                                    <select id="id_estado2" name="id_estado2" class="form-control">
                                        <option value="1">En proceso</option>
                                        <option value="2">Finalizado</option>
                                        <option value="3">Cancelado</option>
                                    </select>
                                </div>
                          
                            <input type="hidden" name="id_pedido" value="<?php echo e($pedido->id_pedido); ?>">
                            <button type="submit" class="btn btn-success btn-sm">Cambiar estado</button>
                           
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/Admin/Pedidos.blade.php ENDPATH**/ ?>