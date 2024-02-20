
@extends('welcome')

@section('titulo','Resguardo')

@section('contenido')
<div class="row container">
    <h3>Subir archivo de resguardo .pdf</h3>
    <hr>
<form class="col s12" method="POST" action="/historialeditar/{{$historial->id}}" enctype="multipart/form-data">
    @method('PUT') <!--Poner esto mejor-->
    @csrf <!--Genera el token, si no da error-->
    <div class="row card">

        <div class="input-field col s6">
            <input  id="archivo" name="archivo" type="file" class="validate" accept=".pdf" required>
            @error('archivo')
              <small>{{$message}}</small>
            @enderror

          </div>

    </div>
    <div class="row">
        <div class="input-field col s12">
          <input type="submit" value="guardar" class="btn purple lighten-2">
        </div>
      </div>
</form>




</div>
@endsection
