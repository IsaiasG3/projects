@extends('principal')

@section('breadcrumb', 'pedir')
@section('Contenido')

<div class="container-fluid inicio h-custom" style="background-color: #FAEEC1">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5 ">
            <div style="margin-top: 15%"></div>
            <img src="{{ $producto->imagen  }}" alt="{{ $producto->nombre }}" class="img-fluid" style="max-width: 100%;border: 3px solid #963A3B;">
            <div class="card">
            <h5 class="mt-4 text-center" style="color: #963A3B">{{ $producto->nombre }}</h5>
                        <h5  class="text-center" style="color: #963A3B">Precio: ${{ $producto->precio }}</h5>
                        <h5  class="text-center" style="color: #963A3B">Tamaño: {{ $producto->tamaño }}</h5>
                        <h5  class="text-center"  style="color: #963A3B">Sabor: {{ $producto->sabor }}</h5>
                        <h5  class="text-center" style="color: #963A3B">Color: {{ $producto->color }}</h5></div>
            <div style="margin-bottom: 10%"></div>
        </div>
        <div class=" card col-md-8 col-lg-6 mb-4 col-xl-4 mt-4 offset-xl-1"
            style=" background-color:  #963A3B">

            <form action="/pedido" method="POST">
                @csrf
                @include('mensaje')
                <div class="divider d-flex align-items-center">
                    <h3 class="text-center mt-4 fw-bold mx-3 mb-0" style="color:#fff">Realizar Pedido</h3>
                </div>
                <p class="text-center fw-bold mx-3 mb-4" style="color:#fff"> El modelo será el del producto seleccionado</p>

                <input type="hidden" name="id_producto" value="{{ $producto->id }}">

                <div class="form-group">
                  <label class="form-label tex" for="tamaño">Seleccione el Tamaño:</label>
                  <select class="form-control cajita" id="tamaño" name="tamaño">
                    <option value="Individual">Individual</option>
                    <option value="Pequeño">Pequeño</option>
                    <option value="Mediano">Mediano</option>
                    <option value="Grande">Grande</option>
                </select>
                </div>

                <div class="form-group">
                  <label class="form-label tex" for="sabor">Seleccione el Sabor:</label>
                  <select class="form-control cajita" id="sabor" name="sabor">
                    <option value="{{$producto->sabor}}">{{$producto->sabor}}</option>
                </select>

                </div>

                <div class="form-group">
                  <label class="form-label tex" for="color">Color:</label>
                  <input type="text" class="form-control cajita mb-2" id="color" name="color"  required value="{{ old('color') }}">
                </div>
                <div class="form-group">
                    <label class="form-label tex" for="entrega">Fecha de entrega:</label>
                    <input type="date" class="form-control cajita" id="entrega" name="entrega" required
                           min="{{ date('Y-m-d', strtotime('+3 days')) }}"
                           max="{{ date('Y-m-d', strtotime('+30 days')) }}">
                </div>


                <div class="form-group">
                  <label class="form-label tex" for="escrito">Escrito o Nombre a escribir:</label>
                  <input type="text" placeholder="No es obligatorio" class="form-control cajita mb-2" id="escrito" name="escrito" value="{{ old('escrito') }}">
                </div>

                <div class="form-group">
                  <label class="form-label tex" for="especial">Alguna especificación especial:</label>
                  <textarea class="form-control cajita" placeholder="No es obligatorio"  id="especial " name="especial" value="{{ old('especial') }}"></textarea>
                </div>



                <div class="divider d-flex align-items-center my-4">
                    <div class="text-center text-lg-start">
                        <button class="btn btn-danger validarb"
                            style="padding-left: 2.5rem; padding-right: 2.5rem" type="submit"> <i
                                class="spinner fas fa-spinner fa-spin"></i> Enviar Pedido</button>
                    </div>
                </div>

              </form>
        </div>
    </div>

</div>

@endsection
