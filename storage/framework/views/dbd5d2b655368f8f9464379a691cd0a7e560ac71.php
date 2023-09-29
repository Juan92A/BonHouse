

<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/tarjeta.css')); ?>">


<div class="container mt-3">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="col-md-6 offset-md-3 text-center">Información de Tarjeta de Crédito</h4>
                    <?php if(session('error_pedido')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo e(session('error_pedido')); ?>

                    </div>
                    <?php endif; ?>
                    <?php
                    session()->forget(['error_pedido', 'success_pedido']);
                    ?>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('pedido.procesarPedido')); ?>" method="POST" id="miFormulario">
                      
                        <?php echo csrf_field(); ?>
                        <!-- tabla de resumen de pedido -->
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
                                        <input type="hidden" name="total_pagar" value="<?php echo e($total); ?>">
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="flex-fill col-md-6 mt-4 ">
                          <div class="mb-3">
                              <label for="direccion_envio" class="form-label">Dirección de envío:</label>
                              <input type="text" class="form-control" name="direccion_envio" id="direccion_envio" required>
                          </div>
                          <input type="hidden" name="id_estado_pedido" value="1">
                      </div>

                      
                        <button type="submit" id="botonEnviar" class="btn-enviar" >Pagar</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="contenedor">

  <!-- Tarjeta -->
  <section class="tarjeta" id="tarjeta">
    <div class="delantera">
      <div class="logo-marca" id="logo-marca">
        <!-- <img src="img/logos/visa.png" alt=""> -->
      </div>
      <img src="<?php echo e(asset('img/chip-tarjeta.png')); ?>" class="chip" alt="">
      <div class="datos">
        <div class="grupo" id="numero">
          <p class="label">Número Tarjeta</p>
          <p class="numero">#### #### #### ####</p>
        </div>
        <div class="flexbox">
          <div class="grupo" id="nombre">
            <p class="label">Nombre Tarjeta</p>
            <p class="nombre">Jhon Doe</p>
          </div>

          <div class="grupo" id="expiracion">
            <p class="label">Expiracion</p>
            <p class="expiracion"><span class="mes">MM</span> / <span class="year">AA</span></p>
          </div>
        </div>
      </div>
    </div>

    <div class="trasera">
      <div class="barra-magnetica"></div>
      <div class="datos">
        <div class="grupo" id="firma">
          <p class="label">Firma</p>
          <div class="firma"><p></p></div>
        </div>
        <div class="grupo" id="ccv">
          <p class="label">CCV</p>
          <p class="ccv"></p>
        </div>
      </div>
      <p class="leyenda">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus exercitationem, voluptates illo.</p>
      <a href="#" class="link-banco">www.tubanco.com</a>
    </div>
  </section>

  <!-- Contenedor Boton Abrir Formulario -->
  <div class="contenedor-btn">
    <button class="btn-abrir-formulario" id="btn-abrir-formulario">
      <i class="fas fa-plus"></i>
    </button>
  </div>

  <!-- Formulario -->
  <form id="formulario-tarjeta" class="formulario-tarjeta">
    <div class="grupo">
      <label for="inputNumero">Número Tarjeta</label>
      <input type="text" id="inputNumero" maxlength="19" autocomplete="off" >
    </div>
    <div class="grupo">
      <label for="inputNombre">Nombre</label>
      <input type="text" id="inputNombre" maxlength="19" autocomplete="off" >
    </div>
    <div class="grupo">
      <label for="inputNombre">dirección</label>
      <input type="text" id="direccion_envio" nambe="direccion_envio" maxlength="19" autocomplete="off" >
    </div>
    <div class="flexbox">
      <div class="grupo expira">
        <label for="selectMes">Expiracion</label>
        <div class="flexbox">
          <div class="grupo-select">
            <select name="mes" id="selectMes" >
              <option disabled selected>Mes</option>
            </select>
            <i class="fas fa-angle-down"></i>
          </div>
          <div class="grupo-select">
            <select name="year" id="selectYear" >
              <option disabled selected>Año</option>
            </select>
            <i class="fas fa-angle-down"></i>
          </div>
        </div>
      </div>

      <div class="grupo ccv">
        <label for="inputCCV">CCV</label>
        <input type="text" id="inputCCV" maxlength="3" >
      </div>
    </div>

  </form>
</div>



<?php $__env->stopSection(); ?>


<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('js/tarjeta.js')); ?>"></script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/pago/tarjeta.blade.php ENDPATH**/ ?>