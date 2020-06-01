mapboxgl.accessToken = 'pk.eyJ1IjoidG9sZWRvMTYiLCJhIjoiY2s4eGRsYWNmMHBmbzNrcGpqYmtocng2biJ9.3EUpV8hXK0x-KVMH5NvAcA';

function cargarMapa(id){
    var latitud;
    var longitud;
    if(id==1){
         longitud=new Array(-96.726492,-96.727066,-96.724223,-96.723628,-96.726492);
         latitud=new Array(17.062283,17.059519,17.058909,17.061703,17.062283);
        var color='#F8AAE4';
    }else if(id==3){
        longitud=new Array(-96.728258,-96.729599,-96.723864,-96.722434,-96.728258);
        latitud=new Array(17.063595,17.057061, 17.056046,17.062432,17.063595);
        var color='#8495E8';
        
    }else if(id==3){

    }
    //mapboxgl.accessToken = 'pk.eyJ1IjoidG9sZWRvMTYiLCJhIjoiY2s4eGRsYWNmMHBmbzNrcGpqYmtocng2biJ9.3EUpV8hXK0x-KVMH5NvAcA';
    //var longitud=new Array(-96.726492,-96.727066,-96.724223,-96.723628,-96.726492);
    //var latitud=new Array(17.062283,17.059519,17.058909,17.061703,17.062283);

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
        'fill-color': color,
        'fill-opacity': 0.8
        }
        });
        });

    map.resize();

}

function agregarMarcador(latitud,longitud){
    //mapboxgl.accessToken = 'pk.eyJ1IjoidG9sZWRvMTYiLCJhIjoiY2s4eGRsYWNmMHBmbzNrcGpqYmtocng2biJ9.3EUpV8hXK0x-KVMH5NvAcA';
        var map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
            center: [longitud,latitud], // starting position [lng, lat]
            zoom: 16 // starting zoom

        });

        var marker = new mapboxgl.Marker()
        .setLngLat([longitud,latitud])
        .addTo(map);
        map.addControl(new mapboxgl.NavigationControl());
        map.addControl(new mapboxgl.FullscreenControl());

}

function agregarPosicion(){
    var coordinates = document.getElementById('coordinates');
    var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [-96.7257924,17.0608691],
    zoom: 12
    });
    
    var marker = new mapboxgl.Marker({
    draggable: true
    })
    .setLngLat([-96.7257924,17.0608691])
    .addTo(map);
    map.addControl(new mapboxgl.NavigationControl());
    map.addControl(new mapboxgl.FullscreenControl());
    
    /*var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        marker:{
            draggable:true
            //onDragEnd:onDragEnd
        },
        mapboxgl: mapboxgl
    });
    map.addControl(geocoder);*/

    function onDragEnd() {
        var lngLat = marker.getLngLat();
        coordinates.style.display = 'block';
        coordinates.innerHTML =
        'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
    }

    marker.on('dragend', onDragEnd);
}

function selectall(form)  {  
 var formulario = eval(form)  
 for (var i=0, len=formulario.elements.length; i<len ; i++)  
  {  
    if ( formulario.elements[i].type == "checkbox" )  
      formulario.elements[i].checked = formulario.elements[0].checked  
  }  
}  

