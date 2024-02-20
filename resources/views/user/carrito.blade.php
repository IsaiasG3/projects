@extends('principal')

@section('breadcrumb', 'Carrito de Compra')
@section('Contenido')
<div class="container-fluid inicio h-custom mb-4" style="margin-top:13%;">
    <div class="row d-flex justify-content-center  h-100" style="background-color: #8BC34A; margin-bottom: 10%">
        <div class="divider d-flex align-items-center" style="color: #fff">
            <h3 class=" contorno2 fw-bold mx-3 mt-4 mb-2" style="color: #5B962F">Carrito de Compras</h3>
        </div>

            <div class="col-md-9">
                @if (Session::has('carrito'))
                    <ul class="list-group mb-4">
                        @php
                            $totalSumado = 0;
                        @endphp
                        @foreach (Session::get('carrito') as $productoId => $productoInfo)
                            @php
                                $producto = \App\Models\Producto::find($productoId);
                                $subtotal = $productoInfo['cantidad'] * $producto->precio;
                                $totalSumado += $subtotal;
                            @endphp
                            @if ($producto)
                                <li class="list-group-item" style="background-color: #5B962F">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <h6 class=" contorno fw-bold mx-3 " style="color: #fff"><a href="/pedir/{{$producto->id}}" style="color: #fff">Producto:   {{ $producto->nombre }}</a></h6>

                                        </div>
                                        <div class="col-md-2">
                                            <h6 class=" contorno fw-bold mx-3 " style="color: #fff">Precio por Unidad: ${{ $producto->precio }}</h6>

                                        </div>
                                        <div class="col-md-2">
                                            <h6 class=" contorno fw-bold mx-3 " style="color: #fff">  Cantidad: {{ $productoInfo['cantidad'] }}</h6>

                                        </div>
                                        <div class="col-md-2">
                                            <h6 class="contorno fw-bold mx-3" style="color: #fff">Subtotal: ${{ $subtotal }}</h6>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="/restar-carrito/{{ $producto->id }}" class="btn btn-sm btn-danger2">-</a>
                                            <a href="/agregar-carrito/{{ $producto->id }}" class="btn btn-sm btn-succes">+</a>

                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @else


                <div class="divider d-flex align-items-center" style="color: #fff">
                    <h3 class="contorno fw-bold mx-3" style="color: #fff">El carrito está vacío :(</h3>
                </div>

                @endif

            <div class="col-md-3" >
                @if (Session::has('carrito'))
                <div class="card mb-4">
                    <h3 class=" text-center  fw-bold mx-3 mt-4 " style="color: #5B962F">Total: ${{ $totalSumado }}</h3>
                    <a href="/comprar" class="btn btn-secondary mt-3">Comprar</a>
                </div>

                @endif
            </div>
        </div>

    </div>
    <div class="row mt-2">
        <div class="col-md-12">

        </div>
    </div>
@endsection
