@extends('principal')

@section('breadcrumb', 'produc')
@section('Contenido')



<div class="card inicio" style="margin-top: 6%">
    <div class="container-fluid h-custom">
        <div class="card mt-2" style="border: 2px solid #5B962F;overflow: hidden">
            <div class="row d-flex justify-content-center mt-4 align-items-center h-100" style="margin-top:15%">


    <div class=" container mt-4 row" style="background-color: #8BC34A">

<!-- #B2DF8A-->


        @if($productos->count() == 0)
        <div class="inicio" style="margin-bottom: 20%">
            <div class="container card " style="background: #8BC34A">
                <h1 class="text-center contorno2 mx-3 mt-2 " style="color: #5B962F !important">
              Lo sentimos, no hay productos:(
                </h1>
            </div>
        </div>
        @endif
        @foreach($productos as $producto)


        <div class="col-md-3 mt-4 mb-3">
              <div class="card text-black h-100 card-producto" style="border: 2px solid #5B962F; background-color: #B2DF8A" >
                <div class="card-img-container1">
                <img src="{{ asset($producto->imagen->url) }}" alt="Imagen del producto">
                </div>
                <h6 class="card-title contorno p-2 text-center" style="color: #FFF">
                     {{$producto->nombre}} ${{$producto->precio}} </h6>

                <div class="card-footer d-flex">
                    <button type="button" class="btn btn-secondary "
                    data-bs-toggle="modal"
                    data-bs-target="#modal{{ $producto->id }}">Ver detalles</button>
                </div>
              </div>
            </div>
        @endforeach
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
                                <h5  class="contorno text-center mt-4"style="color: #FFF">Precio: ${{ $producto->precio }}</h5>
                                @if ($producto->oferta)
                                    <h5 style="color: #fff" class="contorno text-center">Oferta: {{$producto->oferta}}</h5>
                                @endif

                            </div>
                            <h5  class="contorno text-center mt-4"style="color: #FFF">Descripción: {{ $producto->descripcion }}</h5>
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


@endsection

