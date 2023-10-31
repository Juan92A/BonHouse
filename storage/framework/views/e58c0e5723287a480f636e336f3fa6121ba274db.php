

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
        <h1 class="vintage-text" style="color: #c43f3f;">Evento de: <?php echo e($eventos->nombre_cliente); ?></h1>
        <h1 class="vintage-text" style="color: #c43f3f;">fecha de evento: <?php echo e($eventos->fecha_evento); ?></h1>

        <div class="row">
            <div class="col-md-12">
                <table class="vintage-table table-striped table-hover">
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
                <button type="submit" class="btn btn-success btn-sm vintage-button">Cambiar estado</button>
            </form>
        <?php endif; ?>
        <hr>
        <a href="#" onclick="window.print()" class="btn btn-primary btn-sm vintage-button">Imprimir Pedido</a>
    </div>
    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/Admin/detalleEvento.blade.php ENDPATH**/ ?>