@extends('principal')

@section('breadcrumb', 'Calificar Producto')

@section('Contenido')
<div class="container-fluid inicio h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="card col-md-8 mb-4" style="background-color: #5B962F; margin-top: 5%">
            <form action="/" method="POST">
                @csrf
                <div class="divider d-flex align-items-center mt-4 my-4">
                    <h3 class="text-center fw-bold mx-3 mb-0" style="color: #fff">Calificar Producto</h3>
                </div>

                <input type="hidden" name="id_producto" value="{{ $producto->id }}">

                <div class="form-group row">
                    <label for="calificacion" class="col-md-4 col-form-label text-md-right" style="color: #fff">Calificación</label>

                    <div class="col-md-6">
                        <select name="calificacion" id="calificacion" class="form-control">
                            <option value="1">1 Estrella</option>
                            <option value="2">2 Estrellas</option>
                            <option value="3">3 Estrellas</option>
                            <option value="4">4 Estrellas</option>
                            <option value="5">5 Estrellas</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="comentario" class="col-md-4 col-form-label text-md-right" style="color: #fff">Comentario</label>

                    <div class="col-md-6 mt-4">
                        <textarea name="comentario" id="comentario" class="form-control" rows="4"></textarea>
                    </div>
                </div>

                <div class="form-group row mb-0 mt-4">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-succes">Enviar Calificación</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<style>
    /* Agrega los estilos personalizados que necesites aquí */
</style>
