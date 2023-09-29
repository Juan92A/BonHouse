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
</style>

<!-- INSERTAR CONTENIDO -->

<body>
    @include('layouts.header')




    <div class="container mt-5">
    @if (Route::has('login'))  
     @auth
        <h1 class="titulo-promociones mb-4">Bienvenido {{ auth()->user()->name }}  a BonHouse</h1>
        @else
        <h1 class="titulo-promociones mb-4">Bienvenido a BonHouse</h1>
        @endauth
     @endif
        <!-- <div class="row">
            <div class="col-md-6 col-lg-4 text-center mb-4">
                <img src="{{ asset('img/pu1.jpg') }}" class="rounded img-fluid" data-aos="zoom-in" alt="...">
            </div>
            <div class="col-md-6 col-lg-4 text-center mb-4">
                <img src="{{ asset('img/pu2.jpg') }}" class="rounded img-fluid" data-aos="zoom-in" alt="...">
            </div>
            <div class="col-md-6 col-lg-4 text-center mb-4">
                <img src="{{ asset('img/pu1.jpg') }}" class="rounded img-fluid" data-aos="zoom-in" alt="...">
            </div>
        </div> -->

    </div>


<!-- 

    <div class="container">
        <h1 class="titulo-promociones  mb-5">El secreto son nuestros ingredientes</h1>
        <div class="row">
            <div class="col-sm-6 col-md-3" data-aos="fade-up">
                <div class="card">
                    <img src="{{ asset('img/c1.jpg') }}" class="card-img-top" alt="Imagen 3">
                    <div class="card-body">
                        <h5 class="card-title">Queso</h5>
                        <p class="card-text">Usamos el mejor queso para hacer pupusas</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3" data-aos="fade-up">
                <div class="card">
                    <img src="{{ asset('img/c2.jpg') }}" class="card-img-top" alt="Imagen 3">
                    <div class="card-body">
                        <h5 class="card-title">Frijoles</h5>
                        <p class="card-text">Se preparan con frijoles de calidad</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3" data-aos="fade-up">
                <div class="card">
                    <img src="{{ asset('img/c3.jpg') }}" class="card-img-top" alt="Imagen 3">
                    <div class="card-body">
                        <h5 class="card-title">Chile</h5>
                        <p class="card-text">No puede faltar el buen chile para la salsita</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3" data-aos="fade-up">
                <div class="card">
                    <img src="{{ asset('img/c4.jpg') }}" class="card-img-top" alt="Imagen 4">
                    <div class="card-body">
                        <h5 class="card-title">Maiz</h5>
                        <p class="card-text">Se usa maiz de calidad para tener una masa suave</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container">
        <h1 class="titulo-promociones mb-4">Aqui Encontrarás</h1>
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="image-container">
                    <p>Pupusas</p>
                    <img src="{{ asset('img/pu3.jpg') }}" alt="Imagen 1" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="image-container">
                    <p>Refrescos</p>
                    <img src="{{ asset('img/ref1.jpg') }}" alt="Imagen 2" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="image-container">
                    <p>Promociones</p>
                    <img src="{{ asset('img/prom1.jpg') }}" alt="Imagen 3" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="image-container">
                    <p>Postres</p>
                    <img src="{{ asset('img/postre1.jpg') }}" alt="Imagen 4" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

 -->

    @include('layouts.footer')
</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
<script>
AOS.init();
</script>
<!-- FIN CONTENIDO -->