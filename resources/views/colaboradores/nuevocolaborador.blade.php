@extends('welcome')

@section('titulo','Nuevo Colaborador')

@section('contenido')
<div class="row container">
    <h4>Nuevo Colaborador</h4>
    <hr>
    <form class="col s12" method="POST" action="/colaborador">
        @method('POST')
        @csrf
            <div class="row">
                <div class="input-field col s6" style="margin-top: 50px">
                    <input placeholder="" id="nombres" name="nombres" type="text" class="validate"  value="{{old('nombres')}}">
                    <label for="nombres">Nombre</label>
                    @error('nombres')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="" id="apellidos" name="apellidos"type="text" class="validate" value="{{old('apellidos')}}">
                    <label for="apellidos">Apellidos</label>
                    @error('apellidos')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="" id="numero" name="numero"type="number" class="validate" value="{{old('numero')}} ">
                    <label for="numero">Número Telefonico</label>
                    @error('numero')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
                </div>
            </div>

            <input id="estado" name="estado"type="hidden" class="validate" value="Activo">
          {{--<div class="input-field col s6">
                <select name="id_cliente" id="id_cliente">
                    @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                    @endforeach
                </select>
                <label for="disabled">Escoja un cliente</label>
                @error('id_cliente')
                <br>
                    <small>*{{$message}}</small>
                <br>
                @enderror
            </div>--}}
            <input id="id_cliente" name="id_cliente"type="hidden" class="validate" value="1">
            <div class="row" style="margin-top: 50px">
                <div class="input-field col s12">
                <input type="submit" value="guardar" class="btn purple lighten-2">
                </div>
            </div>
    </form>
</div>
@endsection
