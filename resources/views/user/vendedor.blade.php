@extends('principal')

@section('breadcrumb', 'vendedor')
@section('Contenido')
<div class="container-fluid inicio h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="card col-md-9 mb-4" style="background-color: #5B962F; margin-top: 5%">
            <form action="/registrarvendedor" method="POST" id="formularioRegistro">
                @csrf
                <!-- Sección 1: Datos del Usuario -->
                <div class="seccion seccion-1 active">
                    <div class="divider d-flex align-items-center mt-4 my-4">
                        <h3 class="text-center fw-bold mx-3 mb-0" style="color:#fff">Registro como Vendedor</h3>

                    </div>
                    <h5 class="text-center fw-bold mx-3 mb-0" style="color:#fff">Verifica que tus datos sean correctos</h5>

                        <div class="col-md-12 mt-4">
                            <!-- Nombre input -->
                            <div class="form-outline">
                                <label class="form-label tex " for="name">Nombre</label>
                                @error('name')
                                    <br>
                                    <small style="color: #fff !important">*{{ $message }}</small>
                                    <br>
                                @enderror
                                <input type="text" name="name" id="name" class="form-control cajita form-control-lg"
                                    placeholder="Ingrese su nombre" value="{{ $user->name }}" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <!-- Email input -->
                            <div class="form-outline">
                                <label class="form-label tex mt-2" for="email">Email</label>
                                @error('email')
                                    <br>
                                    <small style="color: #fff !important">*{{ $message }}</small>
                                    <br>
                                @enderror
                                <input type="email" name="email" id="email" class="form-control cajita form-control-lg"
                                    placeholder="Ingrese su email"  value="{{ $user->email }}" />
                            </div>
                        </div>



                        <div class="col-md-12">
                            <!-- Teléfono input -->
                            <div class="form-outline">
                                <label class="form-label tex mt-2" for="telefono">Teléfono</label>
                                @error('telefono')
                                    <br>
                                    <small style="color: #fff !important">*{{ $message }}</small>
                                    <br>
                                @enderror
                                <input type="tel" name="telefono" id="telefono" class="form-control cajita form-control-lg"
                                    placeholder="Ingrese su número telefónico"  value="{{ $user->telefono }}" />
                            </div>
                        </div>


                    <!-- Botón Siguiente -->
                    <div class="divider d-flex align-items-center my-4">
                        <div class="text-center text-lg-start">
                            <button class=" btn btn-next btn-danger2" style="padding-left: 2.5rem; padding-right: 2.5rem;"
                                type="button">Siguiente</button>

                        </div>
                    </div>
                </div>




                    <!-- Contenido de la Sección 2 -->
                <div class="seccion seccion-2">
                    <div class="divider d-flex align-items-center mt-4 my-4">
                        <h3 class="text-center fw-bold mx-3 mb-0" style="color:#fff">Ubicaciones Registradas</h3>

                    </div>


                    @if(count($direcciones) > 0)
                    <h5 class="text-center fw-bold mx-3 mb-4" style="color:#fff;">Selecciona la dirección en la que quieres vender</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class=" fw-bold mx-3 mb-2" style="color:#fff; margin-left: 8% !important">Ubicaciones registradas</h6>
                                <ul>
                                    @foreach($direcciones as $ubicacion)
                                    @error('ubicacion_vendedora')
                                    <br>
                                    <small style="color: #fff !important">*{{ $message }}</small>
                                    <br>
                                @enderror
                                        <li>
                                            <input type="radio" style="margin-left: 5% !important" name="ubicacion_vendedora" value="{{ $ubicacion->id }}">
                                            <label class="ubicacion-label">{{ $ubicacion->direccion }}, {{ $ubicacion->ciudad }}, {{ $ubicacion->estado }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                             <!-- Botones Anterior y Siguiente -->
                    <div class="divider d-flex align-items-center my-4">
                        <div class="text-center text-lg-start">
                            <button class=" btn btn-prev btn-danger2" style="padding-left: 2.5rem; padding-right: 2.5rem;"
                                type="button">Anterior</button>

                        </div>
                    <div class="divider d-flex align-items-center my-4">
                        <div class="text-center text-lg-start">
                            <button class=" btn btn-next btn-danger2" style="padding-left: 2.5rem; padding-right: 2.5rem;"
                                type="button">Siguiente</button>

                        </div>
                 </div>
                    @else

                        <h5 class="text-center fw-bold mx-3 mb-0" style="color:#fff">No hay ubicaciones registradas</h5>
                        <h6 class="text-center  fw-bold mx-3 mt-4 mb-4" style="color: white">
                            Para volverte en vendedor, por favor primero agrega tu ubicación.
                        </h6>
                        <div class="text-center mb-4">
                            <a href="/ubicaciones" class="btn btn-danger2">Agregar Ubicación</a>

                        </div>

                    @endif



                    </div>
                </div>
           <!-- Sección 3: Datos para Pagos con Tarjeta -->
<div class="seccion seccion-3">
    <div class="divider d-flex align-items-center mt-4 my-4">
        <h3 class="text-center fw-bold mx-3 mb-0" style="color: #fff">Datos para Pagos con Tarjeta</h3>
    </div>
    <h6 class="text-center mx-3 mb-0" style="color:#fff">Si quieres aceptar pagos con tarjeta deberas brindar los datos siguientes, en caso de que no simplemente selecciona siguiente.</h6>


    <!-- Número de Cuenta input -->
    <div class="col-md-12 mt-4">
        <div class="form-outline">
            <label class="form-label tex" for="numero_cuenta">Número de Cuenta</label>
            <input type="text" name="numero_cuenta" id="numero_cuenta" class="form-control cajita form-control-lg"
                placeholder="Ingrese su número de cuenta"  value="{{ old('numero_cuenta') }}" />
        </div>
    </div>

    <!-- Banco input -->
    <div class="col-md-12">
        <div class="form-outline">
            <label class="form-label tex mt-2" for="banco">Banco</label>
            <input type="text" name="banco" id="banco" class="form-control cajita form-control-lg"
                placeholder="Ingrese el nombre del banco" value="{{ old('banco') }}" />
        </div>
    </div>

    <!-- Titular input -->
    <div class="col-md-12">
        <div class="form-outline">
            <label class="form-label tex mt-2" for="titular">Titular</label>
            <input type="text" name="titular" id="titular" class="form-control cajita form-control-lg"
                placeholder="Ingrese el nombre del titular" value="{{ old('titular') }}" />
        </div>
    </div>

    <!-- Botones Anterior y Siguiente -->
    <div class="divider d-flex align-items-center my-4">
        <div class="text-center text-lg-start">
            <button class="btn btn-prev btn-danger2"
                style="padding-left: 2.5rem; padding-right: 2.5rem;" type="button">Anterior</button>
        </div>
        <div class="ms-auto">
            <button class="btn btn-next btn-danger2"
                style="padding-left: 2.5rem; padding-right: 2.5rem;" type="button">Siguiente</button>
        </div>
    </div>
</div>


             <!-- Sección 4: Términos y Condiciones -->
<!-- Sección 4: Términos y Condiciones -->
<div class="seccion seccion-4">
    <div class="divider d-flex align-items-center mt-4 my-4">
        <h3 class="text-center fw-bold mx-3 mb-0" style="color: #fff">Términos y Condiciones</h3>
    </div>

    <!-- Botones centrados para abrir los modales -->
    <div class="d-flex justify-content-center">
        <!-- Botón para abrir el modal de Términos y Condiciones -->
        <button class="btn btn-danger2 me-3" data-bs-toggle="modal" data-bs-target="#modalTerminosCondiciones">
            Ver Términos y Condiciones
        </button>

        <!-- Botón para abrir el modal de Acuerdos de Privacidad -->
        <button class="btn btn-danger2" data-bs-toggle="modal" data-bs-target="#modalAcuerdosPrivacidad">
            Ver Acuerdos de Privacidad
        </button>
    </div>

    <!-- Casilla para aceptar los términos y condiciones -->
    <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" name="aceptar_terminos" id="aceptar_terminos" required>
        <label class="form-check-label tex" for="aceptar_terminos">Acepto los Términos y Condiciones</label>
    </div>

    <!-- Botones Anterior y Enviar (Registrar) -->
    <div class="divider d-flex align-items-center my-4">
        <div class="text-center text-lg-start">
            <button class="btn btn-prev btn-danger2" style="padding-left: 2.5rem; padding-right: 2.5rem;"
                type="button">Anterior</button>
        </div>
        <div class="ms-auto">
            <button type="submit" class="btn btn-danger2"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Registrar</button>
        </div>
    </div>
</div>

            </form>
        </div>
<!-- Modales -->
<div class="modal fade" id="modalTerminosCondiciones" tabindex="-1" aria-labelledby="modalTerminosCondicionesLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTerminosCondicionesLabel">Términos y Condiciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenido de los Términos y Condiciones -->
                <p>Aquí va el contenido de los Términos y Condiciones...</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAcuerdosPrivacidad" tabindex="-1" aria-labelledby="modalAcuerdosPrivacidadLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAcuerdosPrivacidadLabel">Acuerdos de Privacidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenido de los Acuerdos de Privacidad -->
                <p>Aquí va el contenido de los Acuerdos de Privacidad...</p>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

<style>

    .is-invalid {
        border-color: red;
    }
    .seccion {
        display: none;
    }

    .seccion.active {
        display: block;
    }
    .ubicacion-label {
    background-color: #8BC34A;
    color: #fff;
    border: 1px solid #fff;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer; /* Cambia el cursor al pasar por encima del label */
    margin-top: 2%;
    margin-left: 1%
}
ul {
    list-style: none; /* Elimina las viñetas de la lista */
    padding-left: 0; /* Elimina el espacio interno izquierdo de la lista */
}
</style>
<script>
    const secciones = document.querySelectorAll('.seccion');
    const btnNext = document.querySelectorAll('.btn-next');
    const btnPrev = document.querySelectorAll('.btn-prev');

    secciones[0].classList.add('active');

    btnNext.forEach((button, index) => {
        button.addEventListener('click', () => {
            const camposRequeridos = secciones[index].querySelectorAll('[required]');
            let seccionCompleta = true;

            camposRequeridos.forEach(campo => {
                if (!campo.value.trim()) {
                    campo.classList.add('is-invalid');
                    seccionCompleta = false;
                } else {
                    campo.classList.remove('is-invalid');
                }
            });

            if (seccionCompleta) {
                secciones[index].classList.remove('active');
                secciones[index + 1].classList.add('active');
            } else {
                alert('Por favor, complete los campos requeridos antes de avanzar.');
            }
        });
    });

    btnPrev.forEach((button, index) => {
        button.addEventListener('click', () => {
            secciones[index + 1].classList.remove('active');
            secciones[index].classList.add('active');
        });
    });
</script>

@endsection

