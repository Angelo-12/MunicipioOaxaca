mapboxgl.accessToken = 'pk.eyJ1IjoidG9sZWRvMTYiLCJhIjoiY2s4eGRsYWNmMHBmbzNrcGpqYmtocng2biJ9.3EUpV8hXK0x-KVMH5NvAcA';
var longitud=new Array(-96.726492,-96.727066,-96.724223,-96.723628,-96.726492);
var latitud=new Array(17.062283,17.059519,17.058909,17.061703,17.062283);

var map = new mapboxgl.Map({
container: 'map', // container id
style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
center: [-96.7257924,17.0608691], // starting position [lng, lat]
zoom: 16 // starting zoom


});

map.addControl(new mapboxgl.NavigationControl());
map.addControl(new mapboxgl.FullscreenControl());

map.on('load', function() {
    map.addSource('maine', {
    'type': 'geojson',
    'data': {
    'type': 'Feature',
    'geometry': {
    'type': 'Polygon',
    'coordinates': [
    [
        
        [longitud[0],latitud[0]],
        [longitud[1],latitud[1]],
        [longitud[2],latitud[2]],
        [longitud[3],latitud[3]],
        [longitud[4],latitud[4]]
        //[-96.723615,17.061707],
        //[-96.723835,17.060774],
        //[-96.722852,17.060563],
        //[-96.722643,17.061518],
        //[-96.723615,17.061707]
       /*[-96.726492,17.062283],
       [-96.727066,17.059519],
       [-96.724223,17.058909],
       [-96.723628,17.061703],
       [-96.726492,17.062283]*/

    ]
    ]
    }
    }
    });
    map.addLayer({
    'id': 'maine',
    'type': 'fill',
    'source': 'maine',
    'layout': {},
    'paint': {
    'fill-color': '#ff0080',
    'fill-opacity': 0.8
    }
    });
    });
