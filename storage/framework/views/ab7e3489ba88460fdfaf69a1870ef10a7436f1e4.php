

<?php $__env->startSection('content'); ?>
<div class="container">
    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            transform-style: preserve-3d;
        }

        .card:hover {
            transform: rotateY(10deg);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.4); /* Ajusta los valores según tu preferencia */
        }

        .vintage-text {
            background-color: #f5e8c0; /* Fondo desgastado */
            font-family: 'Courier New', monospace; /* Fuente de estilo retro */
            padding: 10px; /* Espacio interno para el texto */
            border-radius: 5px; /* Bordes redondeados */
            font-size: 44px; /* Tamaño de fuente */
            text-align: center; /* Centrar el texto horizontalmente */
        }

        .vintage-button {
            background-color: #f5e8c0; /* Color de fondo */
            color: #964f19; /* Color del texto */
            border: 2px solid #964f19; /* Borde con color del texto */
            font-family: 'Courier New', monospace; /* Fuente de estilo retro */
            padding: 10px 20px; /* Espaciado interior del botón */
            border-radius: 5px; /* Bordes redondeados */
            text-decoration: none; /* Elimina el subrayado del enlace */
            display: inline-block; /* Hace que el botón se comporte como un bloque en línea */
            transition: background-color 0.3s, color 0.3s; /* Transición suave al pasar el cursor */
        }

        .vintage-button:hover {
            background-color: #964f19; /* Cambia el color de fondo al pasar el cursor */
            color: #f5e8c0; /* Cambia el color del texto al pasar el cursor */
        }

        .vintage-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: 'Courier New', monospace; /* Fuente de estilo retro */
        }

        .vintage-table th,
        .vintage-table td {
            border: 1px solid #964f19; /* Borde con color del texto */
            padding: 8px;
            text-align: left;
        }

        .vintage-table thead {
            background-color: #f5e8c0; /* Color de fondo para la fila de encabezados */
        }

        .vintage-table th {
            background-color: #964f19; /* Color de fondo para las celdas de encabezado */
            color: #f5e8c0; /* Color del texto de encabezado */
        }

        .vintage-table tbody tr:nth-child(even) {
            background-color: #f5e8c0; /* Color de fondo para filas pares */
        }

        .vintage-table tbody tr:nth-child(odd) {
            background-color: #fff; /* Color de fondo para filas impares */
        }

        .vintage-table tfoot {
            background-color: #f5e8c0; /* Color de fondo para la fila de pie de tabla */
        }

        .vintage-total2 {
            font-size: 24px; /* Tamaño de fuente personalizado para el texto "Total" */
            color: #964f19; /* Color del texto */
        }

        .vintage-amount2 {
            font-size: 28px; /* Tamaño de fuente personalizado para el monto total */
            color: #964f19; /* Color del texto */
        }

        .vintage-table tfoot td {
            font-weigh
            
            .text-center {
    text-align: center;
}




t: bold; /* Texto del pie de tabla en negrita */
        }
    </style>

    <h1 class="vintage-text mt-5">Pedidos Realizados</h1>


    <hr>

    <div class="">
        <table id="miTabla" class="vintage-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nombre</th>
                    <th>Total a Pagar</th>
                    <th>Fecha del Pedido</th>
                    <th>Estado</th>
                    <th>Ver Productos</th>
                    <th>Modificar estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $totalfinal = 0; // Inicializa la variable $totalfinal a 0
                ?>
                <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($pedido->id_pedido); ?></td>
                    <td><?php echo e($pedido->nombre_cliente); ?></td>
                    <td>$<?php echo e($pedido->total_pagar); ?></td>
                    <td><?php echo e($pedido->fecha_pedido); ?></td>
                     
                    <td>

                    <?php if($pedido->Estado === 'Cancelado'): ?>
                        <p class="text-danger"><?php echo e($pedido->Estado); ?></p>
                    <?php elseif($pedido->Estado === 'Pagado'): ?>
                        <p class="text-success"><?php echo e($pedido->Estado); ?></p>
                    <?php else: ?>
                        <p><?php echo e($pedido->Estado); ?></p>
                    <?php endif; ?>

                    <?php if($pedido->Estado === 'Pagado'): ?>
                        <?php    
                            $totalfinal += $pedido->total_pagar;
                        ?>
                    <?php endif; ?>
                    </td>
                    <td>
                        <form method="post" action="<?php echo e(route('detalle.pedido')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id_pedido" value="<?php echo e($pedido->id_pedido); ?>">
                            <button type="submit" class="vintage-button">Ver Detalle</button>
                        </form>
                    </td>
                    <td class="text-center col-2">
                    <?php if($pedido->Estado === 'En Proceso'): ?>
                        <form method="post" action="<?php echo e(route('admin.cambiarEstado')); ?>">
                            <?php echo csrf_field(); ?>
                          
                                <div class="form-group">
                                    <label for="id_estado2">Estado:</label>
                                    <select id="id_estado2" name="id_estado2" class="form-control">
                                        <option value="1">En proceso</option>
                                        <option value="2">Pagado</option>
                                        <option value="3">Cancelado</option>
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

       <div class="row">
        <div class="col-5">
            <table class="vintage-table" >
                <tr>
                    <td >Total</td>
                    <td >$<?php echo e($totalfinal); ?> </td>
                </tr>
               </table>
        </div>
       </div>

        <br>
       
        <div class="text-center">
            <a type="button" id="cambiarEstadosButton" class="btn btn-warning" onclick="mostrarAlerta()">Cierre Diario</a>
            <a href="#" onclick="window.print()" class="btn btn-primary btn-sm">Guardar Informe</a>
        </div>
        
        

        <br>
    </div> 
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(document).ready(function() {  
        $('#miTabla').DataTable({
            paging: true,  // Habilita la paginación
            pageLength: 10, // Define la cantidad de filas por página
        });
    });
    function mostrarAlerta() {

        Swal.fire({
            title: '¿Finalizar Ventas en Evento?',
            text: 'Esto eliminará todos los pedidos. ¿Deseas continuar?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, Finalizar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Aquí puedes poner la lógica para eliminar los registros
                window.location.href = "<?php echo e(route('borrar')); ?>";
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // El usuario canceló la operación
                Swal.fire('Operación cancelada', '', 'error');
            }
        });


    }
</script>







    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/Admin/Pedidos.blade.php ENDPATH**/ ?>