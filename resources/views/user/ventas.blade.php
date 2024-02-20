@extends('principal')

@section('breadcrumb', 'Mis Ventas')

@section('Contenido')
<div class="container-fluid inicio h-custom mb-4" style="margin-top: 13%;">
    <div class="row d-flex justify-content-center h-100" style="background-color: #8BC34A; margin-bottom: 10%">
        <div class="divider d-flex align-items-center" style="color: #fff">
            <h3 class="contorno2 fw-bold mx-3 mt-4 mb-2" style="color: #5B962F">Mis Ventas</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" style="background-color: #5B962F; color: #fff;">
                <thead>
                    <tr>
                        <th class="contorno2 text-center" style="color: #5B962F">Producto</th>
                        <th class="contorno2 text-center" style="color: #5B962F">Precio</th>
                        <th class="contorno2 text-center" style="color: #5B962F">Cantidad</th>
                        <th class="contorno2 text-center" style="color: #5B962F">Total</th>
                        <th class="contorno2 text-center" style="color: #5B962F">Ubicación</th>
                        <th class="contorno2 text-center" style="color: #5B962F">Comprador</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detallesVenta as $detalleVenta)
                    <tr style="color: #fff">
                        <td class="text-center">
                            <a href="/pedir/{{ $detalleVenta->producto->id }}" style="color: #fff">{{ $detalleVenta->producto->nombre }}</a>
                        </td>
                        <td class="text-center">${{ $detalleVenta->producto->precio }}</td>
                        <td class="text-center">{{ $detalleVenta->cantidad }}</td>
                        <td class="text-center">${{ $detalleVenta->total }}</td>
                        <td class="text-center">
                            @if ($detalleVenta->id_ubicacion === null)
                            Entrega en tu domicilio
                        @else
                            {{ $detalleVenta->ubicacion->estado }},
                            {{ $detalleVenta->ubicacion->ciudad }},
                            {{ $detalleVenta->ubicacion->direccion }}
                        @endif
                        </td>
                        <td class="text-center">
                            {{ $detalleVenta->venta->comprador->name }}
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
