@extends('layouts.master2')

@section('content')
<div class="page-header">
    <h1 class="all-tittles">Bienvenido {{Auth::user()->name}}</h1>
</div>
<div class="container emp-profile">
   
        <div class="row">
            <div class="col-md-4">

            
                <div class="profile-img">
                    <img src="{{asset('img/')}}/{{Auth::user()->foto_perfil}}" id="image" alt=""/>
                    <div class="file btn btn-lg btn-primary">
                        Cambiar Foto
                        <input type="file" name="imagen" id="file" accept="image/*"/>
                    </div>
                </div>

            
            
            </div>

            <script>
                document.getElementById("file").onchange = function(e) {
                // Creamos el objeto de la clase FileReader
                    let reader = new FileReader();

                    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
                    reader.readAsDataURL(e.target.files[0]);

                    // Le decimos que cuando este listo ejecute el código interno
                    reader.onload = function(){
                        let preview = document.getElementById('preview'),
                        image = document.getElementById('image');

                        image.src = reader.result;

                        image.innerHTML = '';
                    };
                }
            </script>


            <div class="col-md-6">
                <div class="profile-head">
                            <h5>
                                {{Auth::user()->name}}
                            </h5>
                            
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Datos Personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Datos de la Cuenta</a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="row">
            
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->id}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nombre</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Apellido Paterno</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$user->apellido_paterno}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Apellido Materno</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->apellido_materno}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Edad</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$edad}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Sexo</label>
                                    </div>
                                    <div class="col-md-6">
                                        @if (Auth::user()->sexo=='H')
                                             <p>Hombre</p>
                                        @else
                                        <p>Mujer</p>
                                        @endif
                                       
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-6">
                                    </div>
                                </div>
                           

                    </div>
                    
                </div>
            </div>
        </div>
</div>

<form class="form-horizontal" role="form" method="POST" name="formulario" 
action="{{route('cambiar_foto')}}" id="formulario_asignar" enctype="multipart/form-data">
    {{ csrf_field() }}  
    <label for="jeje">Hola</label>                  
    <input type="text" id="id_permiso" name="id_permiso" >
    <br>
    <button class="btn btn-success" type="submit">Guardar</button>
</form>
@endsection
