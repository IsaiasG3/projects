@extends('principal')

@section('breadcrumb', 'Carrito de Compra')

@section('Contenido')
<div class="container-fluid inicio h-custom mb-4" style="margin-top: 13%;">
    <div class="row d-flex justify-content-center h-100" style="background-color: #8BC34A; margin-bottom: 10%">
        @foreach ($compras as $compra)
            <div class="col-md-8 mb-4 pt-4"> <!-- Columna izquierda -->
                <div class="card">
                    <div class="card-header " style="background-color: #5B962F">
                        
                        @if ($compra['metodoentrega'] == 'En Punto')
                            <h5 class="contorno" style="color: #FFF">Tendrás que recoger la compra y se pagará en {{ $compra['metodopago'] }}</h5>
                        @elseif ($compra['metodoentrega'] == 'A domicilio')
                            <h5 class="contorno" style="color: #FFF">La entrega llegará al domicilio seleccionado y se pagará en {{ $compra['metodopago'] }}</h5>
                        @endif
                    </div>
                    <div class="card-body" style="background-color: #5B962F">
                        <ul class="list-group">
                            @php
                                $totalSumado = 0;
                            @endphp
                            @foreach ($compra['productos'] as $producto)
                                @php
                                    $totalSumado += $producto['subtotal'];
                                @endphp
                                <li class="list-group-item" style="background-color: #8BC34A;border: 1px solid #FFF;">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <h6 class="contorno fw-bold   mx-3"
                                                style="color: #fff">Producto: <a
                                                    href="/pedir/{{$producto['id']}}"
                                                    style="color: #FFF">{{ $producto['nombre'] }}</a></h6>
                                        </div>
                                        <div class="col-md-2">
                                            <h6 class="contorno fw-bold  mx-3"
                                                style="color: #FFF">${{ $producto['precio'] }}</h6>
                                        </div>
                                        <div class="col-md-2">
                                            <h6 class="contorno fw-bold   mx-3"
                                                style="color: #FFF">Cantidad: {{ $producto['cantidad'] }}</h6>
                                        </div>
                                        <div class="col-md-2">
                                            <h6 class="contorno  fw-bold  mx-3"
                                                style="color: #FFF">Subtotal: ${{ $producto['subtotal'] }}</h6>
                                        </div>
                                        <div class="col-md-2">
                                            <h6 class="contorno  fw-bold  mx-3"
                                                style="color: #FFF"> $Total: ${{ $totalSumado }}</h6>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
         <!-- Columna para el resumen de compra -->
         <div class="col-md-8 mb-4 pt-4">
            <div class="card">
                <div class="card-header " style="background-color: #5B962F">
                    <h4 class="contorno fw-bold" style="color: #fff">Confirmar Compra</h4>
                </div>
                <div class="card-body" style="background-color: #5B962F">
                    @php
                        $mostrarSelectDomicilio = false;
                    @endphp

                    <!-- Bloque para mostrar el select de ubicación si aplica -->
                    @foreach ($compras as $compra)
                        @if ($compra['metodoentrega'] == 'A domicilio')
                            @php
                                $mostrarSelectDomicilio = true;
                            @endphp
                            <h6 class="" style="color: #fff">Selecciona una ubicación de entrega:</h6>
                            <form action="/guardarcompra" method="POST" id="formUbicacionDomicilio">
                                @csrf

                                <select name="ubicacion_id" class="form-control mb-3" style="border: 3px solid #5B962F;" id="ubicacionDomicilio">
                                    @foreach ($ubicaciones as $ubicacion)
                                        <option value="{{ $ubicacion->id }}">{{ $ubicacion->direccion }}</option>
                                    @endforeach
                                </select>

                                <!-- Agrega aquí otros campos que necesites enviar en el formulario -->
                                <div class="divider d-flex align-items-center my-4">
                                    <div class="text-center text-lg-start">
                                        <button type="submit" class="btn btn-danger2">Confirmar Compra</button>
                                    </div>
                                </div>
                            </form>
                            @break
                        @endif
                    @endforeach

                    <!-- Mostrar solo el botón de confirmar compra si no se muestra el select -->
                    @if (!$mostrarSelectDomicilio)
                        <form action="/guardarcompra" method="POST" id="formOtroBoton">
                            @csrf
                            <!-- Agrega aquí otros campos que necesites enviar en el formulario -->
                            <div class="divider d-flex align-items-center my-4">
                                <div class="text-center text-lg-start">
                                    <button type="submit" class="btn btn-danger2">Confirmar Compra</button>
                                </div>
                            </div>
                        </form>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
