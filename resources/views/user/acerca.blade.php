@extends('principal')

@section('breadcrumb', 'acerca')
@section('Contenido')
    <div class="card inicio" style="margin-top: 7.5%">
        <div class="container-fluid h-custom">
            <div class="card mt-4" style="border: 2px solid #963A3B; overflow: hidden">
                <div class="row d-flex justify-content-center mt-4 align-items-center h-100" style="margin-top:20%">
                    <div class="container card " style="background: #FAEEC1">
                        <div class="divider d-flex align-items-center mt-4" style="color: #963A3B !important">
                            <h1 class="text-center contorno2 fw-bold mx-3 mt-4 mb-0">¿Quiénes Somos?</h1>
                        </div>
                        <h4 class="text-center contorno2 mx-3 mt-4 mb-4" style="color: #963A3B !important">
                            <span id="typed"></span>
                        </h4>

                    </div>
                    <div class="container card " style="background: #963A3B">
                        <div class="divider d-flex align-items-center mt-4" style="color: white">
                            <h1 class="text-center contorno fw-bold mx-3 mt-4 mb-0">¿Por qué escogernos?</h1>
                        </div>
                        <h4 class="text-center contorno mx-3 mt-4 mb-4" style="color: white">
                            <span id="typed2"></span>
                        </h4>

                        </h4>

                    </div>
                    <div class="container card " style="background: #FAEEC1">
                        <div class="divider d-flex align-items-center mt-4" style="color: #963A3B !important">
                            <h1 class="text-center contorno2 fw-bold mx-3 mt-4 mb-0">Nuestra Historia</h1>
                        </div>
                        <h4 class="text-center contorno2 mx-3 mt-4 mb-4" style="color: #963A3B !important">
                            En 1998 nace en Veracruz “D'esperanza” un original concepto de cafetería y pastelería casera
                            italiana,
                            ubicada en Calle Cuauhtémoc #410. Sus creadores la Sra. Teresa Castrejón y la señora Eberta
                            Castrejón
                            unieron su gran recetario, con la calidez y trato a la clientela formando pilares de tradición
                            que se han
                            transmitido a través de su familia.</h4>
                    </div>
                    <div class="container" style="background: #963A3B">
                        <div class="divider d-flex align-items-center mt-4" style="color: #fff">
                            <h1 class="text-center contorno mx-3 mt-4 mb-0">Nuestro Logo</h1>
                        </div>
                        <h4 class="text-center contorno mx-3 mt-4 mb-4" style="color: white">

                            Nuestro logo es una representación simbólica y significativa de los valores y la historia de
                            nuestra empresa. Fue inspirado en el primer pastel elaborado por nuestra primera fundadora,
                            quien con dedicación y pasión, horneó su primer pastel con ingredientes frescos y de alta
                            calidad, creando así una experiencia única y memorable para sus clientes.
                            En 2015, cuando nuestra empresa quedó en manos de la Sra. Teresa, decidimos actualizar el nombre
                            y el diseño de nuestro logo para reflejar la evolución y el crecimiento que habíamos
                            experimentado durante todos estos años. El resultado fue un logotipo moderno, elegante y
                            distintivo que representa la esencia de nuestra marca y los valores que nos definen.</h4>
                        <div class="row justify-content-center columna ">
                            <div class=" mt-4 col-sm-6">
                                <h4 class="text-center contorno" style="color: white">


                                    Cada elemento del diseño del logo tiene un significado especial: los colores vibrantes y
                                    cálidos representan la pasión y el compromiso de nuestra empresa con la calidad y el
                                    servicio excepcional. La silueta del pastel en el centro del logo simboliza nuestra
                                    herencia culinaria y nuestra dedicación a la elaboración de pasteles exquisitos y
                                    artesanales.
                                    <br>
                                    En resumen, nuestro logotipo es una representación fiel de nuestra historia y valores.
                                    Nos enorgullece llevarlo en cada uno de nuestros productos y servicios, y estamos
                                    comprometidos en mantener el nivel de calidad y excelencia que representa.
                                </h4>
                            </div>
                            <div class="col-sm-6" id='contacto'>
                                <img src="{{ asset('img/logo2.png') }}" class="rounded mx-auto d-block mb-2 logo"
                                    alt="Cerebrit0">
                            </div>
                        </div>
                    </div>

                    <div class="grid-container">
                        <div class="grid-item col2 card" style="background-color: #FAEEC1">
                            <h3 class="text-center fw-bold mx-3 mb-0">Misión</h3>
                            <h5 class="text-center  mx-3 mt-2 mb-2">
                                Crear momentos mágicos ofreciendo productos originales y únicos de pastelería, repostería y
                                panadería con
                                origen e influencia francesa en nuestro punto de venta y por medio de mesas de postres para
                                eventos sociales
                                y venta a otros establecimientos, brindando calidez en el servicio y productos innovadores
                                con recetas
                                originales en un concepto diferente.
                            </h5>
                        </div>
                        <div class="grid-item card col1 " style="background-color: #963A3B">
                            <h3 class="text-center fw-bold mx-3 ">Visión</h3>
                            <h5 class="text-center  mx-3 mt-2 mb-2">
                                Ser reconocidos como la mejor opción en pastelería para eventos sociales. Nuestro compromiso
                                es brindar un servicio cálido, productos de alta calidad y una experiencia que garantice la
                                entera satisfacción de nuestros clientes. Trabajamos incansablemente para superar las
                                expectativas de nuestros clientes y consolidar nuestra posición como líderes en la industria
                                de la pastelería.
                            </h5>
                        </div>
                        <div class="grid-item card col2" style="background-color: #FAEEC1">
                            <h3 class="text-center fw-bold mx-3 mb-0">Nuestro Objetivo</h3>
                            <h5 class="text-center  mx-3 mt-2 mb-2">
                                Nuestro objetivo es ofrecer una amplia variedad de productos de pastelería de alta calidad
                                que satisfagan el paladar de nuestros clientes. Nos comprometemos a mantener precios
                                accesibles sin comprometer la calidad, asegurando que nuestros productos estén al alcance de
                                todos los consumidores.
                            </h5>
                        </div>
                    </div>





                    <div class="divider d-flex align-items-center mt-2 mb-2 " style="background-color: #963A3B">
                        <h1 class="text-center contorno fw-bold mx-3 mt-2 mb-4" style="color: #fff">Nuestros Valores</h1>

                    </div>
                    <div class="grid-container2">
                        <div class="grid-item col2" style="background-color: #FAEEC1">
                            <h5 class="text-center fw-bold mx-3  ">Pasión</h5>
                            <h6 class="text-center  mx-3 mt-2 ">
                                Trabajando con amor, esmero y entrega en la elaboración de los productos y en la atención al
                                cliente.

                            </h6>
                        </div>
                        <div class="grid-item col1 " style="background-color: #963A3B">
                            <h5 class="text-center fw-bold mx-3">Honestidad</h5>
                            <h6 class="text-center  mx-3 mt-2">
                                Siendo sinceros en nuestras acciones, actitudes y responsabilidades para con la empresa y
                                con el
                                cliente.</h6>
                        </div>
                        <div class="grid-item col2" style="background-color: #FAEEC1">
                            <h5 class="text-center fw-bold mx-3 ">Compañerismo</h5>
                            <h6 class="text-center  mx-3 mt-2">
                                Brindando apoyo, ayuda, respeto y amistad al resto de los colaboradores, buscando siempre la
                                correcta
                                operación de la empresa.
                            </h6>
                        </div>
                        <div class="grid-item col1" style="background-color: #963A3B">
                            <h5 class="text-center fw-bold mx-3">Responsabilidad</h5>
                            <h6 class="text-center  mx-3 mt-2 ">
                                Asumiendo las consecuencias de nuestras acciones en la empresa y buscando subsanar los
                                errores o daños
                                causados para con la empresa y para con el cliente.
                            </h6>
                        </div>
                    </div>

                    <div class="grid-container2 mt-2 mb-2">
                        <div class="grid-item col1 " style="background-color: #963A3B">
                            <h5 class="text-center fw-bold mx-3">Calidad Total</h5>
                            <h6 class="text-center  mx-3 mt-2">
                                Realizando nuestros productos y ofreciendo nuestros servicios con la mejor calidad, sin
                                errores y justo
                                a tiempo.</h6>
                        </div>
                        <div class="grid-item col2" style="background-color: #FAEEC1">
                            <h5 class="text-center fw-bold mx-3  ">Cuidado del Medio Ambiente</h5>
                            <h6 class="text-center  mx-3 mt-2 ">
                                Buscando que la operación de la empresa ayude con sus acciones a la mejora y cuidado del
                                medio ambiente
                                y del área en la que opera.
                            </h6>
                        </div>
                        <div class="grid-item col1" style="background-color: #963A3B">
                            <h5 class="text-center fw-bold mx-3">Lealtad</h5>
                            <h6 class="text-center  mx-3 mt-2 ">
                                Comprometiendo nuestras acciones y actitudes con el bien de la empresa. Si a la empresa le
                                va bien, a
                                los colaboradores también.
                            </h6>
                        </div>
                        <div class="grid-item col2" style="background-color: #FAEEC1">
                            <h5 class="text-center fw-bold mx-3 ">Responsabilidad Social</h5>
                            <h6 class="text-center  mx-3 mt-2">
                                Buscando dar preferencia en la contratación a mamas solteras o jóvenes universitarios recién
                                egresados.

                            </h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
