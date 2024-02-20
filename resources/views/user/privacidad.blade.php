@extends('principal')

@section('breadcrumb', 'priv')
@section('Contenido')


    <div class="card inicio" style="margin-top: 6%">
        <div class="container-fluid h-custom">
            <div class="card mt-2" style="border: 2px solid #5B962F;overflow: hidden">
                <div class="row d-flex justify-content-center mt-4 align-items-center h-100" style="margin-top:15%">


                    <div class="container card " style="background: #8BC34A">
                        <div class="divider d-flex align-items-center mt-4" style="color: #5B962F !important">
                            <h1 class="text-center contorno2 fw-bold mx-3 mt-4 mb-0">Aviso de Privacidad</h1>
                        </div>
                        <h6 class="text-center contorno2 mx-3 mt-2 " style="color: #5B962F !important">
                            <span id="typed3"></span>
                        </h6>
                        <h6 class="text-center contorno2 mx-3 mt-2 " style="color: #5B962F !important">
                            <span id="typed4"></span>
                        </h6>
                        <h6 class="text-center contorno2 mx-3 mt-2 " style="color: #5B962F !important">
                            <span id="typed5"></span>
                        </h6>
                        <h6 class="text-center contorno2 mx-3 mt-2 " style="color: #5B962F !important">
                            <span id="typed6"></span>
                        </h6>
                        <h6 class="text-center contorno2 mx-3 mt-2 " style="color: #5B962F !important">
                            <span id="typed7"></span>
                        </h6>
                        <h6 class="text-center contorno2 mx-3 mt-2 " style="color: #5B962F !important">
                            <span id="typed8"></span>
                        </h6>
                        <h6 class="text-center contorno2 mx-3 mt-2 " style="color: #5B962F !important">
                            <span id="typed9"></span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    var typed3 = new Typed("#typed3", {
        strings: [
            "Pro-Regionales es una plataforma dedicada a facilitar el comercio electrónico entre vendedores y compradores, y estamos comprometidos con la protección de la privacidad y los datos personales de nuestros usuarios. Este aviso de privacidad tiene como objetivo informarte sobre cómo recopilamos, utilizamos, almacenamos y protegemos tus datos personales.",
        ],
        backSpeed: 0,
        typeSpeed: 40,
        onComplete: function () {
            var typed4 = new Typed("#typed4", {
                strings: [
                    "Responsable de la protección de datos personales: Pro-Regionales con domicilio en Altotonga, es el responsable del tratamiento de tus datos personales. Nos comprometemos a proteger la privacidad de tus datos de acuerdo con las leyes de protección de datos aplicables.",
                ],
                backSpeed: 0,
                typeSpeed: 40,
                onComplete: function () {
                    var typed5 = new Typed("#typed5", {
                        strings: [
                            "Datos personales que recopilamos: Para brindarte nuestros servicios de forma eficiente, recopilamos ciertos datos personales que nos proporcionas voluntariamente al registrarte en nuestra plataforma o al interactuar con nuestro sitio web o aplicación. Los datos personales que podemos recopilar incluyen, entre otros:",
                        ],
                        backSpeed: 0,
                        typeSpeed: 40,
                        onComplete: function () {
                            var typed6 = new Typed("#typed6", {
                                strings: [
                                    "   Información de contacto: nombre, dirección de correo electrónico, número de teléfono. Información de la cuenta: nombre de usuario, contraseña. Información de pago: detalles de tarjeta de crédito o débito, información de facturación. Información de perfil: foto de perfil, intereses, preferencias. Información de ubicación: dirección de entrega, ubicación del vendedor.",
                                ],
                                backSpeed: 0,
                                typeSpeed: 40,
                                onComplete: function () {
                                    var typed7 = new Typed("#typed7", {
                                        strings: [
                                            "Finalidad del tratamiento de datos personales. Utilizamos tus datos personales con las siguientes finalidades: Procesar y gestionar las compras y ventas realizadas en nuestra plataforma. Brindarte atención al cliente y soporte técnico. Personalizar tu experiencia de usuario y ofrecerte contenido relevante. Enviar notificaciones sobre el estado de tus pedidos, promociones y actualizaciones. Mejorar nuestros servicios, productos y plataforma mediante análisis y estudios estadísticos. Cumplir con las obligaciones legales y regulatorias aplicables.",
                                        ],
                                        backSpeed: 0,
                                        typeSpeed: 40,
                                        onComplete: function () {
                                            var typed8 = new Typed("#typed8", {
                                                strings: [
                                                    "Compartir información con terceros. En algunos casos, podremos compartir tus datos personales con terceros para cumplir con los fines mencionados anteriormente, tales como: Proveedores de servicios: empresas que nos ayudan a procesar pagos, realizar entregas, enviar correos electrónicos y brindar soporte técnico. Vendedores y compradores: compartimos información relevante para concretar las transacciones entre vendedores y compradores. Autoridades competentes: si así lo requiere la ley o para proteger nuestros derechos o seguridad. Seguridad de los datos personales Implementamos medidas de seguridad para proteger tus datos personales contra el acceso no autorizado, el uso indebido, la alteración o destrucción. Solo el personal autorizado tiene acceso a tus datos, y se les exige mantener la confidencialidad de la información. Derechos ARCO Tienes derecho a acceder, rectificar, cancelar y oponerte al tratamiento de tus datos personales, así como a revocar el consentimiento otorgado. Para ejercer estos derechos o para cualquier pregunta o inquietud sobre el tratamiento de tus datos, puedes contactarnos a través de contacto@pro-regionales.com . Modificaciones al aviso de privacidad. Nos reservamos el derecho de realizar cambios o actualizaciones a este aviso de privacidad en cualquier momento, y dichas modificaciones serán publicadas en nuestra plataforma. Te recomendamos revisar periódicamente este aviso para estar informado sobre cómo protegemos tus datos personales.",
                                                ],
                                                backSpeed: 0,
                                                typeSpeed: 40,

                                                onComplete: function () {
                                                    var typed9 = new Typed(
                                                        "#typed9",
                                                        {
                                                            strings: [
                                                                "Para cualquier asunto relacionado con el presente Aviso de privacidad contacte al Tel:+ 52 (33) 3615-6851 ó mail contacto@pro-regionales.com",
                                                            ],
                                                            typeSpeed: 40,
                                                        }
                                                    );
                                                },
                                            });
                                        },
                                    });
                                },
                            });
                        },
                    });
                },
            });
        },
    });
});
</script>



@endsection
