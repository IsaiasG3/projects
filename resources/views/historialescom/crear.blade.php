@extends('welcome')

@section('titulo','Asignar')

@section('contenido')
<div class="row container">
    <h3>Asignar dispositivo a un colaborador</h3>
    <hr>
<form class="col s12" method="POST" action="/historial" enctype="multipart/form-data">
    @method('POST') <!--Poner esto mejor-->
    @csrf <!--Genera el token, si no da error-->


      <div class="row" >
        <div class="input-field col s6 " style="margin-top: 50px">
          <input placeholder="" id="fecha_entregada" name="fecha_entrega"type="date"  min="2000-01-01"
          max="2300-01-01" class="validate" value="{{old('fecha_entrega')}} " required>
          <label for="fecha_entrega">Fecha de Entrega del dispositivo</label>
          @error('fecha_entrega')
          <br>
              <small>*{{$message}}</small>
          <br>
      @enderror
        </div>
      </div>
      <div >
        <p>Subir las imágenes correspondientes</p>
      <div class="row card" >


        <div class="input-field col s6">
          <input placeholder="" id="foto_sal1" name="foto_sal1" type="file" class="validate" accept="image/*" required>
          @error('foto_sal1')
            <small>{{$message}}</small>
          @enderror

        </div>


        <div class="input-field col s6">
          <input placeholder="" id="foto_sal2" name="foto_sal2" type="file" class="validate" accept="image/*" required>
          @error('foto_sal2')
            <small>{{$message}}</small>
          @enderror

        </div>

      </div>

      <div class="row card">
        <div class="input-field col s6">
          <input placeholder="" id="foto_sal3" name="foto_sal3" type="file" class="validate" accept="image/*" required>
          @error('foto_sal3')
            <small>{{$message}}</small>
          @enderror

        </div>

        <div class="input-field col s6">
          <input placeholder="" id="foto_sal4" name="foto_sal4" type="file" class="validate" accept="image/*" required>
          @error('foto_sal4')
            <small>{{$message}}</small>
          @enderror

        </div>
      </div>
    </div>
   {{--}} <div>
        <p>Subir la carta resguardo .pdf</p>
        <div class="row card">

        <div class="input-field col s6">
            <input placeholder="" id="archivo" name="archivo" type="file" class="validate" accept=".pdf" required>
            @error('archivo')
              <small>{{$message}}</small>
            @enderror

          </div>

    </div>--}}

    <input id="archivo" name="archivo" type="hidden" class="validate" value="Sin Archivo">


      <input id="estado" name="estado"type="hidden" class="validate" value="Sin Devolver">

      <input id="fallas" name="fallas"type="hidden" class="validate" value="---">

      <input id="fecha_dev" name="fecha_dev"type="hidden" class="validate" value="0001-01-01">

      <input id="foto_dev1" name="foto_dev1"type="hidden" class="validate" value="Sin devolver">
      <input id="foto_dev2" name="foto_dev2"type="hidden" class="validate" value="Sin devolver">
      <input id="foto_dev3" name="foto_dev3"type="hidden" class="validate" value="Sin devolver">
      <input id="foto_dev4" name="foto_dev4"type="hidden" class="validate" value="Sin devolver">

    <input id="id_colaborador" name="id_colaborador"type="hidden" class="validate" value="{{$dispositivo->id_colaborador}}">
    <input id="id_dispositivo" name="id_dispositivo"type="hidden" class="validate" value="{{$dispositivo->id}}">
    <div class="row">
        <div class="input-field col s12">
          <input type="submit" value="guardar" class="btn purple lighten-2">
        </div>
      </div>
</form>




</div>
@endsection
