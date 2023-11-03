<style>
/* Estilo para el fondo y fuente de la barra de navegación */
.navbar-fixed {
    background-color: #8B4513;
    /* Color marrón para el fondo */
}

.navbar-brand {
    font-family: 'Cursive', cursive;
    /* Fuente estilo vintage */
    font-size: 24px;
    /* Tamaño de fuente */
    color: #FFF;
    /* Color de fuente blanco */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    /* Sombra de texto */
}

/* Estilo para los botones del menú */
.navbar-toggler-icon,
.navbar-toggler-icon:focus {
    background-color: #FFF;
    /* Color de fondo del botón hamburguesa */
}

.navbar-toggler,
.navbar-toggler:focus,
.navbar-toggler:hover {
    border: 2px solid #FFF;
    /* Borde blanco al pasar el mouse sobre el botón */
    color: #FFF;
    /* Color de fuente blanco */
}

/* Estilo para los enlaces del menú */
.navbar-nav .nav-link {
    font-family: 'Cursive', cursive;
    /* Fuente estilo vintage */
    font-size: 20px;
    /* Tamaño de fuente */
    color: #FFF;
    /* Color de fuente blanco */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    /* Sombra de texto */
}

.navbar-nav .nav-link:hover {
    color: #FFD700;
    /* Color dorado al pasar el mouse sobre los enlaces */
}

/* Estilo para el botón de carrito */
.carrito-btn {
    font-size: 24px;
    /* Tamaño de fuente */
    color: #FFF;
    /* Color de fuente blanco */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    /* Sombra de texto */
}

.carrito-btn:hover {
    color: #FFD700;
    /* Color dorado al pasar el mouse sobre el botón de carrito */
}

/* Estilo para el botón de registro y login */
.registrar-btn {
    font-family: 'Cursive', cursive;
    /* Fuente estilo vintage */
    font-size: 18px;
    /* Tamaño de fuente */
    color: #FFF;
    /* Color de fuente blanco */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    /* Sombra de texto */
    border: 2px solid #FFF;
    /* Borde blanco */
}

.registrar-btn:hover {
    background-color: #FFF;
    /* Fondo blanco al pasar el mouse sobre el botón */
    color: #8B4513;
    /* Color marrón para el texto al pasar el mouse */
}

/* Estilo para la imagen del logo */
.img-logo {
    width: 49px;
    /* Ancho deseado del logo */
    height: auto;
    /* Mantener la proporción de aspecto */
    border-radius: 50%;
    /* Redondear los bordes al 50% para hacerlo circular */
    display: block;
    /* Centrar la imagen horizontalmente */
    margin: 0 auto;
    /* Centrar la imagen horizontalmente */
    border: 2px solid #8B4513;
    /* Añadir un borde con color marrón */
    padding: 2px;
    /* Espacio entre el borde y la imagen */


}

/* Estilo para los enlaces del menú cuando se posiciona el cursor sobre ellos (hover) */
.navbar-nav .nav-link:hover {
    color: #8B4513;
    /* Cambia el color del texto al color marrón al pasar el mouse */
    background-color: rgb(252, 227, 182);
    /* Cambia el color de fondo a un tono de amarillo claro al pasar el mouse */
    border-radius: 10px;
    /* Redondea los bordes */
    transition: color 0.3s, background-color 0.3s;
    /* Agrega una transición suave */
}
</style>





<nav class="navbar navbar-expand-lg bg-light navbar-fixed">

    <div class="container p-0">
        <img src="<?php echo e(asset('imgC/logo1.jpeg')); ?>" class="d-block mx-auto img-logo " alt="Logo BonHouse">
        <a class="navbar-brand m-1" href="/">BonHouse</a>
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
                    <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/productos">Productos</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">Pedidos</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="nav-link" href="<?php echo e(route('home.carrito')); ?>">
                                    <i class="fa-solid fa-cart-shopping"></i> Pedidos en Evento
                                    <?php if(session()->has('carrito')): ?>
                                    <span class="badge bg-danger"><?php echo e(count(session('carrito'))); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>


                            <li>
                                

                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    onclick="event.preventDefault(); document.getElementById('pedido-form').submit();">
                                    <i class="fas fa-clipboard-list"></i> Atender Pedidos
                                </a>

                                <form id="pedido-form" action="<?php echo e(route('admin.pedidos')); ?>" method="POST"
                                    style="display: none;">
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
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">Eventos</a>
                        <ul class="dropdown-menu">
                            <li>

                                <a class="nav-link" href="/eventos">
                                    <i class="fa-solid fa-cart-shopping"></i> Crear eventos
                                    <?php if(session()->has('carritoEvento')): ?>
                                    <span class="badge bg-danger"><?php echo e(count(session('carritoEvento'))); ?></span>
                                    <?php endif; ?>
                                </a>


                            </li>
                            <li><a class="nav-link" href="/verEventos"><i class="fas fa-calendar-alt"></i> Visualizar eventos</a>
                            </li>
                        </ul>
                    </li>

                    <?php endif; ?>

                    <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Productos</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="/login" role="button"
                            aria-expanded="false">Pedidos</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="nav-link" href="/login">
                                    <i class="fa-solid fa-cart-shopping"></i> Pedidos en Evento
                                    <?php if(session()->has('carrito')): ?>
                                    <span class="badge bg-danger"><?php echo e(count(session('carrito'))); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>


                            <li>

                                <a class="nav-link" href="/login" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fas fa-clipboard-list"></i> Atender Pedidos
                                </a>

                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="/login" role="button"
                            aria-expanded="false">Eventos</a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/login"><i class="fas fa-calendar-plus"></i> Crear eventos</a>
                            </li>
                            <li><a class="nav-link" href="/login"><i class="fas fa-calendar-alt"></i> Visualizar
                                    eventos</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>







                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if(Route::has('login')): ?>
                    <li class="ms-auto">
                        <div class="hidden fixed ">
                            <?php if(auth()->guard()->check()): ?>
                            <div class="collapse navbar-collapse" id="navbarScroll">
                                <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll"
                                    style="--bs-scroll-height: 100px;">
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


                                                <a href="#"
                                                    onclick="event.preventDefault(); document.getElementById('pedido-form').submit();">
                                                    <i class="fas fa-clipboard-list"></i> <?php echo e(__('Mis pedidos')); ?>

                                                </a>

                                                <form id="pedido-form" action="<?php echo e(route('usuario.pedidos')); ?>"
                                                    method="POST" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="date" class="form-control" id="fecha_pedido"
                                                        name="fecha_pedido">
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
                                                <a href="<?php echo e(route('logout')); ?>"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <?php echo e(__('Cerrar sesión')); ?> <i class="fa-solid fa-sign-out"></i>
                                                </a>
                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                                    style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>




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
                                        <a href="<?php echo e(route('register')); ?>"
                                            class="btn btn-secondary btn-sm nav-link">Register</a>
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



<?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/layouts/nav.blade.php ENDPATH**/ ?>