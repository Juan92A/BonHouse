<nav class="navbar navbar-expand-lg bg-light navbar-fixed">

    <div class="container">
        <a class="navbar-brand" href="/">PupuSA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

         <!-- Opciones del menu -->
         <div class="offcanvas offcanvas-start half-screen" tabindex="-1" id="navbarNav"
         aria-labelledby="navbarNavLabel">
         <div class="offcanvas-header">
             <h5 class="offcanvas-title" id="navbarNavLabel">Menú</h5>
             <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                 aria-label="Close"></button>
         </div>
         <div class="offcanvas-body justify-content-between">
             <ul class="navbar-nav align-middle">
                 <li class="nav-item">
                     <a class="nav-link" href="/">Inicio</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/productos">Comida</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/nosotros">Nosotros</a>
                 </li>

                 <li>
                     <a class="nav-link" href="/promociones">Promociones</a>
                 </li>    

             </ul>
             <ul class="navbar-nav ms-auto">
                <?php if(Route::has('login')): ?>  
                <li class="ms-auto">
                    <div class="hidden fixed ">
                        <?php if(auth()->guard()->check()): ?>
                        <div class="collapse navbar-collapse" id="navbarScroll">
                            <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-user"></i> <span><?php echo e(auth()->user()->name); ?></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item">
                                            <a class="dropdown-link" href="<?php echo e(route('usuario.perfil')); ?>">
                                                <i class="fas fa-user"></i> Mi perfil
                                            </a>
                                        </li>
                                        <li class="dropdown-item">
                                            

                                            <a href="#" onclick="event.preventDefault(); document.getElementById('pedido-form').submit();">
                                                <i class="fas fa-clipboard-list"></i> <?php echo e(__('Mis pedidos')); ?> 
                                            </a>
                                            
                                            <form id="pedido-form" action="<?php echo e(route('usuario.pedidos')); ?>" method="POST" style="display: none;">
                                                <?php echo csrf_field(); ?>
                                                <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido">
                                                <select id="id_estado" name="id_estado" class="form-control">
                                                    <option value="">Todos</option>
                                                    <option value="1">En proceso</option>
                                                    <option value="2">Finalizado</option>
                                                    <option value="3">Cancelado</option>
                                                </select>
                                            </form>
                                            

                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <?php echo e(__('Cerrar sesión')); ?> <i class="fa-solid fa-sign-out"></i>
                                            </a>
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <li>
                            <a class="nav-link" href="<?php echo e(route('home.carrito')); ?>">
                                <i class="fa-solid fa-cart-shopping"></i> Carrito
                                <?php if(session()->has('carrito')): ?>
                                    <span class="badge bg-danger"><?php echo e(count(session('carrito'))); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        

                        <?php else: ?>


                        <div class="collapse navbar-collapse" id="navbarScroll">
                            
                            <ul class="navbar-nav align-middle">
                                <!-- Pantallas grandes  - ocultar -->
                                <li class="nav-item registrar-btn d-none d-lg-block">
                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-sm nav-link">
                                        <i class="fa-solid fa-user"></i> login
                                    </a>               
    
                                </li>
                                <!-- Pantallas pequeñas login - mostrar -->
                                <li class="nav-item registrar-btn d-none d-lg-block">
                                    <?php if(Route::has('register')): ?>
                                        <a href="<?php echo e(route('register')); ?>" class="btn btn-secondary btn-sm nav-link">Register</a>
                                    <?php endif; ?>
                                    
                                </li>
                            </ul>
                        </div>
                        
                        <?php endif; ?>
                    </div>
                </li>

                <?php endif; ?>
            </ul>
        </div>
    </div>
    </div>
</nav>

<?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/layouts/nav.blade.php ENDPATH**/ ?>