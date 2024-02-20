@extends('principal')

@section('breadcrumb', 'Mensajes')

@section('Contenido')
    <div class="container-fluid inicio h-custom mb-4r">
        <div class="row justify-content-center">
            <div class="card col-md-9 mb-4" style="background-color: #5B962F; margin-top: 5%;">
                <div class="divider d-flex align-items-center mt-4 my-4">
                    <h3 class="text-center fw-bold mx-3 mb-0" style="color: #fff">{{ $producto->nombre }}</h3>
                </div>


                    <!-- Mostrar mensajes existentes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            <ul>
                                @foreach ($mensajes as $mensaje)
                                    <li class="text-white">
                                        <strong>De: {{ $mensaje->emisor->name }}</strong>
                                        <p>{{ $mensaje->contenido }}</p>
                                        <small>Enviado el: {{ $mensaje->fechaenvio }}</small>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        </div>
                    </div>

                    <!-- Formulario para enviar un nuevo mensaje -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <form method="post" action="/">
                                @csrf
                                <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                                <div class="form-group">
                                    <textarea name="contenido" id="contenido" class="form-control" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar mensaje</button>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <style>
        /* Estilos personalizados aquí */

    </style>

@endsection
