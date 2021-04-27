mapboxgl.accessToken = 'pk.eyJ1IjoidG9sZWRvMTYiLCJhIjoiY2s4eGRsYWNmMHBmbzNrcGpqYmtocng2biJ9.3EUpV8hXK0x-KVMH5NvAcA';
 var bounds = [
        [-96.774702,17.031150],
        [-96.693678,17.132557]
];

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

    }else if(id==4){
        longitud=new Array(-96.731441,-96.730719,-96.733687,-96.731441);
        latitud=new Array(17.057917,17.061186,17.061151,17.057917);
        var color='#39ff14';
    }
  
    var map = new mapboxgl.Map({
        container: 'map_zona', // container id
        style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
        
        center: [-96.729649, 17.063483], // starting position [lng, lat]
        zoom: 16,// starting zoom,
        maxBounds:bounds
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

       var map = new mapboxgl.Map({
            container: 'map2', // container id
            style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
            center: [longitud,latitud], // starting position [lng, lat]
            zoom: 16, // starting zoom,
             maxBounds:bounds

        });

        var marker = new mapboxgl.Marker()
        .setLngLat([longitud,latitud])
        .addTo(map);
        map.addControl(new mapboxgl.NavigationControl());
        map.addControl(new mapboxgl.FullscreenControl());

        map.resize();

}

function agregarPosicion(){

    var coordinates = document.getElementById('coordinates');
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-96.729649, 17.063483],
        zoom: 12,
        maxBounds:bounds

    });
    
    var marker = new mapboxgl.Marker({
    draggable: true
    })
    .setLngLat([-96.729649, 17.063483])
    .addTo(map);
    map.addControl(new mapboxgl.NavigationControl());
    map.addControl(new mapboxgl.FullscreenControl());
    

    function onDragEnd() {
        var lngLat = marker.getLngLat();
        $("#latitud").val(lngLat.lat);
        $("#longitud").val(lngLat.lng);
    }

    marker.on('dragend', onDragEnd);
}

function mapaUbicacionFin(){
    var coordinates = document.getElementById('coordinates');
    var map = new mapboxgl.Map({
        container: 'map3',
        style: 'mapbox://styles/mapbox/streets-v11',
         center: [-96.729649, 17.063483],
        zoom: 12,
        maxBounds:bounds
    });
    
    var marker = new mapboxgl.Marker({
        draggable: true
        })
        .setLngLat([-96.729649, 17.063483])
        .addTo(map);
        map.addControl(new mapboxgl.NavigationControl());
        map.addControl(new mapboxgl.FullscreenControl());
        

    function onDragEnd() {
        var lngLat = marker.getLngLat();
        $("#latitudfin").val(lngLat.lat);
        $("#longitudfin").val(lngLat.lng);
    }

    marker.on('dragend', onDragEnd);

    map.resize();
}

function moverCamara(latitudN,longitudN,latitudS,longitudS,latitudC,longitudC){
    var dimensiones=[
        [longitudS,latitudS],
        [longitudN,latitudN]
   ];

    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
        center: [longitudC,latitudC], // starting position [lng, lat]
        zoom: 12 ,// starting zoom,
        maxBounds:dimensiones
    });

    map.addControl(new mapboxgl.NavigationControl());
    map.addControl(new mapboxgl.FullscreenControl());

    var marker = new mapboxgl.Marker({
        draggable: true
        })
        .setLngLat([longitudC, latitudC])
        .addTo(map);
        map.addControl(new mapboxgl.NavigationControl());
        map.addControl(new mapboxgl.FullscreenControl());
        
    
        function onDragEnd() {
            var lngLat = marker.getLngLat();
            $("#latitud").val(lngLat.lat);
            $("#longitud").val(lngLat.lng);
        }
    
        marker.on('dragend', onDragEnd);
}

function mostrarColonia(latitudN,longitudN,latitudS,longitudS,latitudC,longitudC){

   var dimensiones=[
        [longitudS,latitudS],
        [longitudN,latitudN]
   ];

    var map = new mapboxgl.Map({
        container: 'map_colonia',
        style: 'mapbox://styles/mapbox/streets-v11', 
        center: [longitudC,latitudC],
        zoom: 12 ,
        maxBounds:dimensiones
    });
 
    map.addControl(new mapboxgl.NavigationControl());
    map.addControl(new mapboxgl.FullscreenControl());

}

function mostrarAgencia(latitudC,longitudC){

     var map = new mapboxgl.Map({
         container: 'map_agencia',
         style: 'mapbox://styles/mapbox/streets-v11', 
         center: [longitudC,latitudC],
         zoom: 16
     });

     var marker = new mapboxgl.Marker()
    .setLngLat([longitudC, latitudC])
    .addTo(map);
  
     map.addControl(new mapboxgl.NavigationControl());
     map.addControl(new mapboxgl.FullscreenControl());
}

function actualizarPosicion(latitudN,longitudN,latitudS,longitudS,latitudC,longitudC){

    var dimensiones=[
         [longitudS,latitudS],
         [longitudN,latitudN]
    ];
 
     var map = new mapboxgl.Map({
         container: 'map_permiso',
         style: 'mapbox://styles/mapbox/streets-v11', 
         center: [longitudC,latitudC],
         zoom: 12 ,
         maxBounds:dimensiones
     });
  
     map.addControl(new mapboxgl.NavigationControl());
     map.addControl(new mapboxgl.FullscreenControl());
 
}

function mostrarPosicion(latitud,longitud){
    var map = new mapboxgl.Map({
        container: 'map_permiso',
        style: 'mapbox://styles/mapbox/streets-v11', 
        center: [longitud,latitud],
        zoom: 12 ,
        maxBounds:bounds
    });
 
    map.addControl(new mapboxgl.NavigationControl());
    map.addControl(new mapboxgl.FullscreenControl());

    var marker = new mapboxgl.Marker({
        draggable: true
        })
        .setLngLat([longitud, latitud])
        .addTo(map);
        map.addControl(new mapboxgl.NavigationControl());
        map.addControl(new mapboxgl.FullscreenControl());
        
    
        function onDragEnd() {
            var lngLat = marker.getLngLat();
            $("#latitud_permiso").val(lngLat.lat);
            $("#longitud_permiso").val(lngLat.lng);
        }
    
        marker.on('dragend', onDragEnd);
}

