
<link rel="stylesheet" href="<?php echo e(asset('css/tarjeta.css')); ?>">


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



  




<?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/pago/disenioTarjeta.blade.php ENDPATH**/ ?>