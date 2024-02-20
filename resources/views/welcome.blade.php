@extends('principal')

@section('breadcrumb', 'home')
@section('Contenido')
    <!-- Presentacion-->
    <div class="card inicio" style="margin-top: 6%">
        <div class="container-fluid h-custom">
            <div class="card mt-4" style="border: 2px solid #963A3B; overflow: hidden">
                <div class="row d-flex justify-content-center mt-4 align-items-center h-100" style="margin-top:18%">

                    <!--Carrusel-->
                    <div id="carouselExampleIndicators" class="carousel slide mt-3" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://lkbitronic.b-cdn.net/wp-content/uploads/2019/03/280319-551207-PK1O92-23.jpg"class="d-block w-100"
                                    alt="Imagen Representativa">
                                <div class="carousel-caption d-md-block">
                                    <h3 class="mt-5" style="color: #963A3B">Bienvenidos a Dulce Esperanza</h3>
                                    <p style="color: #963A3B">Pastelería y Repostería de la mejor calidad</p>
                                    <a href="/productos" class="btn btn-primary btn-sm d-inline-block">Nuestros
                                        Productos</a>

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://saboryestilo.com.mx/wp-content/uploads/2019/05/los-pasteles-mas-populares-del-mundo.jpg"
                                    class="d-block w-100" alt="Imagen Representativa">
                            </div>
                            <div class="carousel-item">
                                <img src="https://www.suqiee.com.mx/wp-content/uploads/2017/05/instagram-pastel-cl%C3%A1sico-6.jpg"
                                    class="d-block w-100" alt="Imagen Representativa">
                            </div>
                            <div class="carousel-item">
                                <img src="https://www.hcchotels.com/files/mejores-pasteler%C3%ADas-de-Barcelona-1024x646.jpg"
                                    class="d-block w-100" alt="Imagen Representativa">

                            </div>
                            <div class="carousel-item">
                                <img src="https://aranzazu.com/wp-content/uploads/2022/08/Pastel-cafe-150-1000.webp"
                                    class="d-block w-100" alt="Imagen Representativa">

                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <!-- Categorias-->
                    <div class="container" style="background-color: #FAEEC1">
                        <div class="divider d-flex align-items-center  mb-4" style="color: #963A3B">
                            <h1 class="text-center titulo2 mx-3 mt-4 mb-0">Navega entre nuestras diferentes categorías</h1>
                        </div>
                        <div class="row justify-content-center mx-2 my-2">
                            <div class="col-sm-4 text-center">

                                <div class="card mb-2"style="border: 2px solid #963A3B">
                                    <h3 class="titulo3">Pasteles</h3>
                                    <a href="/pasteles">
                                        <img src="https://aranzazu.com/wp-content/uploads/2022/08/Pastel-Vainilla-Fresas-150-1000-2.webp"
                                            class="card-img-top card-img" alt="Pasteles">

                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-4 text-center">

                                <div class="card mb-2" style="border: 2px solid #963A3B">
                                    <h3 class="titulo3">Gelatinas</h3>
                                    <a href="/gelatinas">
                                        <img href="/gelatinas"
                                            src="https://cocinamia.com.mx/wp-content/uploads/2020/02/a-84.png"
                                            class="card-img-top card-img" alt="Gelatinas">

                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4 text-center">

                                <div class="card mb-2" style="border: 2px solid #963A3B">
                                    <h3 class="titulo3">Galletas</h3>
                                    <a href="/galletas">
                                        <img src="https://assets.unileversolutions.com/recipes-v2/38528.jpg"
                                            class="card-img-top card-img" alt="Galletas">

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Sobre Nosotros-->
                    <div class="container card " style="background: #963A3B">
                        <div class="divider d-flex align-items-center mt-4" style="color: white">
                            <h1 class="text-center contorno fw-bold mx-3 mt-4 mb-0">¿Quiénes Somos?</h1>
                        </div>
                        <h4 class="text-center contorno mx-3 mt-4 mb-4" style="color: white">
                            Somos una empresa mexicana con más de 14 años de experiencia en el sector gastronómico. Desde el
                            año
                            2015, nos hemos especializado en la pastelería y repostería, ofreciendo productos de alta
                            calidad y
                            sabor inigualable. Nos enorgullece ser una empresa comprometida con nuestros clientes y con la
                            excelencia en todo lo que hacemos. Cada día trabajamos arduamente para superar las expectativas
                            de
                            nuestros clientes y seguir siendo líderes en el mercado local.</h4>
                        <div class="text-center mb-4">
                            <a href="/acerca" class="btn boton btn-lg mx-auto w-50 d-none d-md-block ">Conoce más acerca
                                de nosotros</a>
                            <a href="/acerca" class="btn boton btn-sm  mx-auto w-50 d-block d-md-none">Conoce más acerca
                                de nosotros</a>

                        </div>
                    </div>

                    <!--Mas vendidos-->
                    <div class="container" style="background-color: #FAEEC1;padding: 0 15px;">
                        <div class="divider d-flex align-items-center mt-4 mb-2">
                            <h3 class="text-center contorno2 fw-bold mx-3 mb-2" style="color: #963A3B">¡Nuestros productos
                                más vendidos!</h3>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div id="carouselExampleControls" class="carousel slide d-none d-md-block"
                                    data-bs-ride="carousel" style="height: 300px !important">
                                    <div class="carousel-inner mb-4" style="background-color: #FAEEC1">
                                        @foreach ($productos->chunk(3) as $key => $chunk)
                                            <div class="carousel-item{{ $key == 0 ? ' active' : '' }}"
                                                style="background-color: #FAEEC1">
                                                <div class="row">
                                                    @foreach ($chunk as $producto)
                                                        <div class="col-md-4">
                                                            <div class="d-flex flex-column justify-content-center"
                                                                style="background-color: #FAEEC1">
                                                                <img src="{{ asset($producto->imagen) }}"
                                                                    class="img-fluid mx-auto"
                                                                    style="border: 2px solid #963A3B">
                                                                <button type="button" class="btn btn-primary  "
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
                                                    style="background-color: #FAEEC1">

                                                    <img src="{{ asset($producto->imagen) }}" class="img-fluid mx-auto"
                                                        style="border: 2px solid #963A3B">
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
                    @foreach ($productos as $producto)
                    <div class="modal fade" id="modal{{ $producto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header" style="background-color: #FAEEC1; border: 1px solid #963A3B;">
                              <h5 class="modal-title titulo3 " id="exampleModalLabel">{{ $producto->nombre }}</h5>
                              <button type="button" class="btn-close btn-primary" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="background-color: #FAEEC1; border: 1px solid #963A3B;">
                                <div class="row">
                                  <div class="col-md-6">
                                    <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" class="img-fluid"  style="border: 1px solid #963A3B;">
                                  </div>
                                  <div class="col-md-6">
                                    <p class="mt-4" style="color: #963A3B">{{ $producto->nombre }}</p>
                                    <p style="color: #963A3B">Precio: ${{ $producto->precio }}</p>
                                    <p style="color: #963A3B">Tamaño: {{ $producto->tamaño }}</p>
                                    <p style="color: #963A3B">Sabor: {{ $producto->sabor }}</p>
                                    <p style="color: #963A3B">Color: {{ $producto->color }}</p>
                                    <div class="mt-4">
                                        <a href="/pedir/{{$producto->id}}"class="btn btn-primary">Realizar Pedido</a>
                                      </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    @endforeach





                    <!--Mapas-->

                    <div class="container mt-4">
                        <div class="divider d-flex align-items-center mt-4" style="color: #963A3B">
                            <h1 class="text-center titulo mx-3 mt-4 mb-0">¡Ven a Visitarnos!</h1>
                        </div>

                        <div class="row justify-content-center " style="padding: 0 15px">

                            <div class="col-sm-6">
                                <div id='map' style='width: 100%; height: 400px;'></div>
                            </div>
                            <div class="col-sm-6" id='contacto'>
                                <div class="divider d-flex align-items-center ">
                                    <h3 class="text-center fw-bold mx-3 mb-0" style="color:#963A3B">Nos Ubicamos En:</h3>

                                </div>

                                <h6 class="text-center mx-3 mt-4 " style="color:#963A3B">
                                    Calle Cementerio #451, Centro, 93550, Gutiérrez Zamora,Ver.
                                    <br> Justo a un lado del cementerio, en contra esquina de Bodega Aurrerá.
                                </h6>
                                <h6 class="text-center mx-3 mt-4 " style="color:#963A3B">
                                    Horarios de atención:
                                    <br> Lunes a Viernes
                                    <br> 9:00 a.m. a 6:00 p.m
                                    <br> Sábado y Domingo
                                    <br> 10:00 a.m. a 3:00 p.m
                                </h6>
                                <h6 class="text-center  mx-3 mb-4" style="color:#963A3B">
                                    <br>Llámanos también a los teléfonos:
                                    <br> <i class="bi bi-telephone-fill" style="color: #963A3B"></i> +52 783-126-8744
                                    <br> <i class="bi bi-telephone-fill" style="color: #963A3B"></i> +52 783-152-5741
                                </h6>

                                <div class="divider d-flex align-items-center mt-4">
                                    <button class="btn btn-danger btn-hove validarb" id="cambiar">Obtener
                                        Indicaciones</button>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center mt-2 " id="instructions"
                                style="color: #963A3B;background-color: #FAEEC1"></div>

                        </div>
                    </div>





                </div>
            </div>


        </div>
    </div>

    @endsection

