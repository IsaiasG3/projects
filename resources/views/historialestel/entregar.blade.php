@extends('welcome')

@section('titulo','Asignar')

@section('contenido')
<div class="row container">
    <h3>Devolver dispositivo </h3>
    <hr>
    <form class="col s12" method="POST" action="/historialt/{{$historial->id}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="row">
            <div class="input-field col s6" style="margin-top: 50px">
              <input placeholder="" id="fecha_dev" name="fecha_dev"type="date" class="validate"  min="2000-01-01"
              max="2300-12-31" value="{{old('fecha_dev')}}"  required >
              <label for="fecha_dev">Fecha de Entrega</label>
            </div>
          </div>

          <input id="estado" name="estado"type="hidden" class="validate" value="Entregado">
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="" id="fallas" name="fallas"type="text" class="validate"  value="{{old('fallas')}}" required>
              <label for="fallas">Fallas presentadas</label>
            </div>
          </div>

          <div>

            <p>Subir las imágenes correspondientes</p>
        <div class="row card">
            <div class="input-field col s6">
              <input id="foto_dev1" name="foto_dev1" type="file" value="{{old('foto_dev1')}}" class="validate" accept="image/*" required>
              @error('foto_dev1')
                <small>{{$message}}</small>
              @enderror

            </div>


            <div class="input-field col s6">
              <input id="foto_dev2" name="foto_dev2" type="file" value="{{old('foto_dev2')}}" class="validate" accept="image/*" required>
              @error('foto_dev2')
                <small>{{$message}}</small>
              @enderror

            </div>
          </div>
          <div class="row card">
            <div class="input-field col s6">
              <input id="foto_dev3" name="foto_dev3" type="file"  value="{{old('foto_dev3')}}" class="validate" accept="image/*" required>
              @error('foto_dev3')
                <small>{{$message}}</small>
              @enderror

            </div>

            <div class="input-field col s6">
              <input id="foto_dev4" name="foto_dev4" type="file"  value="{{old('foto_dev4')}}" class="validate" accept="image/*" required>
              @error('foto_dev4')
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
