@extends('welcome')

@section('titulo','Cómputo')

@section('contenido')

<div class="container">

    <div class="row">
        {{--<div class="col-3">
            {{--<a href="computo/create" class="btn-floating btn-large waves-effect waves-light purple accent-4"><i class="material-icons">add</i></a>--}}
           {{--}} <a href="/exportar" class="btn btn-primary" type="submit">Exportar</a>
        </div>--}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Importar equipos de cómputo</div>
                    <div class="card-body">
                        @if(isset($errors) && $errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                            {{$error}}
                            @endforeach
                        </div>
                        @endif
                        <form  method="POST" action="/importar" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <input type="file"name="import_file"  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,text/comma-separated-values, text/csv, application/csv, .csv" required />
                            <button class="btn purple lighten-2" type="submit">Importar</button>
                        </form >
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-----------------------------------------------------------------------------}}



{{--
<nav>
    <div class="nav-wrapper">

        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li>
<form action="{{route('computo.index')}}" method="GET">
    <div class="input-field">
      <input name="busqueda" id="search" type="search" required>
      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
      <i class="material-icons">close</i>
    </div>
  </form>
</li>
<li><a href="computo/create">Agregar</a></li>
</ul>
</div>

</nav>--}}




<nav class="nav-extended purple lighten-2">
    <div class="nav-wrapper">
      <a href="/computos2" class="brand-logo" style="padding-left: 20px">COMPUTADORAS</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="computo/create">Agregar</a></li>
        <li><a href="/exportar"  type="submit">Exportar</a></li>
        {{--<li><a>A third link</a></li>--}}
      </ul>
    </div>
    <div class="nav-content purple lighten-3">
        <span  style="padding-left: 20px">Buscar</span>
      <form action="{{route('computo.index')}}" method="GET">
        <div class="input-field">
            <input name="busqueda" id="search" type="search" required  style="padding-left: 50px">
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>

        </div>
      </form>
      </a>
    </div>
  </nav>







{{-----------------------------------------------------------------------------}}
    <table class="responsive-table striped centered ">
        <thead>
          <tr class="purple-text text-darken-2">
            <th></th>
            <th></th>
              <th>Numero de Serie</th>
              <th>Folio</th>
              <th>Colaborador</th>

          </tr>
        </thead>
        <tbody>
            @foreach($computo as $comput)
                <tr>
                    <td><a href="/editar2/{{$comput->id}}/edit" style="margin-right: 20px"><i class="material-icons purple-text text-darken-1">create</i></a></td>
                    <td><a href="/computo/{{$comput->id}}" style="margin-right: 20px"><i class="material-icons purple-text text-darken-2">visibility</i></a></td>
                    <td>{{$comput->serie}}</td>
                    <td>{{$comput->folio}}</td>
                    <td>{{$comput->nombres}} {{$comput->apellidos}}</td>

                @if ($comput->id_colaborador == 1 || $comput->id_colaborador==69)
                    <td><a href="/computo/{{$comput->id}}/edit" class="purple-text text-darken-3 modal-trigger">Asignar</a></td>
                @endif
                @if ($comput->id_colaborador > 1 &  $comput->id_colaborador <69 )
                    <td><a href="#modal/computo{{$comput->id}}" class="purple-text text-darken-3 modal-trigger">Reasignar</a></td>
                @endif
                @if ($comput->id_colaborador > 69 )
                    <td><a href="#modal/computo{{$comput->id}}" class="purple-text text-darken-3 modal-trigger">Reasignar</a></td>
                @endif
                </tr>

                    <div id="modal/computo{{$comput->id}}" class="modal">
                        <div class="modal-content">
                        <h4>¿Está seguro de que se entrego el dispositivo?</h4>
                        <hr>
                        </div>
                        <div class="modal-footer">
                        <form action="historial/{{$comput->id}}/edit" method="GET">
                            @method('GET')
                            @csrf
                            <a class="modal-close waves-effect waves-grey darken-1 btn-flat">Cancelar</a>
                            <button type="submit" class="modal-close waves-effect waves-red btn-flat">Confirmar</button>
                        </form>
                        </div>
                    </div>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
