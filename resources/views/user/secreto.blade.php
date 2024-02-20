<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/validacion.css') }}">
    <title>Dulce Esperanza</title>
    <link rel="icon"
        href="https://www.clipartmax.com/png/middle/447-4476439_cheesecake-clipart-logo-cosas-de-reposteria-en-png.png"
        type="img/pgn">
</head>

<body style="background-color: #FAEEC1">

    <div class="mt-4"></div>

    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100 ">
            <div class="col-md-9 col-lg-6 col-xl-5 ">
                <div style="margin-top: 15%"></div>
                <img src="{{ asset('img/logo2.png') }}" class="rounded mx-auto d-block" alt="logo"
                    style="max-width: 70%">
                <div style="margin-bottom: 10%"></div>
            </div>

            <div class=" card col-md-8 col-lg-6 col-xl-4 offset-xl-1"
                style="margin-top: 3%;border: 2px solid #963A3B; background-color:  #963A3B">
                <form action="/password/secret/respuesta" method="POST" class="align-items-center validar">
                    @method('POST')
                    @csrf
                    @include('mensaje')
                    <div class="divider d-flex align-items-center mt-4 my-4">
                        <h3 class="text-center fw-bold mx-3 mb-0" style="color:#FFF">Restablecer Contraseña</h3>

                    </div>


                    <div class="form-outline mb-4">


                        <input disabled type="text" class="form-control form-control-lg cajita"
                         value="¿{{ $user->pregunta }}?"
                             />
                        <input type="hidden" name="email" value="{{$user->email}}">
                    </div>

                    <div class="form-outline mb-3">
                        @error('respuesta')
                            <br>
                            <small style="color: #FFF !important;margin-bottom:6px !important">*{{ $message }}</small>
                            <br>
                        @enderror
                        <input type="text" name="respuesta" id="respuesta"
                            class="form-control cajita form-control-lg"
                            placeholder="Ingrese su Respuesta" required
                            value="{{ old('respuesta') }}" />
                        <label class="form-label mt-2 tex" for="password_confirmation">Respuesta</label>


                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        @error('password')
                            <br>
                            <small style="color: #FFF !important;margin-bottom:60px !important">*{{ $message }}</small>
                            <br>
                        @enderror
                        <input type="password" name="password" id="password"
                            class="form-control cajita form-control-lg" placeholder="Ingrese su Nueva Contraseña"
                            required value="{{ old('password') }}" />
                        <label class="form-label mt-2 tex" for="password">Contraseña</label>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        @error('password')
                            <br>
                            <small style="color: #FFF !important;margin-bottom:6px !important">*{{ $message }}</small>
                            <br>
                        @enderror
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control cajita form-control-lg"
                            placeholder="Ingrese su Nueva Contraseña de Nuevo" required
                            value="{{ old('password') }}" />
                        <label class="form-label mt-2 tex" for="password_confirmation">Confirma la Contraseña</label>


                    </div>


                    <div class="divider d-flex align-items-center my-4">
                        <div class="text-center text-lg-start">
                            <button class="btn btn-danger  validarb"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;" type="submit"> <i
                                    class="spinner fas fa-spinner fa-spin"></i> Actualizar
                                Contraseña</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/validacion.js') }}" defer></script>
    <script src="{{ asset('js/viatico.js') }}"></script>
</body>

</html>
