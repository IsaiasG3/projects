
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
    <link rel="icon" href="https://www.clipartmax.com/png/middle/447-4476439_cheesecake-clipart-logo-cosas-de-reposteria-en-png.png" type="img/pgn">
  </head>
  <body>
    <!-- top navigation bar -->

    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color: #963A3B">

      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>

        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="/"
          >Dulce Esperanza</a>
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
        <div class="collapse navbar-collapse" id="topNavBar">

          <ul class="navbar-nav d-flex ms-auto my-3 my-lg-0">
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

                <li>
                  <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark mt-4">
          <ul class="navbar-nav mt-4">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3">
                Nuevo
              </div>
            </li>
            <li>
                <a href="/nuevoproducto" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-file-earmark-medical"></i></span>
                  <span>Producto</span>
                </a>
                <a href="/grafica" class="nav-link px-3 active">
                    <span class="me-2"><i class="bi bi-file-earmark-medical"></i></span>
                    <span>Gráfica</span>
                  </a>
              </li>
            <li>


            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Personas
              </div>
            </li>

            <li>
              <a href="/usuarios" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-person-lines-fill"></i></span>
                <span>Usuarios</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Pedidos
              </div>
            </li>

              <li>
                <a href="/realizados" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-calendar-x"></i></span>
                  <span>Realizados</span>
                </a>
              </li>
            <li>
              <a href="/entregados" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Entregados</span>
              </a>
            </li>
            <li class="my-2"><hr class="dropdown-divider bg-light" /></li>
            <li>
                <a href="/existencias" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-file-earmark-medical"></i></span>
                  <span>Productos</span>
                </a>
              </li>


          </ul>
        </nav>
      </div>
    </div>
    <main class="mt-5 pt-3">
        <div class="container-fluid">



          <div class="row">
            <div class="col-md-12 mb-3">
              <div class="card">
                <div class="card-header">
                  <span><i class="bi bi-table me-2"></i></span> Usuarios
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table
                      id="example"
                      class="table table-striped data-table"
                      style="width: 100%"
                    >
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Número</th>
                          <th>Correo</th>
                          <th>Rol</th>

                        </tr>
                      </thead>
                      <tbody>
                          @foreach($usuarios as $pedido)
                        <tr>
                          <td>{{$pedido->id}}</td>
                          <td>{{$pedido->name}}</td>
                            <td>{{$pedido->numero}}</td>
                            <td>{{$pedido->email}}</td>
                            <td>{{$pedido->role}}</td>

                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Número</th>
                            <th>Correo</th>
                            <th>Rol</th>

                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/validacion.js')}}" defer></script>
  </body>
</html>
