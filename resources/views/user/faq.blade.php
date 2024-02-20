@extends('principal')

@section('breadcrumb', 'faq')
@section('Contenido')

    <div class="card inicio">
        <div class="container-fluid h-custom">
            <div class="card " style="border: 2px solid #5B962F">
                <div class="row d-flex justify-content-center mt-4 align-items-center h-100" style="margin-top:15%">
                    <div class="mt-4">
                        <div class="divider d-flex align-items-center mt-4" style="color: #5B962F">
                            <h1 class="text-center fw-bold mx-3 mt-4 mb-0">Preguntas Frecuentes</h1>
                        </div>

                        <div class="grid-container3 mt-4">
                            <div class="grid-item col3"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Cómo puedo registrarme en Pro-Regionales?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus b1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Para registrarte en Pro-Regionales, dirígete a la página de registro y completa el formulario con tus datos personales, como nombre, correo electrónico y número de teléfono. Luego, elige una contraseña segura y confirma tu registro.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col4">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Puedo vender mis productos en Pro-Regionales?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus r1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            ¡Por supuesto! Pro-Regionales es una plataforma que permite a los usuarios vender sus productos. Solo necesitas crear una cuenta de vendedor, agregar tus productos y establecer los precios. Una vez que tus productos estén disponibles, los compradores podrán verlos y realizar compras.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col4"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Cómo puedo contactar a un vendedor? </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus r1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Puedes contactar a un vendedor a través de la función de mensajería interna de Pro-Regionales. Una vez que inicies sesión, ve a la página del producto que te compraste y haz clic en el botón "Contactar al vendedor". Podrás enviarle un mensaje y resolver cualquier duda que tengas sobre el producto.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col3"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Cómo puedo pagar mis compras en Pro-Regionales?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus b1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Pro-Regionales ofrece varias opciones de pago, como tarjetas de crédito, débito y pago en efectivo. Al momento de realizar la compra,se mostrara el método de pago disponible y podrás completar la transacción de forma segura.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col3"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Cuánto tiempo tarda en llegar mi pedido?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus b1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            El tiempo de entrega puede variar según el vendedor y el método de envío seleccionado. Al realizar una compra, recibirás información sobre el tiempo estimado de entrega. Si tienes alguna inquietud sobre el estado de tu pedido, puedes contactar al vendedor para obtener más detalles.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col4"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Qué hago si tengo un problema con mi compra?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus r1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Si tienes algún problema con tu compra, te recomendamos contactar al vendedor en primer lugar para intentar resolverlo directamente. Si no logras llegar a un acuerdo, puedes comunicarte con nuestro equipo de soporte a través del formulario de contacto. Estaremos encantados de ayudarte a resolver cualquier inconveniente.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col4"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Cómo puedo cambiar mi información de perfil?</h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus r1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            Puedes actualizar tu información de perfil iniciando sesión en tu cuenta y luego haciendo clic en la sección "Cuenta". Desde allí, podrás editar tus datos personales, como nombre, dirección de correo electrónico y número de teléfono.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col3"">
                                <div class="cart">
                                    <div class="cart-header d-flex align-items-center">
                                        <h5 class="mb-0 text-center pa">
                                            ¿Qué medidas de seguridad tiene Pro-Regionales para proteger mi información personal?
                                        </h5>
                                        <button class="btn btn-link ms-auto navbar-toggler" type="button"
                                            data-toggle="collapse" data-target=".cart-body" aria-expanded="false"
                                            aria-controls="cartBody">
                                            <i class="bi bi-plus b1"></i>
                                        </button>

                                    </div>
                                    <div class="cart-body collapse">
                                        <div class="card-body text-start">
                                            En Pro-Regionales, nos tomamos muy en serio la seguridad de la información de nuestros usuarios. Utilizamos tecnologías de encriptación y seguimos las mejores prácticas de seguridad para proteger tus datos personales. Además, nunca compartimos tu información con terceros sin tu consentimiento.
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

    <script>
        $(document).ready(function() {
    $('.cart-header').on('click', function() {
      var isOpen = $(this).next('.cart-body').hasClass('show');
      $('.cart-body').collapse('hide');
      if (!isOpen) {
        $(this).next('.cart-body').collapse('show');
        $(this).find('i').toggleClass('bi-plus bi-dash');
      } else {
        $(this).find('i').toggleClass('bi-plus bi-dash');
      }
    });
  });

    </script>
@endsection
