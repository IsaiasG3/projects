@extends('principal')

@section('breadcrumb', 'acerca')
@section('Contenido')
    <div class="card inicio" style="margin-top: 7.5%">
        <div class="container-fluid h-custom">
            <div class="card mt-4" style="border: 2px solid #5B962F; overflow: hidden">
                <div class="row d-flex justify-content-center mt-4 align-items-center h-100" style="margin-top:20%">
                    <div class="container card " style="background: #8BC34A">
                        <div class="divider d-flex align-items-center mt-4" style="color: #5B962F !important">
                            <h1 class="text-center contorno2 fw-bold mx-3 mt-4 mb-0">¿Quiénes Somos?</h1>
                        </div>
                        <h4 class="text-center contorno2 mx-3 mt-4 mb-4" style="color: #5B962F !important">
                            <span id="typed"></span>
                        </h4>

                    </div>
                    <div class="container card " style="background: #5B962F">
                        <div class="divider d-flex align-items-center mt-4" style="color: white">
                            <h1 class="text-center contorno fw-bold mx-3 mt-4 mb-0">¿Por qué escogernos?</h1>
                        </div>
                        <h4 class="text-center contorno mx-3 mt-4 mb-4" style="color: white">
                            <span id="typed2"></span>
                        </h4>

                        </h4>

                    </div>
                    <div class="container card " style="background: #8BC34A">
                        <div class="divider d-flex align-items-center mt-4" style="color: #5B962F !important">
                            <h1 class="text-center contorno2 fw-bold mx-3 mt-4 mb-0">Nuestra Historia</h1>
                        </div>
                        <h4 class="text-center contorno2 mx-3 mt-4 mb-4" style="color: #5B962F !important">
                            Desde nuestra fundación en 2022, hemos recorrido un emocionante camino para convertirnos en el referente del comercio local en línea. Comenzamos con la visión de crear un espacio digital donde los talentosos vendedores locales pudieran dar a conocer sus productos únicos y hechos con amor, y los compradores pudieran descubrir tesoros auténticos que no se encuentran en ningún otro lugar.

                            A lo largo de los años, hemos establecido relaciones cercanas con vendedores locales, artesanos y pequeños negocios, construyendo una sólida comunidad que se apoya mutuamente. Cada compra realizada en nuestra plataforma contribuye al crecimiento y prosperidad de estos emprendedores, lo que nos llena de satisfacción y orgullo.</h4>
                    </div>
                    <div class="container" style="background: #5B962F">
                        <div class="divider d-flex align-items-center mt-4" style="color: #fff">
                            <h1 class="text-center contorno mx-3 mt-4 mb-0">Nuestra mayor cualidad</h1>
                        </div>
                        <h4 class="text-center contorno mx-3 mt-4 mb-4" style="color: white">

                            Nuestra plataforma es el hogar de productos únicos y auténticos que no encontrarás en otras tiendas en línea. Trabajamos estrechamente con vendedores locales y artesanos talentosos que crean productos con amor y dedicación. Descubre tesoros exclusivos que reflejan la creatividad y la esencia de nuestra comunidad.</h4>

                    </div>

                    <div class="grid-container">
                        <div class="grid-item col2 card" style="background-color: #8BC34A">
                            <h3 class="text-center fw-bold mx-3 mb-0">Misión</h3>
                            <h5 class="text-center  mx-3 mt-2 mb-2">
                                Fomentar y fortalecer el comercio local y responsable, conectando a emprendedores, artesanos y pequeños negocios con una comunidad apasionada por descubrir productos únicos y auténticos. Nos esforzamos por proporcionar una plataforma segura y confiable donde nuestros usuarios puedan comprar y vender con confianza, creando así un impacto positivo en la economía local y en la vida de las personas.
                            </h5>
                        </div>
                        <div class="grid-item card col1 " style="background-color: #5B962F">
                            <h3 class="text-center fw-bold mx-3 ">Visión</h3>
                            <h5 class="text-center  mx-3 mt-2 mb-2">
                                Convertirnos en la principal plataforma de comercio en línea para productos locales y artesanales, reconocida por su compromiso con la sostenibilidad, la autenticidad y la experiencia de compra personalizada. Aspiramos a ser una comunidad dinámica y diversa, en la cual los vendedores encuentren un espacio para dar a conocer su talento, y los compradores encuentren una amplia variedad de productos únicos que reflejen la riqueza cultural y creativa de nuestra región.
                            </h5>
                        </div>
                        <div class="grid-item card col2" style="background-color: #8BC34A">
                            <h3 class="text-center fw-bold mx-3 mb-0">Nuestro Objetivo</h3>
                            <h5 class="text-center  mx-3 mt-2 mb-2">
                                Fomentar el crecimiento y desarrollo de pequeños negocios y emprendedores locales, brindándoles una plataforma para llegar a nuevos clientes y expandir su presencia en el mercado.

                                Impulsar prácticas comerciales responsables con el medio ambiente, alentando a nuestros vendedores a adoptar enfoques sostenibles en la producción y el embalaje de sus productos.

                                Difundir el mensaje sobre los beneficios del comercio local y responsable, concientizando a la sociedad sobre la importancia de apoyar a pequeños negocios y a la economía local.

                           </h5>
                            </h5>
                        </div>
                    </div>





                    <div class="divider d-flex align-items-center mt-2 mb-2 " style="background-color: #5B962F">
                        <h1 class="text-center contorno fw-bold mx-3 mt-2 mb-4" style="color: #fff">Nuestros Valores</h1>

                    </div>
                    <div class="grid-container2">
                        <div class="grid-item col2" style="background-color: #8BC34A">
                            <h5 class="text-center fw-bold mx-3  ">Integridad</h5>
                            <h6 class="text-center  mx-3 mt-2 ">
                                Nos guiamos por los más altos estándares éticos y actuamos con honestidad y transparencia en todas nuestras interacciones.
                            </h6>
                        </div>
                        <div class="grid-item col1 " style="background-color: #5B962F">
                            <h5 class="text-center fw-bold mx-3">Innovación</h5>
                            <h6 class="text-center  mx-3 mt-2">
                                Abrazamos el cambio y la innovación como motores de progreso. Estamos comprometidos a mejorar y adaptar constantemente nuestra plataforma para satisfacer las necesidades de nuestros usuarios.</h6>
                        </div>
                        <div class="grid-item col2" style="background-color: #8BC34A">
                            <h5 class="text-center fw-bold mx-3 ">    Compromiso con la comunidad</h5>
                            <h6 class="text-center  mx-3 mt-2">
                            Nos enorgullece ser parte de una comunidad vibrante y diversa. Nos comprometemos a apoyar el desarrollo de la comunidad y a devolver a quienes confían en nosotros.
                            </h6>
                        </div>
                        <div class="grid-item col1" style="background-color: #5B962F">
                            <h5 class="text-center fw-bold mx-3">  Excelencia en el servicio al cliente</h5>
                            <h6 class="text-center  mx-3 mt-2 ">
                              Nos apasiona ofrecer un servicio al cliente excepcional. Estamos aquí para escucharte, responder tus preguntas y resolver cualquier problema que puedas tener.
                            </h6>
                        </div>
                    </div>

                    <div class="grid-container2 mt-2 mb-2">
                        <div class="grid-item col1 " style="background-color: #5B962F">
                            <h5 class="text-center fw-bold mx-3">Responsabilidad ambiental</h5>
                            <h6 class="text-center  mx-3 mt-2">
                                 Nos comprometemos a promover prácticas sostenibles y respetuosas con el medio ambiente. Fomentamos la reducción de residuos, el uso responsable de recursos y la adopción de embalajes ecoamigables para contribuir a un mundo más verde.</h6>
                        </div>
                        <div class="grid-item col2" style="background-color: #8BC34A">
                            <h5 class="text-center fw-bold mx-3  ">Empoderamiento de los emprendedores</h5>
                            <h6 class="text-center  mx-3 mt-2 ">
                                 Valoramos el espíritu emprendedor y buscamos empoderar a nuestros vendedores para que alcancen su máximo potencial. Proporcionamos herramientas y recursos que les permitan crecer como negocios y destacar en el mercado.
                            </h6>
                        </div>
                        <div class="grid-item col1" style="background-color: #5B962F">
                            <h5 class="text-center fw-bold mx-3">Diversidad e inclusión</h5>
                            <h6 class="text-center  mx-3 mt-2 ">
                                Celebramos la diversidad de culturas, tradiciones y talentos presentes en nuestra comunidad. Fomentamos un ambiente inclusivo donde todas las voces son escuchadas y respetadas, promoviendo la igualdad de oportunidades.
                            </h6>
                        </div>
                        <div class="grid-item col2" style="background-color: #8BC34A">
                            <h5 class="text-center fw-bold mx-3 ">Impacto social</h5>
                            <h6 class="text-center  mx-3 mt-2">
                                Nos comprometemos a generar un impacto social positivo en nuestras comunidades. Apoyamos iniciativas y proyectos que beneficien a grupos vulnerables o que promuevan el bienestar de la sociedad en general.

                            </h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
    var typed = new Typed("#typed", {
        strings: [
            "Somos una plataforma dedicada a conectar a compradores y vendedores de productos locales, facilitando el proceso de compra y venta de manera segura y confiable y asi fomentamos el comercio justo y sostenible.",
        ],
        backSpeed: 0,
        typeSpeed: 40,
        onComplete: function () {
            var typed2 = new Typed("#typed2", {
                strings: [
                    "Al elegir Pro-Regionales, apoyas el comercio local y responsable. Cada compra que realizas en nuestra plataforma contribuye directamente al crecimiento y sostenibilidad de pequeños negocios, artesanos y emprendedores locales. Juntos, fomentamos una economía más justa y sostenible.",
                ],
                typeSpeed: 40,
            });
        },
    });
});
    </script>

@endsection
