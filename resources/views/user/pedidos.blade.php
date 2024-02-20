@extends('principal')

@section('breadcrumb', 'pedidos')

@section('Contenido')
<div class="container-fluid inicio h-custom mb-4" style="margin-top: 13%;">
    <div class="row d-flex justify-content-center h-100" style="background-color: #8BC34A; margin-bottom: 10%">
        <div class="divider d-flex align-items-center" style="color: #fff">
            <h3 class="contorno2 fw-bold mx-3 mt-4 mb-2" style="color: #5B962F">Mis Compras</h3>
        </div>
        @if($compras->count() == 0)
        <div class="inicio" style="margin-bottom: 20%">
            <div class="container card" style="background: #8BC34A">
                <h1 class="text-center contorno2 mx-3 mt-2" style="color: #5B962F !important">
                    Aun no has realizado compras :(
                </h1>
            </div>
        </div>
        @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped" style="background-color: #5B962F; color: #fff;">
                <thead>
                    <tr >
                        <th class="contorno2 text-center" style="color: #5B962F " >Productos</th>
                        <th class="contorno2 text-center" style="color: #5B962F ">Estado</th>
                        <th class="contorno2 text-center" style="color: #5B962F ">Fecha de compra</th>
                        <th class="contorno2 text-center"style="color: #5B962F ">Método de Entrega / Pago</th>
                        <th class="contorno2 text-center"style="color: #5B962F ">Total</th>

                        <th class="contorno2 text-center"style="color: #5B962F ">Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                    <tr style="color: #fff;">
                        <td>
                            <ul>
                                @foreach ($compra->detalleCompras as $detalleCompra)
                                <li>{{ $detalleCompra->producto->nombre }} </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">{{ $compra->estado }}</td>
                        <td class="text-center">{{ $compra->fechacompra }}</td>
                        <td class="text-center">
                            <p><strong>Entrega:</strong>
                                @if ($compra->metodoentrega == 'En Punto')
                                Entrega en Local  @elseif ($compra->metodoentrega == 'A domicilio')
                                Llegara a tu domicilio @endif</p>
                            <p><strong>Pago:</strong>   @if ($compra->metodopago== 'Efectivo')
                                Efectivo @elseif ($compra->metodopago == 'Tarjeta')
                                Tarjeta @endif</p>
                        </td>
                        <td class="text-center">${{ $compra->total }}</td>

                        <td class="text-center">
                            <a class="btn btn-danger2" href="/compra/{{$compra->id}}">Ver detalles</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection
