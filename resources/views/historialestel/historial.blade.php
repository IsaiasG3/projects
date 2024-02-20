@extends('welcome')<!--Que esta dentro de una carpeta por eso el . y luego la vista-->

@section('titulo','Historial')

@section('contenido')

<div class="container">




<nav class="nav-extended purple lighten-2">
    <div class="nav-wrapper">
      <a href="/telefonias2" class="brand-logo" style="padding-left: 20px">Teléfonos</a>

    </div>
  </nav>


<div class="row">
<div class="card horizontal">
<div class="col s6 m6">
<div class="card horizontal">

  <div class="card-stacked">
    <div class="card-content">
        <p>Modelo: {{$dispositivo->modelo}}</p>
        <p>Marca: {{$dispositivo->marca}}</p>
        <p>IMEI: {{$dispositivo->imci}}</p>

    </div>


  </div>

</div>
</div>
<div class="col s6 m6">
<div class="card horizontal">

  <div class="card-stacked">
    <div class="card-content">



        <p>Serie: {{$dispositivo->serie}}</p>
        <p>SIM: {{$dispositivo->sim}}</p>
        <p>Número: {{$dispositivo->tel_cerebrit0}}</p>
    </div>

  </div>

</div>

</div>

</div>
</div>
    <table class="striped">
        <thead>
          <tr>

              <th>Fecha de Entrega</th>
              <th>Foto de Entrega</th>
              <th>Colaborador</th>
              <th>Estado</th>
              <th>Fallas</th>
              <th>Foto de Devolución</th>
              <th>Fecha de Devolución</th>
          </tr>
        </thead>

        <tbody>
  @foreach($historiales as $historial)
         <tr>
            <td>{{\Carbon\Carbon::parse($historial->fecha_entrega)->format('d/m/Y')}}</td>
            <td> <a href="#modal/{{$historial->id}}" class="indigo-text text-lighten-3 modal-trigger" >Ver imagen</a></td>
            <td>{{$historial->colaborador->nombres}} {{$historial->colaborador->apellidos}}</td>
            <td>{{$historial->estado}}</td>
            <td>{{$historial->fallas}}</td>
            <td><a href="#modal2/{{$historial->id}}" class="indigo-text text-lighten-3 modal-trigger" >Ver imagen</a></td>
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
