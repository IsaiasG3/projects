@extends('welcome')

@section('titulo','Colaboradores')

@section('contenido')

<div class="container">
    <div class="row">
        {{--<div class="col-3">
            <a href="colaborador/create" class="btn-floating btn-large waves-effect waves-light purple accent-4"><i class="material-icons">add</i></a>
        </div>--}}
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Importar colaboradores</div>
                <div class="card-body">
                    @if(isset($errors) && $errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                        {{$error}}
                        @endforeach
                    </div>
                    @endif
                    <form  method="POST" action="/importar3" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <input type="file"name="import_file" required/>
                        <button class="btn purple lighten-2" type="submit">Importar</button>
                    </form >
                </div>
            </div>
        </div>
    </div>


    {{--<nav>
        <div class="nav-wrapper">
    <form action="{{route('colaborador.index')}}" method="GET">
        <div class="input-field">
          <input name="busqueda" id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
    </nav>--}}
    <nav class="nav-extended purple lighten-2">
        <div class="nav-wrapper">
          <a href="/colaboradores2" class="brand-logo"  style="padding-left: 20px">COLABORADORES</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="colaborador/create">Agregar</a></li>

            {{--<li><a>A third link</a></li>--}}
          </ul>
        </div>
        <div class="nav-content purple lighten-3">
            <span  style="padding-left: 20px" >Buscar</span>
          <form action="{{route('colaborador.index')}}" method="GET">
            <div class="input-field">
                <input name="busqueda" id="search" type="search" required  style="padding-left: 50px">
              <label class="label-icon" for="search"><i class="material-icons">search</i></label>

            </div>
          </form>
          </a>
        </div>
      </nav>

        <table class="responsive-table striped centered ">
            <thead class="purple-text text-darken-2">
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Número</th>
                   {{--<th>Cliente</th>--}}
                </tr>
            </thead>

            <tbody>

            @foreach($colaboradores as $colaborador)
            @if($colaborador->estado == 'Activo')


                <tr>
                    <td><a href="/editar3/{{$colaborador->id}}/edit"><i class="material-icons purple-text text-darken-1">create</i></a></td>
                    <td>{{$colaborador->nombres}}</td>
                    <td>{{$colaborador->apellidos}}</td>
                    <td>{{$colaborador->numero}}</td>
                   {{--<td>{{$colaborador->cliente->nombre}}</td>--}}
                    @if($colaborador->estado == 'Activo')
                    <td><a href="#modal/colaborador{{$colaborador->id}}" class="purple-text text-darken-3 modal-trigger">Baja</a></td>
                    @endif
                </tr>
                @endif
                <div id="modal/colaborador{{$colaborador->id}}" class="modal">
                    <div class="modal-content">
                    <h4>¿Está seguro de que quiere dar de baja a este colaborador?</h4>
                    <hr>
                    </div>
                    <div class="modal-footer">
                    <form action="colaborador/{{$colaborador->id}}" method="POST">
                        @method('PUT')
                        @csrf
                        <input id="estado" name="estado"type="hidden" class="validate" value="Baja">
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
