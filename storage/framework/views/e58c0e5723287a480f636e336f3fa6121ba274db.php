

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-5">Pedido de: <?php echo e($eventos->nombre_cliente); ?> </h1>
    <h1>fecha de evento: <?php echo e($eventos->fecha_evento); ?></h1>

   
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $detalleEventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($detalle->nombre); ?></td>
                            <td><?php echo e($detalle->cantidad_personas); ?></td>
                            <td>$<?php echo e($detalle->precio); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin"): ?>
        <hr>
        <form method="post" action="<?php echo e(URL::to('Admin/CambiarEstado')); ?>">
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
    <hr>
    <a href="#" onclick="window.print()" class="btn btn-primary btn-sm">Imprimir Pedido</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/Admin/detalleEvento.blade.php ENDPATH**/ ?>