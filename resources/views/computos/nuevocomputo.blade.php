@extends('welcome')

@section('titulo','Nuevo Cómputo')

@section('contenido')
<div class="row container">
    <h3>Nuevo Dispositivo</h3>
    <hr>
    <form class="col s12" method="POST" action="/computo">
        @method('POST')
        @csrf
        <div class="row">
            <div class="input-field col s6" style="margin-top: 50px">
              <input  id="serie" name="serie" type="text" class="validate" value="{{old('serie')}}">
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
              <input  id="folio" name="folio" type="text" class="validate" value="{{old('folio')}}" >
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
              <input  id="cargador" name="cargador" type="text" class="validate" value="{{old('cargador')}} " >
              <label for="cargador ">Cargador</label>
                    @error('cargador')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
            </div>
        </div>



          <div class="row">
            <div class="input-field col s6">
              <input  id="descripcion" name="descripcion" type="text" class="validate"  value="{{old('descripcion')}} ">
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
                  <label for="disabled">Seleccione el tipo</label>
                    @error('tipo')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
                </div>
              </div>

              <input id="id_colaborador" name="id_colaborador" type="hidden" class="validate" value="1" >

          <div class="row" style="margin-top: 50px">
            <div class="input-field col s12">
              <input type="submit" value="guardar" class="btn purple lighten-2">
            </div>
          </div>
        </form>
      </div>
  @endsection
