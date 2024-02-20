@extends('principal')

@section('breadcrumb', 'produc')
@section('Contenido')



<div class="card inicio" style="margin-top: 6%">
    <div class="container-fluid h-custom">
        <div class="card mt-2" style="border: 2px solid #5B962F;overflow: hidden">
            <div class="row d-flex justify-content-center mt-4 align-items-center h-100" style="margin-top:15%">


    <div class=" container mt-4 row" style="background-color: #8BC34A">

<!-- #B2DF8A-->


<div class="container card " style="background: #5B962F">

    <div class="divider d-flex align-items-center mt-4" style="color: white">

<h3 class="text-center contorno mt-2 mx-3 mb-4" style="color: white">
        Bienvenido al catalogo de todos los productos registrados

    </h3>
</div>
@auth
<div class="container card formulario-container" style="background: #5B962F">
    <!-- Resto del contenido del formulario -->

<form action="/productos/region" method="POST" >
    @csrf

    <select name="id_ubicacion" class="form-control cajta text-center mb-3" style="border: 3px solid #5B962F;" id="ubicacionDomicilio">
        @foreach ($ubicaciones as $ubicacion)
            <option value="{{ $ubicacion->id }}">{{ $ubicacion->direccion }}</option>
        @endforeach
    </select>
    <div class="divider d-flex align-items-center my-4">
        <div class="text-center text-lg-start">
            <button class="btn btn-danger2" style="padding-left: 2.5rem; padding-right: 2.5rem;"
            type="submit">Productos de mi Región</button>
        </div>
    </div>

</form>
</div>

@endauth

</div>
        @if($productos->count() == 0)
        <div class="inicio" style="margin-bottom: 20%">
            <div class="container card " style="background: #8BC34A">
                <h1 class="text-center contorno2 mx-3 mt-2 " style="color: #5B962F !important">
              Lo sentimos, no hay productos:(
                </h1>
            </div>
        </div>
        @endif
        @foreach($productos as $producto)


        <div class="col-md-3 mt-4 mb-3">
              <div class="card text-black h-100 card-producto" style="border: 2px solid #5B962F; background-color: #B2DF8A" >
                <div class="card-img-container1">
                <img src="{{ asset($producto->imagen->url) }}" alt="Imagen del producto">
                </div>
                <h6 class="card-title contorno p-2 text-center" style="color: #FFF">
                     {{$producto->nombre}} ${{$producto->precio}} </h6>

                <div class="card-footer d-flex">
                    <button type="button" class="btn btn-secondary "
                    data-bs-toggle="modal"
                    data-bs-target="#modal{{ $producto->id }}">Ver detalles</button>
                </div>
              </div>
            </div>
        @endforeach
        @foreach ($productos as $producto)
        <div class="modal fade" id="modal{{ $producto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="background: linear-gradient(to bottom, #8BC34A, #FFFFFF); border: 1px solid #5B962F;">
                        <div class="row">
                            <div class="col-md-6">

                                <img src="{{ $producto->imagen->url}}" alt="{{ $producto->nombre }}" class="img-fluid"  style="border: 3px solid #5B962F;">
                            </div>
                            <div class="col-md-6">
                                <h3 class=" mt-4 contorno text-center" style="color: #FFF">Producto: {{ $producto->nombre }}</h3>
                                <h5  class="contorno text-center mt-4"style="color: #FFF">Precio: ${{ $producto->precio }}</h5>
                                @if ($producto->oferta)
                                    <h5 style="color: #fff" class="contorno text-center">Oferta: {{$producto->oferta}}</h5>
                                @endif

                            </div>
                            <h5  class="contorno text-center mt-4"style="color: #FFF">Descripción: {{ $producto->descripcion }}</h5>
                            <div class="mt-4 text-center">
                                <a href="/pedir/{{$producto->id}}"class="btn btn-secondary">Ver Producto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="container card " style="background: #B2DF8A">

        <div class="divider d-flex align-items-center mt-4 mb-4" style="color: white">
            <ul class="pagination">

                <!-- Botón "Anterior" -->
                @if ($productos->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">Anterior</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $productos->previousPageUrl() }}">Anterior</a></li>
                @endif

                <!-- Números de páginas -->
                @for ($i = 1; $i <= $productos->lastPage(); $i++)
                    @if ($productos->currentPage() === $i)
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $productos->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor

                <!-- Botón "Siguiente" -->
                @if ($productos->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $productos->nextPageUrl() }}">Siguiente</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
                @endif

            </ul>
        </div>
    </div>
    </div>
</div>

</div>

</div>

<style>
/* Estilos para el contenedor de la paginación */


/* Estilos para los botones de paginación no seleccionados */
.pagination .page-item:not(.active) .page-link {
    background-color: #8BC34A;
    color: #fff;
    border-color: #8BC34A;
    border: 2px solid #5B962F;
    padding: 10px;

}

/* Estilos para los botones de paginación seleccionados */
.pagination .page-item.active .page-link {
    background-color: #5B962F;
    color: #fff;
    border-color: #5B962F;
    border: 2px solid #5B962F;
    padding: 10px;
}
/* Estilos para el formulario */
.formulario-container {
    max-width: 600px; /* Ajusta el valor según el ancho deseado */
    margin: 0 auto; /* Esto centrará el formulario horizontalmente */
}

</style>
@endsection

