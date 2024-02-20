@extends('welcome')

@section('titulo','Bajas')

@section('contenido')

<div class="container">



    <nav>
        <div class="nav-wrapper purple lighten-2">
    <form action="/colaboradores3" method="GET">
        <div class="input-field">
          <input name="busqueda" id="search" type="search" required  style="padding-left: 50px">
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
    </nav>

        <table class="responsive-table striped centered ">
            <thead class="purple-text text-darken-2">
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Número</th>

                </tr>
            </thead>

            <tbody>

            @foreach($colaboradores as $colaborador)

            @if($colaborador->estado == 'Baja')

                <tr>
                    <td>{{$colaborador->nombres}}</td>
                    <td>{{$colaborador->apellidos}}</td>
                    <td>{{$colaborador->numero}}</td>

                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
</div>
@endsection
