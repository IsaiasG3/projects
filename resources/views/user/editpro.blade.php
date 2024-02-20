@extends('principal')

@section('breadcrumb', 'Editar Producto')
@section('Contenido')
    <div class="container-fluid inicio h-custom mb-4" style="margin-top: 13%;">
        <div class="row d-flex justify-content-center h-100" style="background-color: #8BC34A; margin-bottom: 10%">
            <div class="divider d-flex align-items-center" style="color: #fff">
                <h3 class="contorno2 fw-bold mx-3 mt-4 mb-2" style="color: #5B962F">Editar Producto</h3>
            </div>
            <div class="col-md-6">
                <form action="/actualizar-producto/{{$producto->id}}" method="POST" class="align-items-center validar" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="form-outline">
                        <label for="nombre" class="form-label contorno tex mt-2" >Nombre del Producto</label>
                        @error('nombre')
                            <br>
                            <small style="color: #fff !important">{{ $message }}</small>
                            <br>
                        @enderror
                        <input type="text" name="nombre" id="nombre" class="form-control cajita form-control-lg"
                            placeholder="Ingrese el nombre del producto" required value="{{ $producto->nombre }}" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <!-- Precio input -->
                        <div class="form-outline">
                            <label class="form-label contorno tex mt-2" for="precio">Precio</label>
                            @error('precio')
                                <br>
                                <small style="color: #fff !important">{{ $message }}</small>
                                <br>
                            @enderror
                            <input type="number" name="precio" id="precio" class="form-control cajita form-control-lg"
                                placeholder="Ingrese el precio del producto" required value="{{ $producto->precio }}" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <!-- Oferta input -->
                        <div class="form-outline">
                            <label class="form-label contorno tex mt-2" for="oferta">Oferta (no es necesario)</label>
                            @error('oferta')
                                <br>
                                <small style="color: #fff !important">{{ $message }}</small>
                                <br>
                            @enderror
                            <input type="text" name="oferta" id="oferta" class="form-control cajita form-control-lg"
                                placeholder="Ingrese la oferta del producto (opcional)" value="{{ $producto->oferta }}" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- Descripción input -->
                        <div class="form-outline">
                            <label class="form-label contorno tex mt-2" for="descripcion">Descripción</label>
                            @error('descripcion')
                                <br>
                                <small style="color: #fff !important">{{ $message }}</small>
                                <br>
                            @enderror
                            <textarea name="descripcion" id="descripcion" class="form-control cajita form-control-lg"
                                placeholder="Ingrese la descripción del producto" required>{{ $producto->descripcion }}</textarea>
                        </div>
                    </div>

                    <div class="mb-2">
                        <!-- Imágenes del Producto input -->
                        <div class="form-outline">
                            <label class="form-label tex mt-2" for="imagenes">Agrega más Imágenes al Producto (opcional)</label>
                            @error('imagenes')
                                <br>
                                <small style="color: #fff !important">{{ $message }}</small>
                                <br>
                            @enderror
                            <input type="file" name="imagenes[]" id="imagenes" class="form-control cajita form-control-lg" accept="image/*" multiple >
                        </div>
                        <!-- Contenedor para las miniaturas -->
                        <div class="mt-3" id="miniaturas"></div>
                    </div>


                    <div class="divider d-flex align-items-center my-4">
                        <div class="text-center text-lg-start">
                            <button class="btn btn-danger2 validarb" style="padding-left: 2.5rem; padding-right: 2.5rem;"
                                type="submit"> <i class="spinner fas fa-spinner fa-spin"></i> Guardar Cambios</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        // Función para mostrar miniaturas al seleccionar imágenes
        function mostrarMiniaturas(event) {
            const miniaturasDiv = document.getElementById('miniaturas');
            miniaturasDiv.innerHTML = '';

            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function (e) {
                    const miniaturaDiv = document.createElement('div');
                    miniaturaDiv.classList.add('miniatura');
                    const imagen = document.createElement('img');
                    imagen.src = e.target.result;
                    miniaturaDiv.appendChild(imagen);
                    miniaturasDiv.appendChild(miniaturaDiv);
                }

                reader.readAsDataURL(file);
            }
        }

        // Escuchar cambios en el campo de imágenes
        const imagenesInput = document.getElementById('imagenes');
        imagenesInput.addEventListener('change', mostrarMiniaturas);
    </script>

@endsection
