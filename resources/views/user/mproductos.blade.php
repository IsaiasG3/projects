@extends('principal')

@section('breadcrumb', 'Mis Productos')

@section('Contenido')
<div class="container-fluid inicio h-custom mb-4" style="margin-top: 13%;">
    <div class="row d-flex justify-content-center h-100" style="background-color: #8BC34A; margin-bottom: 10%">
        <div class="divider d-flex align-items-center" style="color: #fff">
            <h3 class="contorno2 fw-bold mx-3 mt-4 mb-2" style="color: #5B962F">Mis Productos</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" style="background-color: #5B962F; color: #fff;">
                <thead>
                    <tr >
                        <th class="contorno2 text-center" style="color: #5B962F">Nombre</th>
                        <th class="contorno2 text-center" style="color: #5B962F">Descripción</th>
                        <th class="contorno2 text-center" style="color: #5B962F">Precio</th>
                        <th class="contorno2 text-center" style="color: #5B962F">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($misProductos as $producto)
                    <tr style="color: #fff">
                        <td class="text-center"><a href="/pedir/{{$producto->id}}" style="color: #fff">{{ $producto->nombre }}</a></td>
                        <td class="text-center">{{ $producto->descripcion }}</td>
                        <td class="text-center">${{ $producto->precio }}</td>
                        <td class="text-center">
                            <a href="/editar-producto/{{ $producto->id }}" class="btn btn-danger2">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
