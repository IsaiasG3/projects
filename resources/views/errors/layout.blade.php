<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/validacion.css')}}">
    <title>Dulce Esperanza</title>
    <link rel="icon" href="https://www.clipartmax.com/png/middle/447-4476439_cheesecake-clipart-logo-cosas-de-reposteria-en-png.png" type="img/pgn"></head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color: #963A3B">


        <div class="container-fluid">

          <img src="{{asset('img/logo.png')}}" alt="Logo" width="50" height="50" class="d-inline-block align-text-top" style="margin-right: 2% ">
          <a class="navbar-brand me-auto ms-lg-0 ms-3  text-uppercase fw-bold" href="/" >Dulce Esperanza</a>


          <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >

          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="topNavBar" >
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
                  <a
                    class="nav-link dropdown-toggle ms-2"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
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
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5 ">
              <img  src="{{asset('img/logo2.png')}}"
                class="rounded mx-auto d-block" alt="logo"  style="max-width: 70%">
            </div>
            <div class=" card col-md-8 col-lg-6 col-xl-4 offset-xl-1"  style="border: 2px solid #963A3B">
                <div class="divider d-flex align-items-center mt-4"  style="color: #963A3B" >
                    <h1 class="text-center fw-bold mx-3 mt-4 mb-0">@yield('message') :(</h1>
                   </div>
                   <h3 class="text-center  mx-3 mt-2 mb-2" style="color: #963A3B"> Error @yield('code')</h3>
                   <div class="divider d-flex align-items-center my-4">
                   <div class="text-center text-lg-start">
                    <a href="/" class="btn btn-primary btn-dark validarb"
                      style="padding-left: 2.5rem; padding-right: 2.5rem;background-color: #963A3B;"
                      type="submit"> <i class="spinner fas fa-spinner fa-spin"></i> Volver al Inicio</a>
                  </div>
                   </div>
            </div>
          </div>
        </div>
        <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5" style="background-color: #963A3B">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
          Copyright © 2023 Dulce Esperanza S.A. de C.V. Todos los derechos reservados
        </div>
        <div class="text-white mb-3 mb-md-0">
            <H6>Información empresarial</H6>
            <a href="/contactanos" style="color: white">Contáctanos</a> <br>
            <a href="/privacidad" style="color: white">Aviso de Privacidad</a> <br>
            <a href="/tyc" style="color: white">Términos y Condiciones</a> <br>
            <h6 class="mt-2">Navega por:</h6>
            <a href="/productos" style="color: white">Nuestros Productos</a> <br>
            <a href="/faq" style="color: white">Preguntas Frecuentes</a> <br>


          </div>

          <div class="text-white mb-3 mb-md-0">
            <h6>Ponte en contacto tambien en:</h6>
            <p><i class="bi bi-telephone-fill"></i> +52 783-126-8744</p>
            <p><i class="bi bi-telephone-fill"></i> +52 783-152-5741</p>
            <h6>Visítanos en:

            </h6>
            <p>  Calle Cementerio #451, Centro, 93550, <br> Gutiérrez Zamora,Ver.</p>
          </div>


        </div>
      </section>

      <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
      <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
      <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>
      <script src="{{asset('js/script.js')}}"></script>
      <script src="{{asset('js/validacion.js')}}" defer></script>
      <script src="{{asset('js/viatico.js')}}"></script>
</body>
</html>
