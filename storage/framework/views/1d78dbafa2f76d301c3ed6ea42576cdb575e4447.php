

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


        <h1 class="vintage-text ">Eventos Realizados</h1>

        

        <div class="col-md-12">
            <?php if(empty($pedidos)): ?>
            <p>No tienes pedidos activos en este momento</p>
            <?php else: ?>
            <table id="miTabla" class="vintage-table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Descuento</th>
                        <th scope="col">Total</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Modificar estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pedido->id_pedido); ?></td>
                        <td><?php echo e($pedido->nombre_cliente); ?></td>
                        <td><?php echo e($pedido->fecha_evento); ?></td>
                        <td>
                        <?php if($pedido->Estado === 'Cancelado'): ?>
                        <p class="text-danger"><?php echo e($pedido->Estado); ?></p>
                    <?php elseif($pedido->Estado === 'Programado'): ?>
                        <p class="text-success"><?php echo e($pedido->Estado); ?></p>
                        
                    <?php elseif($pedido->Estado === 'Finalizado'): ?>
                        <p class="text-success"><?php echo e($pedido->Estado); ?></p>
                    <?php else: ?>
                        <p><?php echo e($pedido->Estado); ?></p>
                    <?php endif; ?>

                 
                        </td>
                        <td><?php echo e($pedido->porcentaje_descuento); ?>%</td>
                        <td>$<?php echo e($pedido->sub_total); ?></td>
                        <td>
                            <form method="post" action="<?php echo e(route('detalle.evento')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id_pedido" value="<?php echo e($pedido->id_pedido); ?>">
                                <button type="submit" class="btn btn-info vintage-button">Ver Detalle</button>
                            </form>
                        </td>
                        <td class="text-center col-2">
                            <?php if($pedido->Estado === 'Pendiente' || $pedido->Estado === 'Programado'): ?>
                            <form method="post" action="<?php echo e(route('evento.cambiarEstado')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <label for="id_estado2">Estado:</label>
                                    <select id="id_estado2" name="id_estado2" class="form-control">
                                    <?php if($pedido->Estado === 'Pendiente'): ?>
                                        <option value="1">Pendiente</option>
                                        
                                    <?php endif; ?>
                                      <option value="2">Programado</option>
                                        <option value="3">Cancelado</option>                                        
                                        <option value="4">Finalizado</option>
                                    </select>
                                </div>

                                <input type="hidden" name="id_pedido" value="<?php echo e($pedido->id_pedido); ?>">
                                <button type="submit" class="vintage-button">Cambiar estado</button>

                            </form>
                            <?php endif; ?>
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



<script>
$(document).ready(function() {
    $('#miTabla').DataTable({
        paging: true, // Habilita la paginación
        pageLength: 10, // Define la cantidad de filas por página
    });
});
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/Usuario/evento.blade.php ENDPATH**/ ?>