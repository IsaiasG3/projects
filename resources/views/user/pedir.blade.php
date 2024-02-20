@extends('principal')

@section('breadcrumb', 'pedir')
@section('Contenido')

<div class="container-fluid inicio h-custom" style="background-color: #FFF">
    <div class="row d-flex justify-content-center  h-100">
        <div class="col-md-6"  style="margin-top: 6%" >
            <!-- Carrusel de imágenes -->
            <div id="carruselProducto" class="carousel" data-bs-ride="carousel" >
                <div class="carousel-inner">
                    @foreach ($producto->imagenes as $imagen)
                        <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                            <img src="{{ asset($imagen->url) }}" class="d-block mx-auto" alt="{{ $producto->nombre }}"
                                style="max-height: 400px; object-fit: contain;"> <!-- Ajustamos la altura máxima y el ajuste de la imagen -->
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carruselProducto" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carruselProducto" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-6 mb-4" style="margin-top: 6%">

            <div class="card" style="background: linear-gradient(to bottom, #8BC34A, #FFFFFF);">
                <div class="divider d-flex align-items-center" style="color: #fff">
                    <h3 class=" contorno fw-bold mx-3 mt-4 mb-2">{{ $producto->nombre }}</h3>
                </div>
                <div class="container">
                <h5 class=" contorno" style="color: #ffF">Precio: ${{ $producto->precio }}</h5>
                @if ($producto->oferta)
                <h5 style="color: #fff" class=" contorno">Oferta: {{$producto->oferta}}</h5>
            @endif
                <h5 class=" contorno" style="color: #ffF">Disponible: {{ $producto->disponible }}</h5>
                <h5 style="color: #fff" class= "contorno">Descripción: {{$producto->descripcion}}</h5>
                <h5 class=" contorno" style="color: #ffF">Entrega en:
                    @if ($producto->metodoentrega == 'En Punto')
                   {{ $producto->usuario->ubicacionVenta->estado}},{{ $producto->usuario->ubicacionVenta->ciudad}},  {{ $producto->usuario->ubicacionVenta->direccion}}  @elseif ($producto->metodoentrega == 'A domicilio')
                    Llegara a tu domicilio @endif



                </h5>
                <h5 class=" contorno" style="color: #fff">Metodo de Pago Disponible: {{ $producto->metodopago }}</h5>
</div>

            <!-- Botones de compra y carrito -->
            <div class="text-center mt-4" >

                <a href="/agregarcarrito/{{ $producto->id }}" class="btn btn-primary mb-3">Agregar al Carrito</a>
            </div>
        </div>
        </div>
    </div>
</div>


@endsection


