@extends('principal')

@section('breadcrumb', 'produc')
@section('Contenido')



<div class="card inicio" style="margin-top: 6%">
    <div class="container-fluid h-custom">
        <div class="card mt-2" style="border: 2px solid #963A3B;overflow: hidden">
            <div class="row d-flex justify-content-center mt-4 align-items-center h-100" style="margin-top:15%">


    <div class=" container mt-4 row" style="background-color: #FAEEC1">


        @if($productos->count() == 0)
        <div class="inicio" style="margin-bottom: 20%">
            <div class="container card " style="background: #FAEEC1">
                <h1 class="text-center contorno2 mx-3 mt-2 " style="color: #963A3B !important">
              Lo sentimos, no hay productos:(
                </h1>
            </div>
        </div>
        @endif
        @foreach($productos as $producto)


        <div class="col-md-3 mt-4 mb-3">
              <div class="card text-black h-100 card-producto" style="border: 2px solid #963A3B" >
                <div class="card-img-container1">
                <img src="{{ asset($producto->imagen) }}" alt="Imagen del producto">
                </div>
                <h6 class="card-title p-2 text-center" style="color: #963A3B">
                     {{$producto->nombre}} </h6>

                <div class="card-footer d-flex">
                    <button type="button" class="btn btn-primary "
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


    </div>
</div>
</div>

</div>
@endsection

