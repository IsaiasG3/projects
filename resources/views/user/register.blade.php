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
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color: #963A3B">
        <div class="container-fluid">
            <a class="navbar-brand cursiva me-auto" href="/">Dulce Esperanza</a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
                aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <ul class="navbar-nav d-flex ms-auto my-3 my-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="/productos">Catálogo de Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/faq">Preguntas Frecuentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/contactanos">Contáctanos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">

                            <li><a class="dropdown-item" href="/login">Iniciar Sesión</a></li>
                            <li>
                                <a class="dropdown-item" href="/register">Registrarse</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="mt-4"></div>

    <div class="container-fluid inicio h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5 ">
                <div style="margin-top: 15%"></div>
                <img src="{{ asset('img/logo2.png') }}" class="rounded mx-auto d-block" alt="Cerebrit0"
                    style="max-width: 70%">
            </div>
            <div class=" card col-md-8 col-lg-6 col-xl-4 mb-4 offset-xl-1" style="margin-top: 3%;background-color:#963A3B">

                <form action="/register" method="POST" class="align-items-center validar">
                    @csrf
                    @include('mensaje')
                    <div class="divider d-flex align-items-center mt-4 my-4">
                        <h3 class="text-center fw-bold mx-3 mb-0" style="color:#fff">Registrarse</h3>
                    </div>
                    <input type="hidden" name="role" value="normal">

                    <!-- Email input -->
                    <div class="form-outline mt-4">
                        @error('name')
                        <br>
                        <small style="color: #fff !important">*{{ $message }}</small>
                        <br>
                    @enderror
                        <input type="text" name="name" id="name" class="form-control cajita form-control-lg"
                            placeholder="Ingrese su nombre"required value="{{ old('name') }}" />
                        <label class="form-label tex mt-2" for="name">Nombre</label>

                    </div>

                    <!-- Email input -->
                    <div class="form-outline">
                        @error('email')
                            <br>
                            <small style="color: #fff !important">*{{ $message }}</small>
                            <br>
                        @enderror
                        <input type="email" name="email" id="email" class="form-control cajita form-control-lg"
                            placeholder="Ingrese su correo eléctronico"required value="{{ old('email') }}" />
                        <label class="form-label tex mt-2" for="name">Email</label>

                    </div>

                    <div class="form-outline">
                        @error('numero')
                            <br>
                            <small style="color: #fff !important">*{{ $message }}</small>
                            <br>
                        @enderror
                        <input type="number" name="numero" id="numero" class="form-control cajita form-control-lg"
                            placeholder="Ingrese su número telefónico"required value="{{ old('numero') }}" />
                        <label class="form-label tex mt-2" for="name">Número</label>

                    </div>


                    <!-- Password input -->
                    <div class="form-outline mb-3">
                         @error('password')
                            <br>
                            <small style="color: #fff">*{{ $message }}</small>
                            <br>
                        @enderror
                        <input type="password" name="password" id="password" class="form-control cajita form-control-lg"
                            placeholder="Ingrese su Contraseña" required value="{{ old('password') }}" />
                        <label class="form-label tex mt-2" for="password">Contraseña</label>

                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        @error('password')
                            <br>
                            <small style="color: #fff !important">*{{ $message }}</small>
                            <br>
                        @enderror
                        <input type="password" name="password_confirmation" id="password"
                            class="form-control cajita form-control-lg" placeholder="Ingrese de nuevo su contraseña" required
                            value="{{ old('password') }}" />
                        <label class="form-label tex mt-2" for="password">Contraseña</label>



                        <div class="form-outline mt-4">
                            @error('pregunta')
                            <br>
                            <small style="color: #fff !important">*{{ $message }}</small>
                            <br>
                        @enderror
                            <input type="text" name="pregunta" id="pregunta" class="form-control cajita form-control-lg"
                                placeholder="Ingrese la pregunta  "required value="{{ old('pregunta') }}" />
                            <label class="form-label tex mt-2" for="name">Pregunta Secreta</label>

                        </div>



                        <div class="form-outline mt-4">
                            @error('respuesta')
                            <br>
                            <small style="color: #fff !important">*{{ $message }}</small>
                            <br>
                        @enderror
                            <input type="text" name="respuesta" id="respuesta" class="form-control cajita form-control-lg"
                                placeholder="Ingrese la respuesta  "required value="{{ old('respuesta') }}" />
                            <label class="form-label tex mt-2" for="name">Respuesta Secreta</label>

                        </div>

                    </div>
                    <div class="recaptcha-container">
                    <div class="g-recaptcha" data-sitekey="6Lfc9ookAAAAAIsWx1uHLWuWi0sE3LmIDpI3Obfb"></div>
                    </div>
                    <div class="divider d-flex align-items-center my-4">
                        <div class="text-center text-lg-start">
                            <button class="btn btn-danger validarb"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;"
                                type="submit"> <i class="spinner fas fa-spinner fa-spin"></i> Registrarse</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

        @include('footer')

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
