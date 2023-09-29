<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container mt-5">
    <h2>Resumen del pedido</h2>
    <?php if(session('error_pedido')): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo e(session('error_pedido')); ?>

        </div>
    <?php endif; ?>
    <?php
        session()->forget(['error_pedido', 'success_pedido']);
    ?>
    <form action="<?php echo e(route('pedido.procesarPedido')); ?>" >

        <div class="d-flex flex-row justify-content-between align-items-start">
            <div class="flex-fill mr-3">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Precio total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total = 0;
                            ?>
                            <?php $__currentLoopData = $carrito; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item['producto']->nombre); ?></td>
                                    <td><?php echo e($item['cantidad']); ?></td>
                                    <td>$<?php echo e(number_format($item['producto']->precio, 2)); ?></td>
                                    <td>$<?php echo e(number_format($item['producto']->precio * $item['cantidad'], 2)); ?></td>
                                </tr>
                                <?php
                                    $total += $item['producto']->precio * $item['cantidad']; // Acumular el total
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right font-weight-bold">TOTAL A PAGAR:</td>
                                <td class="font-weight-bold">$<?php echo e(number_format($total, 2)); ?></td>
                                <input type="hidden" name="total_pagar" value="<?php echo e(number_format($total, 2)); ?>">
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
        <div class="flex-fill col-md-6 mt-4 ">
            <h2>Ingrese la dirección de envío</h2>
            <div class="mb-3">
                <label for="direccion_envio" class="form-label">Dirección de envío:</label>
                <input type="text" class="form-control" name="direccion_envio" id="direccion_envio" required>
            </div>
            <button class="btn btn-success" type="submit" require>Procesar pago en efectivo</button>
            <input type="hidden" name="id_estado_pedido" value="1">
        </div>
    </form>
</div>
<?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/Pago/efectivo.blade.php ENDPATH**/ ?>