@extends('principal')

@section('breadcrumb', 'pedidos')
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
                Aún no hay pedidos.
                </h1>
            </div>
        </div>
        @endif
        @foreach($productos as $producto)


        <div class="col-md-3 mt-4 mb-3">
              <div class="card text-black h-100 card-producto" style="border: 2px solid #963A3B" >
                <div class="card-img-container1">
                <img src="{{ asset($producto->producto->imagen) }}" alt="Imagen del producto">
                </div>
                <h6 class="card-title p-2 text-center" style="color: #963A3B">
                    <h6 class="card-title p-2 text-center" style="color: #963A3B">
                        {{$producto->nombre}} </h6>
                        <h6 class="card-title p-2 text-center" style="color: #963A3B">
                          Tamaño: {{ $producto->tamaño }} </h6>
                           <h6 class="card-title p-2 text-center" style="color: #963A3B">
                               Sabor: {{ $producto->sabor }} </h6>
                               <h6 class="card-title p-2 text-center" style="color: #963A3B">
                                   Color: {{ $producto->color }} </h6>
                <div class="card-footer d-flex" style="background-color: #FAEEC1">
                    <h6 class="card-title p-2 text-center" style="color: #963A3B">
                        Fecha de Entrega: {{ $producto->entrega}} </h6>
                </div>
              </div>
            </div>
        @endforeach
    </div>
</div>
</div>

</div>
@endsection
