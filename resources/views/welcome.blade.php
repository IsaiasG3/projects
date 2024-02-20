@extends('principal')

@section('breadcrumb', 'home')
@section('Contenido')
    <!-- Presentacion-->
    <div class="card inicio" style="margin-top: 6%">
        <div class="container-fluid h-custom">
            <div class="card mt-4" style="border: 2px solid #5B962F; overflow: hidden">
                <div class="row d-flex justify-content-center mt-4 align-items-center h-100" style="margin-top:18%">
                    <!--Inicio-->




                    <!--Mas vendidos-->
                    <div class="container" style="background-color: #5B962F;padding: 0 15px;">
                        <div class="divider d-flex align-items-center mt-4" style="color: white">
                            <h1 class="text-center contorno fw-bold mx-3 mt-4 mb-2">Bienvenido a Pro-Regionales</h1>
                        </div>
                            <h3 class="text-center contorno fw-bold mx-3 mb-4" style="color: #fff">¡Navega entre todos nuestros productos!</h3>
                        <div class="row mb-0">
                            <div class="col mb-0">

                                    <div id="carouselExampleControls" class="carousel slide d-none d-md-block"
                                        data-bs-ride="carousel" style="height: 300px !important">
                                        <div class="carousel-inner" style="background-color: #fff">
                                            @foreach ($productos->chunk(3) as $key => $chunk)
                                                <div class="carousel-item{{ $key == 0 ? ' active' : '' }}"
                                                    style="background-color: #5B962F">
                                                    <div class="row">
                                                        @foreach ($chunk as $producto)
                                                            <div class="col-md-4">
                                                                <div class="d-flex flex-column justify-content-center"
                                                                    style="background-color: #5B962F">


                            <img src="{{ asset($producto->imagen->url) }}" class="img-fluid mx-auto mb-2" style="border: 2px solid #5B962F">

                                                                    <button type="button" class="btn btn-succes"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modal{{ $producto->id }}">Ver
                                                                        detalles</button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Anterior</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Siguiente</span>
                                        </button>
                                    </div>


                                <div id="carouselExampleControlsMobile" class="carousel slide d-md-none"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($productos as $key => $producto)
                                            <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
                                                <div class="d-flex flex-column justify-content-center"
                                                    style="background-color: #8BC34A">
                                                    <img src="{{ asset($producto->imagen->url) }}" class="img-fluid mx-auto"
                                                        style="border: 2px solid #5B962F">
                                                    <button type="button" class="btn btn-primary "
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal{{ $producto->id }}">Ver detalles</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControlsMobile" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Anterior</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControlsMobile" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Siguiente</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="divider d-flex align-items-center " style="background-color: #8BC34A">
                        <h3 class="text-center contorno2 fw-bold mx-3 mt-4 mb-2" style="color: #5B962F">¡Navega entre las diferentes categorias disponibles</h3>
                    </div>
                     <!-- Categorias-->

                     <div class="row justify-content-center" style="background-color: #8BC34A">
                        <div class="col-sm-4 text-center">
                            <h3 class="contorno2" style="color: #5B962F">Artesanias</h3>
                            <div class="card mb-2"style="border: 2px solid #5B962F">
                                <a href="/buscar-productos-categoria">
                                    <img src="https://s1.significados.com/foto/shutterstock-513513718_bg.jpg"
                                        class="card-img-top card-img" alt="Artesanias">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <h3 class="contorno2  " style="color: #5B962F">Verduras</h3>
                            <div class="card mb-2" style="border: 2px solid #5B962F">

                                <a href="/buscar-productos-categoria">
                                    <img href="/gelatinas"
                                        src="https://phantom-marca.unidadeditorial.es/f26736e71a6bfb79e3a2b0c631a1bf4e/resize/828/f/jpg/assets/multimedia/imagenes/2023/05/30/16854588843943.jpg"
                                        class="card-img-top card-img" alt="Verduras">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <h3 class="contorno2" style="color: #5B962F">Citricos</h3>
                            <div class="card mb-2" style="border: 2px solid #5B962F">
                                <a href="/buscar-productos-categoria">
                                    <img src="https://ca-times.brightspotcdn.com/dims4/default/47af907/2147483647/strip/true/crop/1057x704+0+0/resize/1200x799!/quality/80/?url=https%3A%2F%2Fcalifornia-times-brightspot.s3.amazonaws.com%2Fb0%2F5c%2F29916d79427cba121ca08dcc456c%2Fnaranjos.jpg"
                                        class="card-img-top card-img" alt="Citricos">
                                </a>
                            </div>
                        </div>
                    </div>
                      <!--Sobre Nosotros-->
                      <div class="container card " style="background: #5B962F">
                        <div class="divider d-flex align-items-center mt-4" style="color: white">
                            <h1 class="text-center contorno fw-bold mx-3 mt-4 mb-0">¿Quiénes Somos?</h1>
                        </div>
                        <h4 class="text-center contorno mx-3 mt-4 mb-4" style="color: white">
                            Somos Pro-Regionales, una empresa comprometida con la promoción y venta de productos regionales de alta calidad. Nuestro objetivo es conectar a los productores locales con los consumidores, ofreciendo una amplia variedad de productos frescos y auténticos.
                            En Pro-Regionales nos enorgullece apoyar la economía local y fomentar el consumo responsable. Trabajamos de la mano con agricultores y productores artesanales para asegurar que nuestros clientes obtengan los mejores productos directamente desde sus comunidades.
                            Valoramos la calidad, la sostenibilidad y la satisfacción de nuestros clientes. Nuestro equipo está comprometido en brindar un excelente servicio y asegurar que cada compra sea una experiencia única y satisfactoria.
                        </h4>
                        <div class="text-center mb-4">
                            <a href="/acerca" class="btn btn-danger2 btn-lg mx-auto w-50 d-none d-md-block ">Conoce más acerca
                                de nosotros</a>
                            <a href="/acerca" class="btn btn-sm btn-danger2 mx-auto w-50 d-block d-md-none">Conoce más acerca
                                de nosotros</a>
                        </div>
                    </div>
                    @guest

                    <div class="container card " style="background: #8BC34A">
                        <div class="divider d-flex align-items-center mt-4" style="color: white">
                            <h1 class="text-center contorno fw-bold mx-3 mt-4 mb-0">Registrate</h1>
                        </div>
                        <h3 class="text-center contorno mt-2 mx-3 mb-4" style="color: white">
                            Para poder tener la experiencia completa
                            en nuestro sitio necesitas registrarte.
                        </h3>
                        <div class="text-center mb-4">
                            <a href="/register" class="btn btn-primary btn-lg mx-auto w-50 d-none d-md-block ">Registrate</a>
                            <a href="/register" class="btn btn-primary btn-sm  mx-auto w-50 d-block d-md-none">Registrate</a>

                        </div>

                    </div>

                @else
                <div class="container card " style="background: #8BC34A">

                    <div class="divider d-flex align-items-center mt-4" style="color: white">

 <h3 class="text-center contorno mt-2 mx-3 mb-4" style="color: white">
                        Ingresa al extenso catalogo de productos registrados

                    </h3>
                    </div>
  <a href="/productos" class="btn btn-danger2 mb-4 btn-lg mx-auto w-50 d-none d-md-block ">Ver Productos</a>
  <a href="/productos" class="btn btn-danger2 btn-sm mb-4 mx-auto w-50 d-block d-md-none">Ver Productos</a>


                </div>

                    @if (!$user || $domicilios->isEmpty())
                        <div class="container card" style="background: #8BC34A">
                            <div class="divider d-flex align-items-center mt-4" style="color: white">
                                <h1 class="text-center contorno fw-bold mx-3 mt-4 mb-0">¡Agrega tu ubicación!</h1>
                            </div>
                            <h4 class="text-center contorno mx-3 mt-4 mb-4" style="color: white">
                                Para una mejor experiencia, por favor agrega tu ubicación.
                            </h4>
                            <div class="text-center mb-4">
                                <a href="/ubicaciones" class="btn btn-primary btn-lg mx-auto w-50 d-none d-md-block">Agregar Ubicación</a>
                                <a href="/ubicaciones" class="btn btn-primary btn-sm mx-auto w-50 d-block d-md-none">Agregar Ubicación</a>
                            </div>
                        </div>
                    @endif

                @endguest

                    @foreach ($productos as $producto)
                        <div class="modal fade" id="modal{{ $producto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-body" style="background: linear-gradient(to bottom, #8BC34A, #FFFFFF); border: 1px solid #5B962F;">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <img src="{{ $producto->imagen->url}}" alt="{{ $producto->nombre }}" class="img-fluid"  style="border: 3px solid #5B962F;">
                                            </div>
                                            <div class="col-md-6">
                                                <h3 class=" mt-4 contorno text-center" style="color: #FFF">Producto: {{ $producto->nombre }}</h3>
                                                <h5  class="contorno text-center mt-2"style="color: #FFF">Precio: ${{ $producto->precio }}</h5>
                                                <h5 class="contorno text-center" style="color: #FFF">Disponible: {{ $producto->disponible }}</h5>

                                                @if ($producto->oferta)
                                                    <h5 style="color: #fff" class="contorno text-center">Oferta: {{$producto->oferta}}</h5>
                                                @endif

                                            </div>
                                            <div class="mt-4 text-center">
                                                    <a href="/pedir/{{$producto->id}}"class="btn btn-secondary">Ver Producto</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>







                </div>
            </div>
        </div>
    </div>
@endsection
