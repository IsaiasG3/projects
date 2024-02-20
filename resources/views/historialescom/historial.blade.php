@extends('welcome')<!--Que esta dentro de una carpeta por eso el . y luego la vista-->

@section('titulo','Historial')

@section('contenido')

<div class="container">

    <nav class="nav-extended purple lighten-2">
        <div class="nav-wrapper">
          <a href="/computos2" class="brand-logo" style="padding-left: 20px">COMPUTADORAS</a>

        </div>
      </nav>


<div class="row">
    <div class="card horizontal">
<div class="col s6 m6">
    <div class="card horizontal">

      <div class="card-stacked">
        <div class="card-content">
            <p>Tipo: {{$dispositivo->tipo}}</p>
            <p>Folio: {{$dispositivo->folio}}</p>
            <p>Serie: {{$dispositivo->serie}}</p>
            <p>Cargador: {{$dispositivo->cargador}}</p>
        </div>


      </div>

    </div>
  </div>
  <div class="col s6 m6">
    <div class="card horizontal">

      <div class="card-stacked">
        <div class="card-content">



          <p>Descripción: {{$dispositivo->descripcion}}</p>
        </div>

      </div>

    </div>

  </div>

</div>
</div>
    <table class="responsive-table striped centered ">
        <thead class="purple-text text-darken-2">
          <tr>
            <th></th>
              <th>Fecha de Entrega</th>
              <th>Foto de Entrega</th>
              <th>Colaborador</th>
              <th>Fallas</th>
              <th>Foto de Devolución</th>
              <th>Fecha de Devolución</th>

          </tr>
        </thead>

        <tbody>
  @foreach($historiales as $historial)
         <tr>
            @if ($historial->archivo == "Sin Archivo")
            <td><a href="/historialeditar/{{$historial->id}}/edit"><i class="material-icons purple-text text-darken-2">file_upload</i></a></td>
        @endif
        @if ($historial->archivo != "Sin Archivo")
        <td><a href="{{$historial->archivo}}" download="Resguardo_{{$historial->colaborador->nombres}}{{$historial->colaborador->apellidos}}.pdf"><i class="material-icons purple-text text-darken-2">download</i></a></td>
        @endif

            <td>{{\Carbon\Carbon::parse($historial->fecha_entrega)->format('d/m/Y')}}</td>
            <td> <a href="#modal/{{$historial->id}}" class="purple-text text-darken-2 modal-trigger" >Ver imagen</a></td>
            <td>{{$historial->colaborador->nombres}} {{$historial->colaborador->apellidos}}</td>

            <td>{{$historial->fallas}}</td>
            <td><a href="#modal2/{{$historial->id}}" class="purple-text text-darken-2 modal-trigger" >Ver imagen</a></td>
            @if($historial->estado == 'Sin Devolver')
            <td>{{'Sin Devolver'}}</td>
            @endif
            @if($historial->estado == 'Entregado')
            <td>{{\Carbon\Carbon::parse($historial->fecha_dev)->format('d/m/Y')}}</td>
            @endif
          </tr>
          <div id="modal/{{$historial->id}}" class="modal">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col l8 m8 s12">
                            <img src="{{$historial->foto_sal1}}" alt="" class="card responsive-img">
                        </div>
                        <div class="col l8 m8 s12">
                            <img src="{{$historial->foto_sal2}}" alt="" class="card responsive-img">
                        </div>
                        <div class="col l8 m8 s12">
                            <img src="{{$historial->foto_sal3}}" alt="" class="card responsive-img">
                        </div>
                        <div class="col l8 m8 s12">
                            <img src="{{$historial->foto_sal4}}" alt="" class="card responsive-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div id="modal2/{{$historial->id}}" class="modal">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col l8 m8 s12">
                            <img src="{{$historial->foto_dev1}}" alt="" class="card responsive-img">
                        </div>
                        <div class="col l8 m8 s12">
                            <img src="{{$historial->foto_dev2}}" alt="" class="card responsive-img">
                        </div>
                        <div class="col l8 m8 s12">
                            <img src="{{$historial->foto_dev3}}" alt="" class="card responsive-img">
                        </div>
                        <div class="col l8 m8 s12">
                            <img src="{{$historial->foto_dev4}}" alt="" class="card responsive-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>

  @endforeach
        </tbody>
      </table>
</div>
@endsection
