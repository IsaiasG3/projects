@extends('welcome')

@section('titulo','Asignar')

@section('contenido')
<div class="row container">
    <h4 style="margin-top: 50px">Asignar dispositivo a un colaborador</h4>
<hr>
    <form class="col s12" method="POST" action="/computo/{{$dispositivo->id}}">
        @method('PUT')
        @csrf
        <div class="input-field col s6 purple-text text-darken-2 " style="margin-top: 50px">
            <select name="id_colaborador" id="id_colaborador" class="purple-text text-darken-2">
                  @foreach ($colaboradores as $colaborador)
                  <option class="purple-text text-darken-2" value="{{$colaborador->id}}">{{$colaborador->nombres}} {{$colaborador->apellidos}}</option>
                  @endforeach
              </select>
              <label for="id_colaborador">Seleccione un colaboradorador</label>
                @error('id_colaborador')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
            </div>
          <div class="row" style="margin-top: 50px">
            <div class="input-field col s6" >
              <input type="submit" value="guardar" class="btn purple lighten-2" >
            </div>
          </div>
        </form>
      </div>
  @endsection
