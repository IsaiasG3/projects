let currentMap = 'map1';

const divContenido = document.getElementById("map");
const cambiarBoton = document.getElementById('cambiar');
const instructionsContainer = document.getElementById('instructions');
cambiarBoton.addEventListener('click', () => {
    if (currentMap === 'map1') {
        divContenido.innerHTML = "";
        cambiarBoton.innerHTML="";
        cambiarBoton.innerHTML="Ver en el mapa";

        mapa2();
      currentMap = 'map2';
    } else {
        divContenido.innerHTML = "";
        cambiarBoton.innerHTML="";
        cambiarBoton.innerHTML="Obtener Indicaciones";
        instructionsContainer.innerHTML="";
        const map3 = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-97.08764,20.45256],
            zoom: 17
          });
          map3.addControl(new mapboxgl.NavigationControl());

          const marker = new mapboxgl.Marker({
            color: '#963A3B'
          }).setLngLat([-97.08764,20.45256])
          .addTo(map3);
          currentMap = 'map1';
    }
  });

mapboxgl.accessToken = 'pk.eyJ1IjoiaXNhaWFzZzMiLCJhIjoiY2xlbmR6djMxMWRsZzN5cGJnend0Y3ljaCJ9.HnYA5XHFfeVI4YvUApShRQ';

    const map1 = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-97.08764,20.45256],
        zoom: 17
      });
      map1.addControl(new mapboxgl.NavigationControl());

      const marker = new mapboxgl.Marker({
        color: '#963A3B'
      }).setLngLat([-97.08764,20.45256])
      .addTo(map1);



function mapa2(){

    mapboxgl.accessToken = 'pk.eyJ1IjoiaXNhaWFzZzMiLCJhIjoiY2xlbmR6djMxMWRsZzN5cGJnend0Y3ljaCJ9.HnYA5XHFfeVI4YvUApShRQ';

    navigator.geolocation.getCurrentPosition(successLocation, errorLocation, { enableHighAccuracy: true });

    function successLocation(position) {
      // Coordenadas actuales del usuario
      const latitud = position.coords.latitude;
      const longitud = position.coords.longitude;

      mapboxgl.accessToken = 'pk.eyJ1IjoiaXNhaWFzZzMiLCJhIjoiY2xlbmR6djMxMWRsZzN5cGJnend0Y3ljaCJ9.HnYA5XHFfeVI4YvUApShRQ';
      const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [longitud, latitud],
        zoom: 15
      });
      map.addControl(new mapboxgl.NavigationControl());
      // Añadir listener para el evento "load" del mapa
      map.on('load', function() {

        // Añadir el control de indicaciones al mapa
        const directions = new MapboxDirections({
          accessToken: mapboxgl.accessToken,
          unit: 'metric',
          profile: 'mapbox/driving',
          controls: {
            instructions: false
          },
          markerColor: '#963A3B',
          language: 'es'


        });
        // Obtener las indicaciones de ruta y mostrarlas en un elemento HTML
    directions.on('route', function(event) {
        const steps = event.route[0].legs[0].steps;
        const instructionsContainer = document.getElementById('instructions');

        let stepsHTML = '<h3>Indicaciones:</h3><ol>';

        for (let i = 0; i < steps.length; i++) {
          stepsHTML += `<li>${steps[i].maneuver.instruction}</li>`;
        }

        stepsHTML += '</ol>';
        instructionsContainer.innerHTML = stepsHTML;
      });


        map.addControl(directions, 'top-left');

        // Añadir marcador para la ubicación actual del usuario
        const marker = new mapboxgl.Marker({
          color: "#963A3B"
        })
          .setLngLat([longitud, latitud])
          .addTo(map);

          const marker2 = new mapboxgl.Marker({
            color: "#963A3B"
          })
            .setLngLat([-97.08764,20.45256])
            .addTo(map);
        // Obtener indicaciones para llegar a las coordenadas dadas
        directions.setOrigin([longitud, latitud]);
        directions.setDestination([-97.08764,20.45256]);

        // Modificar el color de las indicaciones
        map.setPaintProperty('directions-route-line', 'line-color', '#963A3B');

      });

    }

    function errorLocation() {
      alert('No se pudo obtener su ubicación actual.');
    }
}





