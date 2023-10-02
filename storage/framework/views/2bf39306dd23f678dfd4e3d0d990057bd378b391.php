

<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Tabla del carrito de compras -->
                        <h1 class="text-center" style="color: #c43f3f;">Ventas a Realizar</h1>
                        <div class="table-responsive container pt-2">
                            <!-- Código de la tabla del carrito -->
                                <a class="btn btn-primary mb-2" href="/VerCategorias">Agregar Venta</a>
                         
                            <table class="table table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio unitario</th>
                                        <th>Precio total</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0; // variable para acumular el total
                                    ?>
                                    <?php $__currentLoopData = $carrito; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item['producto']->nombre); ?></td>
                                            <td><?php echo e($item['cantidad']); ?></td>
                                            <td><?php echo e('$' . $item['producto']->precio); ?></td>
                                            <td>
                                                <?php
                                                $precioTotal = $item['producto']->precio * $item['cantidad'];
                                                $total += $precioTotal; // sumar al total acumulado
                                                echo '$' . number_format($precioTotal, 2);
                                                ?>
                                            </td>
                                            <td>
                                                <form action="<?php echo e(route('carrito.eliminarProducto')); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="id_producto" value="<?php echo e($item['producto']->id_producto); ?>">
                                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">Total:</td>
                                        <td><?php echo e('$' . number_format($total, 2)); ?></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <form action="<?php echo e(route('pago.pagar')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <div class="my-3">
                                    <input type="radio" name="pago" value="efectivo" id="pago-efectivo" class="mr-2" checked hidden>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button class="btn btn-success" type="submit">Continuar Pedido</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/Home/carrito.blade.php ENDPATH**/ ?>