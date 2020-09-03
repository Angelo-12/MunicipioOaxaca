@extends('layouts.master2')

@section('content')
    <div class="page-header">
        <h1 class="all-tittles">Bienvenido {{Auth::user()->name}}</h1>
    </div>
    
    <div class="container emp-profile">
          <form class="form-horizontal" action="{{url('Usuarios/actualizar_datos')}}" 
                            method="post" enctype="multipart/form-data">
       
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
                        <div class="tab-pane fade show active"  id="home" role="tabpanel" aria-labelledby="home-tab">

                            @csrf
                                <div class=" form-group row">
                                        <div class="form-control col-md-6">
                                            <label>Id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="id" class="form-control" value="{{Auth::user()->id}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-control col-md-6">
                                            <label>Nombre</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-control col-md-6">
                                            <label>Apellido Paterno</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="apellido_paterno" value="{{$user->apellido_paterno}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-control col-md-6">
                                            <label>Apellido Materno</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" name="apellido_materno" type="text" value="{{Auth::user()->apellido_materno}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="form-control col-md-6">
                                            <label>Contraseña</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>

                                        <div class="col-md-1">
                                            <a id="mostrar_password" title="Mostrar" class="mostrar_password form-control btn btn-primary btn-sm" >
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="form-control col-md-6">
                                            <label>Edad</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value="{{$edad}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="form-control col-md-6">
                                            <label>Sexo</label>
                                        </div>
                                        <div class="col-md-6">

                                            @if (Auth::user()->sexo=='H')
                                                <input type="text" class="form-control" readonly value="Hombre"> 
                                            @else
                                                <input type="text" class="form-control" readonly value="Mujer"> 
                                            @endif
                                        
                                        </div>
                                    </div>

                                    <div class="form-group row" style="text-align: center;">
                                        <div class="form-control col-md-6" style="display: none;">
                                           
                                        </div>
                                        <div class="col-md-6">
                                            <button class="form-control btn btn-success" type="submit">Guardar</button>
                                        </div>
                                    </div>

                             
                            </form>
                                   

                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="form-group row">
                                        <div class="form-control col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" readonly class="form-control" value="{{Auth::user()->email}}">
                                        </div>
                                    </div>

                                    @foreach ($rol as $r)
                                    <div class="form-group row">
                                        <div class="form-control col-md-6">
                                            <label>Cargo</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" value="{{$r['cargo']}}" readonly>
                                        </div>
                                    </div> 

                                    <div class="form-group row">
                                        <div class="form-control col-md-6">
                                            <label>Fecha de registro</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value="{{Auth::user()->created_at}}">
                                        </div>
                                    </div>
                                    @endforeach

                                    <br>
                                    <br>

                                    </div> 
                                
                                
                        </div>
                    </div>
                </div>
            </div>
    </div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

   
@endsection
