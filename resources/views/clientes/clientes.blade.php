@extends('welcome')<!--Que esta dentro de una carpeta por eso el . y luego la vista-->

@section('titulo','Clientes')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-4">
            <a href="nuevo/cliente" class="btn-floating btn-large waves-effect waves-light purple accent-4"><i class="material-icons">add</i></a>
        </div>
    </div>
    <table class="striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Empresa</th>
                <th>Numero</th>

            </tr>
        </thead>

        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->apellidos}}</td>
                    <td>{{$cliente->empresa}}</td>
                    <td>{{$cliente->numero}}</td>
                </tr>
    @endforeach
            </tbody>
    </table>
</div>
@endsection
