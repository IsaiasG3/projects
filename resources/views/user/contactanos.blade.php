@extends('principal')

@section('breadcrumb', 'contact')
@section('Contenido')
    <div class="card inicio" style="margin-top: 6%; background-color:#FAEEC1">

        <div class="container-fluid h-custom mt-4">
            <div class="row d-flex justify-content-center align-items-center h-100  mt-4">
                <div class="col-md-9 col-lg-6 col-xl-5 mt-4 ">
                    <div style="margin-top: 15%"></div>
                    <img src="{{ asset('img/logo2.png') }}" class="rounded mx-auto d-block" alt="logo"
                        style="max-width: 70%">
                    <div style="margin-bottom: 10%"></div>
                </div>
                <div class=" mt-4 mb-4 card col-md-8 col-lg-6 col-xl-4 offset-xl-1"
                    style="margin-top: 3%;border: 2px solid #963A3B; background-color:  #963A3B">
                    <form action="/contactar" method="POST" class="align-items-center validar">
                        @method('POST')
                        @csrf
                        @include('mensaje')
                        <div class="divider d-flex align-items-center mt-4 my-4">
                            <h3 class="text-center fw-bold mx-3 mb-0" style="color:#FFF">Envianos tu contacto, sugerencia,
                                queja o pedido</h3>
                        </div>
                        <div class="form-outline mb-4">
                            @error('nombre')
                                <br>
                                <small style="color: #FFF !important;">*{{ $message }}</small>
                                <br>
                            @enderror
                            <input type="text" name="nombre" id="nombre" class="form-control form-control-lg cajita"
                                placeholder="Nombre" required />
                            <label class="form-label tex" for="nombre">Ingrese su Nombre</label>

                        </div>

                        <div class="form-outline mb-4">
                            @error('correo')
                                <br>
                                <small style="color: #FFF !important;margin-bottom:6px">*{{ $message }}</small>
                                <br>
                            @enderror
                            <input type="email" name="correo" id="correo"
                                class="form-control form-control-lg cajita contornor"
                                placeholder="Ingrese su Correo Electrónico"required value="{{ $email ?? old('email') }}"
                                autofocus />
                            <label class="form-label mt-2 tex" for="correo">Ingrese su correo para darle respuesta</label>

                        </div>
                        <div class="form-outline mb-4">
                            @error('mensaje')
                                <br>
                                <small style="color: #FFF !important;margin-bottom:6px">*{{ $message }}</small>
                                <br>
                            @enderror
                            <textarea class="form-control cajita form-control-lg" name="mensaje" id="mensaje" aria-label="With textarea"
                                value="{{ old('mensaje') }}"required></textarea>
                            <label class="form-label tex" for="mensaje">Ingrese su Mensaje</label>

                        </div>


                        <div class="divider d-flex align-items-center my-4">
                            <div class="text-center text-lg-start">
                                <button class="btn btn-danger  validarb"
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
