@extends('layouts.master2')

@section('content')
<div class="page-header">
    <h1 class="all-tittles">Bienvenido {{Auth::user()->name}}</h1>
</div>
<div class="container emp-profile">
   
    <form class="form-horizontal" role="form" method="POST" name="formulario" 
        action="{{url('Usuarios/cambiar_foto/'.$user->id)}}" id="formulario_asignar" enctype="multipart/form-data">
            {{ csrf_field() }}  
   
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{asset('img/')}}/{{Auth::user()->foto_perfil}}" id="image" alt=""/>
                    <div class="file btn btn-lg btn-primary">
                        Cambiar Foto
                        <input type="file" name="imagen" id="file" accept="image/*" value="{{$user->foto_perfil}}"/>
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
                                        <button class="btn btn-success" type="submit">Guardar</button>
                                    </div>
                                </div>

                            </form>   
                           

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->email}}</p>
                                    </div>
                                </div>

                                @foreach ($rol as $r)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Cargo</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$r['cargo']}}</p>
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Fecha de registro</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->created_at}}</p>
                                    </div>
                                </div>
                                @endforeach

                                <div class="row">
                                   
                                        <div class="col-md-6">
                                            <label>Cambiar contraseña</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control">
                                        </div>
                                   
                                </div>

                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label>Confirmar contraseña</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>

                                    <br>
                                    <br>

                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <button class="btn btn-success">Actualizar</button>
                                        </div>
                                    </div>
                                      
                                </div> 
                               
                              
                    </div>
                </div>
            </div>
        </div>
</div>


   
@endsection
