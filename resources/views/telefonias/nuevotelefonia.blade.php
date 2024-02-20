@extends('welcome')

@section('titulo','Nuevo Teléfono')

@section('contenido')
<div class="row container">
    <h3>Nuevo Dispositivo</h3>
    <hr>
    <form class="col s12" method="POST" action="/telefonia">
        @method('POST')
        @csrf
        <div class="row">
            <div class="input-field col s6" style="margin-top: 50px">
              <input placeholder="" id="serie" name="serie" type="text" class="validate" value="{{old('serie')}}">
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
              <input placeholder="" id="modelo" name="modelo" type="text" class="validate" value="{{old('modelo')}}" >
              <label for="modelo">Modelo</label>
                    @error('modelo')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
              <input placeholder="" id="marca" name="marca" type="text" class="validate" value="{{old('marca')}} " >
              <label for="marca">Marca</label>
                    @error('cargador')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
            </div>
        </div>



          <div class="row">
            <div class="input-field col s6">
              <input placeholder="" id="imci" name="imci" type="text" class="validate"  value="{{old('imci')}} ">
              <label for="imci">IMEI</label>
                    @error('imci')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
            </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                  <input placeholder="" id="sim" name="sim" type="text" class="validate"  value="{{old('sim')}} ">
                  <label for="sim">SIM</label>
                        @error('sim')
                            <br>
                                <small>*{{$message}}</small>
                            <br>
                        @enderror
                </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                      <input placeholder="" id="tel_cerebrit0" name="tel_cerebrit0" type="text" class="validate"  value="{{old('tel_cerebrit0')}} ">
                      <label for="tel_cerebrit0">Tel. Cerebrit0</label>
                            @error('tel_cerebrit0')
                                <br>
                                    <small>*{{$message}}</small>
                                <br>
                            @enderror
                    </div>
                    </div>

              <input id="id_colaborador" name="id_colaborador" type="hidden" class="validate" value="1" >

          <div class="row">
            <div class="input-field col s12">
              <input type="submit" value="guardar" class="btn purple lighten-2">
            </div>
          </div>
        </form>
      </div>
  @endsection
