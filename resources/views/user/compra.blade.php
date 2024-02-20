    @extends('principal')

    @section('breadcrumb', 'Compra')

    @section('Contenido')
    <div class="container-fluid inicio h-custom mb-4" style="margin-top: 13%;">
        <div class="row d-flex justify-content-center h-100" style="background-color: #8BC34A; margin-bottom: 10%">
            <div class="divider d-flex align-items-center" style="color: #fff">
                <h3 class="contorno2 fw-bold mx-3 mt-4 mb-2" style="color: #5B962F">Detalles de Compra</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" style="background-color: #5B962F; color: #fff;">
                    <thead>
                        <tr >
                            <th class="contorno2 text-center" style="color: #5B962F">Producto</th>
                            <th class="contorno2 text-center" style="color: #5B962F">Precio</th>
                            <th class="contorno2 text-center" style="color: #5B962F">Cantidad</th>
                            <th class="contorno2 text-center" style="color: #5B962F">Total</th>
                            <th class="contorno2 text-center" style="color: #5B962F">Ubicación</th>
                            <th class="contorno2 text-center" style="color: #5B962F">Vendedor</th>
                            <th class="contorno2 text-center" style="color: #5B962F">Calificar</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detallesCompra as $detalleCompra)
                        <tr style="color: #fff">

                            <td class="text-center">  <a href="/pedir/{{$detalleCompra->producto->id}}" style="color: #fff">{{ $detalleCompra->producto->nombre }}</a></td>
                            <td class="text-center">${{ $detalleCompra->producto->precio }}</td>
                            <td class="text-center">{{ $detalleCompra->cantidad }}</td>
                            <td class="text-center">${{ $detalleCompra->total }}</td>
                            <td class="text-center">
                                @if ($detalleCompra->producto->metodoentrega == 'En Punto')
                                {{ $detalleCompra->producto->usuario->ubicacionVenta->estado}},
                                {{ $detalleCompra->producto->usuario->ubicacionVenta->ciudad}},
                                    {{ $detalleCompra->producto->usuario->ubicacionVenta->direccion}}
                                @else
                                   Llegara a tu domicilio
                                @endif
                            </td>
                            <td class="text-center">{{ $detalleCompra->producto->usuario->name }} <br>
                                <a href="/enviar-mensaje/{{ $detalleCompra->producto->id }}" class="btn btn-danger2">Enviar Mensaje</a>
                            </td>
                            <td class="text-center">
                                <a href="/calificar-producto/{{ $detalleCompra->producto->id }}" class="btn btn-danger2">Calificar Producto</a>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($compra->estado == 'Pago pendiente' && $compra->metodopago == 'Tarjeta')
                <div class="divider d-flex align-items-center mt-4" style="color: white">
                    <div id="paypal-button-container"></div>
                </div>

                <script>
                      document.addEventListener('DOMContentLoaded', function () {
                    paypal.Buttons({
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: '{{ $compra->total }}' // Aquí debes pasar el monto total de la compra
                                    }
                                }]
                            });
                        },
                        onApprove: function(data, actions) {
                            return actions.order.capture().then(function(details) {
                                // Actualizar el estado de la compra a "Pagado" aquí
                                window.location.href = '/actualizarcompra/{{ $compra->id }}';
                            });
                        }
                    }).render('#paypal-button-container');
                });
                </script>
            @endif
            </div>
        </div>
    </div>
    @endsection
