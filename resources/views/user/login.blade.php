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
    <title>Pro-Regionales</title>
    <link rel="icon"
        href="data:image/png;base64,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"
        type="img/pgn">
</head>

    <body style="background: linear-gradient(to bottom, #8BC34A, #FFFFFF);">

    <!-- #8BC34A y #5B962F-->
    <nav class="navbar navbar-light" style="background-color: #8BC34A">
        <div class="container">
            <a class="navbar-brand cursiva me-auto" href="/">Pro-Regionales</a>
        </div>
    </nav>
        <div class="container-fluid inicio h-custom">

            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class=" card col-md-8 col-lg-6 mb-4 col-xl-4 offset-xl-1"
                    style="background-color:  #5B962F">

                    <form action="/login" method="POST" class="align-items-center validar">
                        @method('POST')
                        @csrf
                        @include('mensaje')
                        <div class="divider d-flex align-items-center mt-4 ">
                            <h3 class="text-center fw-bold mx-3 mb-0" style="color:#fff">Iniciar Sesión</h3>
                        </div>

                            <p class="text-center fw-bold mx-3 mb-4" style="color:#fff">¿No tienes una cuenta? <a
                                    style="color:#fff" href="/register">Registrate</a></p>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            @error('name')
                                <br>
                                <small style="color: #FFF !important;">*{{ $message }}</small>
                                <br>
                            @enderror
                            <input type="email" name="name" id="name" class="form-control  cajita form-control-lg"
                                placeholder="Ingrese su Correo Electrónico"required value="{{ old('name') }}" />
                            <label class="form-label tex mt-2" for="name">Correo Electrónico</label>

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3"> @error('password')
                                <br>
                                <small style="color: #FFF !important;">*{{ $message }}</small>
                                <br>
                            @enderror
                            <input type="password" name="password" id="password"
                                class="form-control cajita form-control-lg" placeholder="Ingrese su Contraseña" required
                                value="{{ old('password') }}" />
                            <label class="form-label tex mt-2" for="password">Contraseña</label>
                             <!-- Botón para mostrar/ocultar la contraseña -->
    <button type="button" id="togglePassword" class="btn btn-sm btn-danger2">
        <i class="fas fa-eye"></i>     </button>

                        </div>

                            <p class="text-center fw-bold mx-3 mb-0" style="color:#fff">¿Olvidaste tu contraseña? <br> <a
                                    style="color:#fff" href="/forgot-password">Restablecer Contraseña</a></p>

                        <div class="divider d-flex align-items-center my-4">
                            <div class="text-center text-lg-start">
                                <button class="btn btn-danger2 validarb"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem" type="submit"> <i
                                        class="spinner fas fa-spinner fa-spin"></i> Iniciar Sesión</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const passwordInput = document.getElementById('password');
                const togglePasswordButton = document.getElementById('togglePassword');

                // Función para cambiar el tipo de entrada del campo de contraseña
                function togglePasswordVisibility() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                }

                // Escuchar el evento clic del botón para mostrar/ocultar la contraseña
                togglePasswordButton.addEventListener('click', function() {
                    togglePasswordVisibility();
                });
            });
        </script>



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
