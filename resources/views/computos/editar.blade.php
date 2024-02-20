@extends('welcome')

@section('titulo','Editar Dispositivo')

@section('contenido')
<div class="row container">
    <h3>Editar Dispositivo</h3>

    <form class="col s12" method="POST" action="/editar2/{{$dispositivo->id}}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="input-field col s6" style="margin-top: 50px">
              <input placeholder="" id="serie" name="serie" type="text" class="validate" value="{{$dispositivo->serie}}">
              <label for="serie">Ingrese el número de serie correspondiente</label>
              @error('serie')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
              @enderror
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
              <input placeholder="" id="folio" name="folio" type="text" class="validate" value="{{$dispositivo->folio}}" >
              <label for="folio">Folio</label>
                    @error('folio')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
              <input placeholder="" id="cargador" name="cargador" type="text" class="validate" value="{{$dispositivo->cargador}} " >
              <label for="cargador">Cargador</label>
                    @error('cargador')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
            </div>
        </div>



          <div class="row">
            <div class="input-field col s6">
              <input placeholder="" id="descripcion" name="descripcion" type="text" class="validate"  value="{{$dispositivo->descripcion}} ">
              <label for="descripcion">Descripción</label>
                    @error('descripcion')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
            </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select name="tipo" id="tipo">
                        <option value="Leasing">Arrendado</option>
                        <option value="FA">De la empresa</option>
                  <label for="tipo">Seleccione el tipo</label>
                    @error('tipo')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
                </div>
              </div>

              <input id="id_colaborador" name="id_colaborador" type="hidden" class="validate" value="{{$dispositivo->id_colaborador}}" >

          <div class="row" style="margin-top: 50px">
            <div class="input-field col s12">
              <input type="submit" value="guardar" class="btn purple lighten-2">
            </div>
          </div>
        </form>
      </div>
  @endsection
