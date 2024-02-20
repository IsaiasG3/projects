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
    <title>Pro-Regionales</title>
    <link rel="icon" href="https://www.clipartmax.com/png/middle/447-4476439_cheesecake-clipart-logo-cosas-de-reposteria-en-png.png" type="img/pgn"></head>
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

                <div class="divider d-flex align-items-center"  style="color: #fff" >
                    <h1 class="text-center fw-bold mx-3 mt-4 mb-0">@yield('message') :(</h1>
                   </div>
                   <h3 class="text-center  mx-3 mt-2 mb-2" style="color: #fff"> Error @yield('code')</h3>
                   <div class="divider d-flex align-items-center my-4">
                   <div class="text-center text-lg-start">
                    <a href="/" class="btn btn-succes btn-dark validarb"
                      style="padding-left: 2.5rem; padding-right: 2.5rem;background-color: ;"
                      type="submit"> <i class="spinner  fas fa-spinner fa-spin"></i> Volver al Inicio</a>
                  </div>
                   </div>


                    </div>
                </div>

            </div>



            <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5"
             style="background-color: #5B962F">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
              Copyright © 2023 Pro-Regionales S.A. de C.V. Todos los derechos reservados

            </div>
            <div class="text-white mb-3 mb-md-0">
                <H6>Información empresarial</H6>
                <a href="/contactanos" style="color: white">Contáctanos</a> <br>
                <a href="/privacidad" style="color: white">Aviso de Privacidad</a> <br>
                <a href="/tyc" style="color: white">Términos y Condiciones</a> <br>



              </div>

              <div class="text-white mb-3 mb-md-0">
                <h6 class="mt-2">Navega por:</h6>
                <a href="/acerca" style="color: white">Sobre Nosotros</a> <br>
                <a href="/faq" style="color: white">Preguntas Frecuentes</a> <br>
              </div>


            </div>


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
