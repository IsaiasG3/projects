@extends('principal')

@section('breadcrumb', 'Agregar Producto')
@section('Contenido')
    <div class="container-fluid inicio h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="card col-md-9 mb-4" style="background-color:  #5B962F;margin-top:5%">
                <form action="/guardar-producto" method="POST" class="align-items-center validar" enctype="multipart/form-data">
                    @csrf
                    @include('mensaje')
                    <div class="divider d-flex align-items-center mt-4 my-4">
                        <h3 class="text-center fw-bold mx-3 mb-0" style="color:#fff">Agregar Producto</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Nombre input -->
                            <div class="form-outline">
                                <label class="form-label tex mt-2" for="nombre">Nombre</label>
                                @error('nombre')
                                    <br>
                                    <small style="color: #fff !important">{{ $message }}</small>
                                    <br>
                                @enderror
                                <input type="text" name="nombre" id="nombre" class="form-control cajita form-control-lg"
                                    placeholder="Ingrese el nombre del producto" required value="{{ old('nombre') }}" />
                            </div>
                        </div>



                        <div class="col-md-6">
                            <!-- Precio input -->
                            <div class="form-outline">
                                <label class="form-label tex mt-2" for="precio">Precio</label>
                                @error('precio')
                                    <br>
                                    <small style="color: #fff !important">{{ $message }}</small>
                                    <br>
                                @enderror
                                <input type="number" name="precio" id="precio" class="form-control cajita form-control-lg"
                                    placeholder="Ingrese el precio del producto" required value="{{ old('precio') }}" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Oferta input -->
                            <div class="form-outline">
                                <label class="form-label tex mt-2" for="oferta">Oferta</label>
                                @error('oferta')
                                    <br>
                                    <small style="color: #fff !important">{{ $message }}</small>
                                    <br>
                                @enderror
                                <input type="text" name="oferta" id="oferta" class="form-control cajita form-control-lg"
                                    placeholder="Ingrese la oferta del producto (opcional)" value="{{ old('oferta') }}" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Disponible input -->
                            <div class="form-outline">
                                <label class="form-label tex mt-2" for="disponible">Disponible</label>
                                @error('disponible')
                                    <br>
                                    <small style="color: #fff !important">{{ $message }}</small>
                                    <br>
                                @enderror
                                <input type="number" name="disponible" id="disponible"
                                    class="form-control cajita form-control-lg" placeholder="Ingrese la cantidad disponible"
                                    required value="{{ old('disponible') }}" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Método de Entrega input -->
                            <div class="form-outline">
                                <label class="form-label tex mt-2" for="metodoentrega">Método de Entrega</label>
                                @error('metodoentrega')
                                    <br>
                                    <small style="color: #fff !important">{{ $message }}</small>
                                    <br>
                                @enderror
                                <select name="metodoentrega" id="metodoentrega" class="form-control cajita form-control-lg" onchange="mostrarPuntosEntrega(this.value)">
                                    <option value="En Punto">En mi Domicilio Registrado</option>
                                    <option value="A domicilio">Envio a Domicilio</option>
                                </select>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <!-- Método de Pago input -->
                            <div class="form-outline">
                                <label class="form-label tex mt-2" for="metodopago">Método de Pago</label>
                                @error('metodopago')
                                    <br>
                                    <small style="color: #fff !important">{{ $message }}</small>
                                    <br>
                                @enderror
                                <select name="metodopago" id="metodopago" class="form-control cajita form-control-lg">
                                    <option value="Efectivo">Efectivo</option>
                                    @if ($user->dato !== null)
                                    <option value="Tarjeta">Tarjeta</option>

                                @endif

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Descripción input -->
                            <div class="form-outline">
                                <label class="form-label tex mt-2" for="descripcion">Descripción</label>
                                @error('descripcion')
                                    <br>
                                    <small style="color: #fff !important">{{ $message }}</small>
                                    <br>
                                @enderror
                                <textarea name="descripcion" id="descripcion" class="form-control cajita form-control-lg"
                                    placeholder="Ingrese la descripción del producto" required>{{ old('descripcion') }}</textarea>
                            </div>
                        </div>




                        <div class="col-md-12">
                            <!-- Categorías input -->
                            <div class="form-outline">
                                <label class="form-label tex mt-2">Selecciona las categorías a las que pertenece tu producto</label>
                                @error('categorias')
                                    <!-- ... Mensajes de error ... -->
                                @enderror
                                <div class="checkbox-container">
                                    @foreach($categorias as $categoria)
                                        <div class="checkbox-item">
                                            <input type="checkbox" name="categorias[]" id="categoria_{{ $categoria->id }}" value="{{ $categoria->id }}" onchange="categoriasCheckboxChanged(this)">
                                            <label for="categoria_{{ $categoria->id }}">{{ $categoria->nombre }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <span class="mt-4" style="color:#fff">Categorías Seleccionadas:</span>
                        <div class="col-md-12 mt-3" id="categoriasSeleccionadas">       </div>

                        <div class="col-md-12">
                            <!-- Imágenes del Producto input -->
                            <div class="form-outline">
                                <label class="form-label tex mt-2" for="imagenes">Imágenes del Producto</label>
                                @error('imagenes')
                                    <br>
                                    <small style="color: #fff !important">{{ $message }}</small>
                                    <br>
                                @enderror
                                <input type="file" name="imagenes[]" id="imagenes" class="form-control cajita form-control-lg" accept="image/*" multiple required>
                            </div>
                            <!-- Contenedor para las miniaturas -->
                            <div class="mt-3" id="miniaturas"></div>
                        </div>


                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <div class="text-center text-lg-start">
                            <button class="btn btn-danger2 validarb" style="padding-left: 2.5rem; padding-right: 2.5rem;"
                                type="submit"> <i class="spinner fas fa-spinner fa-spin"></i> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        /* Estilos para el div que muestra las categorías seleccionadas */
        #categoriasSeleccionadas {
            display: flex;
            flex-wrap: wrap;
        }

        /* Estilos para cada checkbox */
        .checkbox-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            background-color: #8BC34A; /* Fondo verde */
            color: #fff; /* Texto blanco */
            border: 1px solid #fff; /* Borde verde más oscuro */
            padding: 6px; /* Espaciado interno */
            border-radius: 6px;
            margin-right: 10px; /* Espaciado entre cuadritos */
            margin-bottom: 10px; /* Espaciado entre cuadritos */
            display: flex;
            align-items: center; /* Centrar elementos verticalmente */
        }

        .checkbox-item label {
            display: inline-block;
            position: relative;
            padding-left: 30px;
            cursor: pointer;
        }

        /* Media query para dispositivos con un ancho máximo de 768px (vista móvil) */
        @media (max-width: 768px) {
            .checkbox-container {
                grid-template-columns: repeat(2, 1fr); /* Mostrar 2 columnas en vez de 3 */
            }

            /* Ajustar el espaciado entre cuadritos para dispositivos móviles */
            .checkbox-item {
                margin-right: 5px;
                margin-bottom: 5px;
            }
        }

        input[type="checkbox"]:checked {
            background-color: #8BC34A;
        }

        /* Estilos para las categorías seleccionadas */
        .categoria-seleccionada {
            background-color: #8BC34A; /* Fondo verde */
            color: #fff; /* Texto blanco */
            border: 1px solid #fff; /* Borde verde más oscuro */
            padding: 6px; /* Espaciado interno */
            border-radius: 6px;
            margin-right: 10px; /* Espaciado entre cuadritos */
            margin-bottom: 10px; /* Espaciado entre cuadritos */
            display: flex;
            align-items: center; /* Centrar elementos verticalmente */
        }

    </style>







<script>
    // Mantener un arreglo para almacenar las categorías seleccionadas
    let categoriasSeleccionadas = [];

    // Restaurar las categorías seleccionadas si hay valores guardados en el campo oculto
    const categoriasSeleccionadasHidden = document.getElementById('categoriasSeleccionadasHidden');
    if (categoriasSeleccionadasHidden.value) {
        categoriasSeleccionadas = JSON.parse(categoriasSeleccionadasHidden.value);
        mostrarCategoriasSeleccionadas();
    }

    // Función para mostrar las categorías seleccionadas
    function mostrarCategoriasSeleccionadas() {
        const divCategoriasSeleccionadas = document.getElementById('categoriasSeleccionadas');

        // Limpiar el contenido previo antes de actualizar las categorías seleccionadas
        divCategoriasSeleccionadas.innerHTML = '';

        // Mostrar las categorías seleccionadas en el div correspondiente
        categoriasSeleccionadas.forEach(category => {
            const categoriaSeleccionada = document.createElement('div');
            categoriaSeleccionada.classList.add('categoria-seleccionada');
            categoriaSeleccionada.textContent = category;
            divCategoriasSeleccionadas.appendChild(categoriaSeleccionada);
        });
    }

    // Función para eliminar una categoría seleccionada
    function eliminarCategoriaSeleccionada(category) {
        const index = categoriasSeleccionadas.indexOf(category);
        if (index > -1) {
            categoriasSeleccionadas.splice(index, 1);
            // Mostrar las categorías seleccionadas actualizadas
            mostrarCategoriasSeleccionadas();
            // Actualizar el valor del campo oculto con las categorías seleccionadas
            categoriasSeleccionadasHidden.value = JSON.stringify(categoriasSeleccionadas);
        }
    }

    // Función para agregar una categoría seleccionada
    function agregarCategoriaSeleccionada(category) {
        categoriasSeleccionadas.push(category);
        // Mostrar las categorías seleccionadas actualizadas
        mostrarCategoriasSeleccionadas();
        // Actualizar el valor del campo oculto con las categorías seleccionadas
        categoriasSeleccionadasHidden.value = JSON.stringify(categoriasSeleccionadas);
    }

    // Función para manejar el cambio en los checkboxes de categorías
    function categoriasCheckboxChanged(checkbox) {
        const category = checkbox.nextElementSibling.textContent;
        if (checkbox.checked) {
            agregarCategoriaSeleccionada(category);
        } else {
            eliminarCategoriaSeleccionada(category);
        }
    }
</script>


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


