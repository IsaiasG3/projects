@extends('welcome')

@section('titulo','Nuevo Cliente')

@section('contenido')
<div class="row container">
    <h3>Nuevo Cliente</h3>
    <hr>
        <form class="col s12" method="POST" action="/cliente">
            @method('POST')
            @csrf <!--Genera el token -->
            <div class="row">
                <div class="input-field col s12">
                    <input id="nombre" name="nombre" type="text" class="validate" value="{{old('nombre')}}">
                    <label for="first_name">Nombre</label>
                    @error('nombre')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="apellidos" name="apellidos" type="text" class="validate" value="{{old('apellidos')}}">
                    <label for="last_name">Apellidos</label>
                    @error('apellidos')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="empresa" name="empresa"type="text" class="validate" value="{{old('empresa')}}">
                    <label for="disabled">Empresa</label>
                    @error('empresa')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="numero" type="number" name="numero"class="validate" value="{{old('numero')}}">
                    <label for="disabled">Número</label>
                    @error('numero')
                        <br>
                            <small>*{{$message}}</small>
                        <br>
                    @enderror
                </div>
            </div>


            <div class="row">
                    <div class="input-field col s12">
                    <input type="submit" value="guardar" class="btn btn-light-green btn-darken-3">
                </div>
            </div>
        </form>
</div>
@endsection
