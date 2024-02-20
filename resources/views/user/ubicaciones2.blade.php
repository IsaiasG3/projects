@extends('principal')

@section('breadcrumb', 'Ubicaciones Registradas')
@section('Contenido')
    <div class="card inicio" style="margin-top: 6%">
        <div class="container-fluid h-custom">
            <div class="card mt-2" style="border: 2px solid #5B962F;overflow: hidden">
                <div class="row d-flex justify-content-center mt-4 align-items-center h-100" style="margin-top:15%">

                    <div class="container mt-4 row" style="background-color: #8BC34A">
                        <div class="container card " style="background: #5B962F">
                             <div class="container card mt-4" style="background: #8BC34A">
                                <div class="divider d-flex align-items-center mt-4" style="color: white">
                                    <h3 class="text-center contorno fw-bold mx-3 mt-4 mb-0">Agrega una nueva ubicación</h3>
                                </div>
                                <div class="text-center mb-4">
                                    <a href="/ubicaciones" class="btn btn-primary btn-lg mx-auto w-50 d-none d-md-block">Agregar Ubicación</a>
                                    <a href="/ubicaciones" class="btn btn-primary btn-sm mx-auto w-50 d-block d-md-none">Agregar Ubicación</a>
                                </div>
                            </div>
                            <div class="divider d-flex align-items-center mt-4" style="color: white">
                                <h3 class="text-center contorno mt-2 mx-3 mb-4" style="color: white">
                                    Ubicaciones Registradas
                                </h3>
                            </div>

                            <div class="container card formulario-container" style="background: #5B962F">
                                <div class="row mt-4">
                                    @foreach ($ubicaciones as $ubicacion)
                                        <div class="col-md-4 mb-3">
                                            <div class="card text-black h-100 card-ubicacion" style="border: 2px solid #5B962F; background-color: #B2DF8A">
                                                <div class="card-body">
                                                    <h5 class="card-title contorno text-center" style="color: #FFF">
                                                        {{ $ubicacion->estado }}
                                                    </h5>
                                                    <p class="card-text contorno text-center" style="color: #FFF">
                                                        Ciudad: {{ $ubicacion->ciudad }}
                                                    </p>
                                                    <p class="card-text contorno text-center" style="color: #FFF">
                                                        Dirección: {{ $ubicacion->direccion }}
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
