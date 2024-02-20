<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cerebrit0 @yield('titulo')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>

    <div class="row">
        <div class="col-4">
            <ul id="slide-out" class="sidenav sidenav-fixed">
              <a href="">
                <li>
                    <img class="responsive-img" src="{{asset('img/cerebro.jpg')}}" >
                </li>
              </a>

              <li><div class="divider"></div></li>
              <li><a class="subheader">Control de inventarios de activo </a></li>
              {{--<li><a class="waves-effect" href="/clientes2"><i class="material-icons">person</i>Clientes</a></li>--}}
              <li><a class="waves-effect" href="/colaboradores2"><i class="material-icons">engineering</i>Colaboradores</a></li>
              <li><a class="waves-effect" href="/colaboradores3"><i class="material-icons">horizontal_rule</i>Bajas</a></li>
              <li><a class="waves-effect" href="/computos2"><i class="material-icons">computer</i>Cómputo</a></li>
              <li><a class="waves-effect" href="/telefonias2"><i class="material-icons">phone_iphone</i>Telefonía</a></li>
            </ul>
        </div>
        <div class="col-8">
            <main>
                @yield('contenido')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                <script src="{{asset('js/prueba.js')}}"></script>
            </main>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/js/admin.js"></script>
</body>
</html>
