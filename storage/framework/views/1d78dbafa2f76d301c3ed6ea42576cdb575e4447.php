

<?php $__env->startSection('content'); ?>
<div style="
background: #e2d9c2;
background-size: cover;
background-repeat: no-repeat;
background-position: center;
height: 100%;
margin: 0%;
">
    <style>
        .vintage-text {
            background-color: #f5e8c0;
            font-family: 'Courier New', monospace;
            padding: 10px;
            border-radius: 5px;
            font-size: 44px;
            text-align: center;
        }

        .vintage-button {
            background-color: #f5e8c0;
            color: #964f19;
            border: 2px solid #964f19;
            font-family: 'Courier New', monospace;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s, color 0.3s;
        }

        .vintage-button:hover {
            background-color: #964f19;
            color: #f5e8c0;
        }

        .vintage-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        .vintage-table th,
        .vintage-table td {
            border: 1px solid #964f19;
            padding: 8px;
            text-align: left;
        }

        .vintage-table thead {
            background-color: #f5e8c0;
        }

        .vintage-table th {
            background-color: #964f19;
            color: #f5e8c0;
        }

        .vintage-table tbody tr:nth-child(even) {
            background-color: #f5e8c0;
        }

        .vintage-table tbody tr:nth-child(odd) {
            background-color: #fff;
        }

        .vintage-table tfoot {
            background-color: #f5e8c0;
        }

        .vintage-table tfoot td {
            font-weight: bold;
        }
    </style>

    <div class="container">
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
                        <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido">
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
                    <div class="form-group col-md-4 mt-4">
                        <button type="submit" class="btn btn-primary vintage-button">Filtrar Pedidos</button>
                    </div>
                </div>
            </form>

            <div class="col-md-12">
                <?php if(empty($pedidos)): ?>
                <p>No tienes pedidos activos en este momento</p>
                <?php else: ?>
                <table class="vintage-table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Descuento</th>
                            <th scope="col">Total</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($pedido->id_pedido); ?></td>
                            <td><?php echo e($pedido->nombre_cliente); ?></td>
                            <td><?php echo e($pedido->fecha_pedido); ?></td>
                            <td><?php echo e($pedido->porcentaje_descuento); ?>%</td>
                            <td><?php echo e($pedido->sub_total); ?></td>
                            <td><?php echo e($pedido->id_estado_pedido); ?></td>
                            <td>
                                <form method="post" action="<?php echo e(route('detalle.evento')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id_pedido" value="<?php echo e($pedido->id_pedido); ?>">
                                    <button type="submit" class="btn btn-info vintage-button">Ver Detalle</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
        <br>
                    <br>
                    <br>
                    <br>
                    <br>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/Usuario/evento.blade.php ENDPATH**/ ?>