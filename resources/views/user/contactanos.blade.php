@extends('principal')

@section('breadcrumb', 'contact')
@section('Contenido')
<div class="container-fluid inicio h-custom " style="margin-top: 12%">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="card col-md-9 mb-4" style="background-color:  #5B962F">


                    <form action="/contactar" method="POST" class="align-items-center validar">
                        @method('POST')
                        @csrf
                        @include('mensaje')
                        <div class="divider d-flex align-items-center mt-4 my-4">
                            <h3 class="text-center fw-bold mx-3 mb-0" style="color:#FFF">Envianos tu contacto, sugerencia y/o
                                queja.</h3>
                        </div>
                        <div class="form-outline mb-6">
                             <label class="form-label tex mb-2" for="nombre">Ingrese su Nombre</label>
                            @error('nombre')
                                <br>
                                <small style="color: #FFF !important;">*{{ $message }}</small>
                                <br>
                            @enderror
                            <input type="text" name="nombre" id="nombre" class="form-control form-control-lg mb-2 cajita"
                                placeholder="Nombre" required />


                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label mt-2 mb-2 tex" for="correo">Ingrese su correo para darle respuesta</label>

                            @error('correo')
                                <br>
                                <small style="color: #FFF !important;margin-bottom:6px">*{{ $message }}</small>
                                <br>
                            @enderror
                            <input type="email" name="correo" id="correo"
                                class="form-control form-control-lg cajita contornor"
                                placeholder="Ingrese su Correo Electrónico"required value="{{ $email ?? old('email') }}"
                                autofocus />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label tex" for="mensaje">Ingrese su Mensaje</label>
                            @error('mensaje')
                                <br>
                                <small style="color: #FFF !important;margin-bottom:6px">*{{ $message }}</small>
                                <br>
                            @enderror
                            <textarea class="form-control cajita form-control-lg" name="mensaje" id="mensaje" aria-label="With textarea"
                                value="{{ old('mensaje') }}"required></textarea>


                        </div>


                        <div class="divider d-flex align-items-center my-4">
                            <div class="text-center text-lg-start">
                                <button class="btn btn-danger2  validarb"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;" type="submit"> <i
                                        class="spinner fas fa-spinner fa-spin"></i>Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
