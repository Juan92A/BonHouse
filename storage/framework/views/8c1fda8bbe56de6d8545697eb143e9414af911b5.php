<!-- INSERTAR CONTENIDO -->
<!--<link rel="stylesheet" href="/resources/css/index.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">


<style>
.image-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.image-container img {
    border-radius: 50%;
    width: 150px;
    height: 150px;
    margin: 10px;
}

.image-container img:hover {

    background-color: #f8f8f8;
    box-shadow: 0 0 10px rgba(255, 0, 0, 1);
}

.image-container p {
    text-align: center;
}

.titulo-promociones {
    text-align: center;
    font-weight: bold;
    margin-top: 50px;
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 40px;
    color: #c43f3f;

}

.card {
    transition: transform 0.3s;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.titulo-promociones {
        font-size: 76px; /* Tamaño de fuente más grande */
        font-family: 'Cursive', cursive; /* Cambia la fuente a un estilo más vintage */
        color: #8B4513; /* Color marrón para un aspecto vintage */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Sombra de texto para un efecto más interesante */
}

.img-logo {
    width: 79px; /* Ancho deseado del logo */
    height: auto; /* Mantener la proporción de aspecto */
    border-radius: 50%; /* Redondear los bordes al 50% para hacerlo circular */
    display: block; /* Centrar la imagen horizontalmente */
    margin: 0 auto; /* Centrar la imagen horizontalmente */
    border: 2px solid #8B4513; /* Añadir un borde con color marrón */
    padding: 5px; /* Espacio entre el borde y la imagen */
    

}

</style>

<!-- INSERTAR CONTENIDO -->

<body>
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo e(asset('imgC/cafe2.jpg')); ?>" class="d-block h-100 w-100" alt="...">
                <div class="carousel-caption d-flex justify-content-center align-items-center">
                    <div style="margin-bottom: 25%">
                        <div class="container mt-5">
                            <?php if(Route::has('login')): ?>  
                                    <?php if(auth()->guard()->check()): ?>
                                        <h1 class="titulo-promociones mb-4">Bienvenido <?php echo e(auth()->user()->name); ?>  a BonHouse</h1>
                                        <img src="<?php echo e(asset('imgC/logo1.jpeg')); ?>" class="d-block mx-auto img-logo " alt="Logo BonHouse" style="width: 96px">
                                        <?php else: ?>
                                        <h1 class="titulo-promociones mb-4">Bienvenido a BonHouse</h1>
                                        <img src="<?php echo e(asset('imgC/logo1.jpeg')); ?>" class="d-block mx-auto img-logo " alt="Logo BonHouse" style="width: 96px">
                                        <?php endif; ?>
                                    <?php endif; ?>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('imgC/cafe1.jpg')); ?>" class="d-block h-100 w-100" alt="...">
                <div class="carousel-caption d-flex justify-content-center align-items-center">
                    <div style="margin-bottom: 25%">
                        <div class="container mt-5">
                            <?php if(Route::has('login')): ?>  
                                <?php if(auth()->guard()->check()): ?>
                                    <h1 class="titulo-promociones mb-4">Bienvenido <?php echo e(auth()->user()->name); ?>  a BonHouse</h1>
                                    <img src="<?php echo e(asset('imgC/logo1.jpeg')); ?>" class="d-block mx-auto img-logo " alt="Logo BonHouse" style="width: 96px">
                                    <?php else: ?>
                                    <h1 class="titulo-promociones mb-4">Bienvenido a BonHouse</h1>
                                    <img src="<?php echo e(asset('imgC/logo1.jpeg')); ?>" class="d-block mx-auto img-logo " alt="Logo BonHouse" style="width: 96px">
                                    <?php endif; ?>
                                <?php endif; ?>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('imgC/cafe3.jpg')); ?>" class="d-block h-100 w-100" alt="...">
                <div class="carousel-caption d-flex justify-content-center align-items-center">
                    <div style="margin-bottom: 25%">
                        <div class="container mt-5">
                            <?php if(Route::has('login')): ?>  
                                <?php if(auth()->guard()->check()): ?>
                                    <h1 class="titulo-promociones mb-4">Bienvenido <?php echo e(auth()->user()->name); ?>  a BonHouse</h1>
                                    <img src="<?php echo e(asset('imgC/logo1.jpeg')); ?>" class="d-block mx-auto img-logo " alt="Logo BonHouse" style="width: 96px">
                                    <?php else: ?>
                                    <h1 class="titulo-promociones mb-4">Bienvenido a BonHouse</h1>
                                    <img src="<?php echo e(asset('imgC/logo1.jpeg')); ?>" class="d-block mx-auto img-logo " alt="Logo BonHouse" style="width: 96px">
                                <?php endif; ?>
                            <?php endif; ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
<script>
AOS.init();
</script>
<!-- FIN CONTENIDO --><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/index.blade.php ENDPATH**/ ?>