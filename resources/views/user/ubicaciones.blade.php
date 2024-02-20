@extends('principal')

@section('breadcrumb', 'ubicaciones')
@section('Contenido')
<div class="container-fluid inicio h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="card col-md-9 mb-4" style="background-color:  #5B962F; margin-top: 5%">
            <form action="/guardarubicacion" method="POST" class="align-items-center validar">


                @csrf
                @include('mensaje')
                <div class="divider d-flex align-items-center mt-4 my-4" >
                    <h3 class="text-center fw-bold mx-3 mb-0" style="color:#fff">Guardar Nueva Ubicacion</h3>
                </div>
                <input type="hidden" name="role" value="normal">

                <div class="row">
                    <div class="col-md-6">
                        <!-- Nombre input -->
                        <div class="form-outline ">
                            <label class="form-label tex mt" for="name">Estado</label>
                            @error('estado')
                                <br>
                                <small style="color: #fff !important">*{{ $message }}</small>
                                <br>
                            @enderror
                            <input type="text" name="estado" id="estado" class="form-control cajita form-control-lg"
                                placeholder="Ingrese el Estado" required value="{{ old('estado') }}" autocomplete="off"  />
                        </div>

                        <!--AIzaSyDtqdFxk3F2uWQqTZ00MRtUbsIhgD_rMAU-->
                    </div>

                    <div class="col-md-6">
                        <!-- Número telefónico input -->
                        <div class="form-outline ">
                            <label class="form-label tex" for="telefono">Ciudad</label>
                            @error('ciudad')
                                <br>
                                <small style="color: #fff !important">*{{ $message }}</small>
                                <br>
                            @enderror
                            <input type="text" name="ciudad" id="ciudad"
                                class="form-control cajita form-control-lg" placeholder="Ingrese su Ciudad"
                                required value="{{ old('ciudad') }}" autocomplete="off" />
                        </div>
                    </div>
                    <div class="col-md-12">
                         <!-- Correo electrónico input -->
                         <div class="form-outline">
                            <label class="form-label tex mt-2" for="email">Dirección</label>
                            @error('direccion')
                                <br>
                                <small style="color: #fff !important">*{{ $message }}</small>
                                <br>
                            @enderror
                            <input type="text" name="direccion" id="direccion" class="form-control cajita form-control-lg"
                            placeholder="Ingrese su dirección" required value="{{ old('direccion') }}" autocomplete="off" />

                        </div>
                    </div>

                    </div>


                <div class="divider d-flex align-items-center my-4">
                    <div class="text-center text-lg-start">
                        <button class="btn btn-danger2 validarb"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;"
                            type="submit"> <i class="spinner fas fa-spinner fa-spin"></i> Registrar Ubicación</button>
                    </div>
                    <div class="text-center text-lg-start">
                    <button id="ubicacion-btn" class="btn btn-danger2">Obtener Ubicación</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var ubicacionBtn = document.getElementById('ubicacion-btn');
      var estadoInput = document.getElementById('estado');
      var ciudadInput = document.getElementById('ciudad');
      var direccionInput = document.getElementById('direccion');

      ubicacionBtn.addEventListener('click', function() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Obtener la información de ubicación usando Geocoding inverso
            var geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(latitude, longitude);

            geocoder.geocode({ 'latLng': latlng }, function(results, status) {
              if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                  // Obtener el estado, ciudad y dirección del primer resultado
                  var addressComponents = results[0].address_components;

                  var estado = '';
                  var ciudad = '';
                  var direccion = '';

                  for (var i = 0; i < addressComponents.length; i++) {
                    var types = addressComponents[i].types;

                    if (types.includes('administrative_area_level_1')) {
                      estado = addressComponents[i].long_name;
                    }

                    if (types.includes('locality')) {
                      ciudad = addressComponents[i].long_name;
                    }

                    if (types.includes('route')) {
                      direccion = addressComponents[i].long_name;
                    }
                  }

                  // Rellenar automáticamente los campos del formulario
                  estadoInput.value = estado;
                  ciudadInput.value = ciudad;
                  direccionInput.value = direccion;
                }
              }
            });
          });
        } else {
          alert('Tu navegador no admite la geolocalización.');
        }
      });
    });
  </script>
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtqdFxk3F2uWQqTZ00MRtUbsIhgD_rMAU&libraries=places"></script>
<script>

// Esperar a que el documento esté listo
document.addEventListener('DOMContentLoaded', function() {
  // Obtener los campos de autocompletado
  var direccionInput = document.getElementById('direccion');
  var estadoInput = document.getElementById('estado');
  var ciudadInput = document.getElementById('ciudad');

  // Crear un nuevo objeto Autocomplete de Google Places para cada campo
  var autocompleteDireccion = new google.maps.places.Autocomplete(direccionInput, {
    types: ['address'],
    componentRestrictions: { country: 'MX' }
  });
  var autocompleteCiudad = new google.maps.places.Autocomplete(ciudadInput, {
    types: ['(cities)'],
    componentRestrictions: { country: 'MX' }
  });
  var autocompleteEstado = new google.maps.places.Autocomplete(estadoInput, {
    types: ['(regions)'],
    componentRestrictions: { country: 'MX' }
  });

  // Escuchar el evento de autocompletado de dirección seleccionada
  autocompleteDireccion.addListener('place_changed', function() {
    var place = autocompleteDireccion.getPlace();
    console.log(place); // Mostrar información del lugar en la consola
  });

  // Escuchar el evento de autocompletado de ciudad seleccionada
  autocompleteCiudad.addListener('place_changed', function() {
    var place = autocompleteCiudad.getPlace();
    console.log(place); // Mostrar información del lugar en la consola

    // Reiniciar el autocompletado de dirección para obtener solo calles de la ciudad seleccionada
    autocompleteDireccion.setTypes(['address']);
    autocompleteDireccion.setComponentRestrictions({ country: 'MX', locality: place.name });
  });

  // Escuchar el evento de autocompletado de estado seleccionado
  autocompleteEstado.addListener('place_changed', function() {
    var place = autocompleteEstado.getPlace();
    console.log(place); // Mostrar información del lugar en la consola

    // Obtener las coordenadas geográficas del estado seleccionado
    var lat = place.geometry.location.lat();
    var lng = place.geometry.location.lng();

    // Configurar el autocompletado de ciudad con las coordenadas y un radio de 50 km
    autocompleteCiudad.setBounds({
      north: lat + 0.45,
      south: lat - 0.45,
      east: lng + 0.45,
      west: lng - 0.45
    });
  });
});

</script>


    @endsection



