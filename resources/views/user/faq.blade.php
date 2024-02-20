@extends('principal')

@section('breadcrumb', 'faq')
@section('Contenido')

    <div class="card inicio">
        <div class="container-fluid h-custom">
            <div class="card " style="border: 2px solid #963A3B">
                <div class="row d-flex justify-content-center mt-4 align-items-center h-100" style="margin-top:15%">
                    <div class="mt-4">
                        <div class="divider d-flex align-items-center mt-4" style="color: #963A3B">
                            <h1 class="text-center fw-bold mx-3 mt-4 mb-0">Preguntas Frecuentes</h1>
                        </div>

                        <div class="grid-container3 mt-4">
                            <div class="grid-item col3"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Cuál es el precio de un Pastel?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus b1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            El precio final de nuestros productos lo cotizamos con base en el tamaño
                                            solicitado, al realizar su pedido se le notificará el costo que tendrá dicho
                                            pedido.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col4"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Tienen entrega a domicilio?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus r1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Por el momento no contamos con entregas a domicilio, todas las entregas se harán
                                            directamente en nuestra sucursal.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col4"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿En dónde están ubicados? </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus r1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Nos ubicamos en la calle Cementerio #451, Centro, 93550, Gutiérrez Zamora,Ver.
                                            Justo a un lado del cementerio, en contra esquina de Bodega Aurrerá.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col3"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Cuáles son los días y horarios de entrega?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus b1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Por el momento no contamos con entregas a domicilio, nuestra sucursal se
                                            encuentra abierta de lunes a sábado de 9am y 7pm.

                                            Los domingos solamente trabajamos de 10am a 3pm.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col3"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Con cuánto tiempo de anticipación hay que hacer un pedido?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus b1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Te recomendamos hacerlo con la mayor anticipación posible (de preferencia 7 días
                                            antes de tu evento), pero recibimos pedidos hasta 2 días hábiles antes del
                                            evento.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col4"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Cómo sé si mi pedido será realizado?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus r1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Todos los pedidos realizados a través de nuestro sitio se realizarán, aun así
                                            puede verificar en la sección de pedidos, el estado de su pedido.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col4"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Cuáles son las formas de pago? </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus r1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Por el momento la única forma de pago disponible es directamente en nuestra
                                            sucursal, al momento de recibir el pedido.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col3"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Qué sabores tienen?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus b1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Los sabores disponibles van a cambiar de acuerdo al pastel seleccionado. Al
                                            momento de realizar un pedido se mostrarán los sabores disponibles.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col3"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Varía el precio de acuerdo al sabor?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus b1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Si, debido a que el material utilizado para un sabor puede ser diferente para
                                            otro, por esta razón al finalizar su pedido se le indicara el monto total.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col4"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Puedo probar sus pasteles, ofrecen alguna degustación?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus r1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            ¡Claro que tenemos degustaciones! Éstas son todos los días domingos, en nuestra
                                            sucursal, a partir de las 12pm
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col4"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Pueden hacer un pastel que no esté en su página? </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus r1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Por el momento solo realizamos los decorados, sabores y tamaños disponibles en
                                            cada tipo de producto, aún trabajamos en poder expandir nuestra variedad de
                                            productos disponibles en nuestro catálogo.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col3"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Imparten cursos de repostería?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus b1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Por el momento no damos cursos.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
