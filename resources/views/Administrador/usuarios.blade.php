@extends('layouts.master2')

@section('content')

<div class="container-fluid center"> 
    <div class="card">
        <div class="card-header">
            <h1>
                Administradores
               
            </h1>
        </div>
    </div>

    <div class="card">
        <div class="card-header">

            <a class="create-modal btn btn-secondary">
                <i class="fa fa-plus"></i>&nbsp;Nuevo
            </a>
            <a type="button" class="btn btn-info" href="{{url('Usuarios/descargar_pdf')}}">
                <i class="fa fa-file-pdf"></i>&nbsp;PDF
            </a>

            <a type="button" onclick="MensajeConfirmacion();" href="{{url('Usuarios/descargar_excel')}}" class="btn btn-info">
                    <i class="fa fa-file-csv"></i></i>&nbsp;EXCEL
                </a>
            </div>

        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="input-group">
                       
                        <input type="text" id="caja_busqueda_usuario" class="form-control" placeholder="Texto a buscar">
                        <button type="submit" onclick="BuscarUsuario();" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </div>
            <table id="table" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Correo Electrónico</th>
                        <th>Cargo</th>
                        <th>Status</th>
                        <th>Opciones</th>
                    </tr>
                    {{ csrf_field() }}
                    
                </thead>
                <tbody>
                    @if($usuarios->count()==0)
                        <tr>
                            <td colspan='7' align='center' >No hay registros</td>
                        </tr>
                    @else
                        @foreach ($usuarios as $u)
                            <tr class="post{{$u->id}}" id="{{$u->id}}">
                                <td>{{$u->id}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->apellido_paterno}}</td>
                                <td>{{$u->apellido_materno}}</td>
                                <td>{{$u->email}}</td>
                                <td>
                                    {{$u->cargo}}
                                    
                                </td>
                                    
                                <td>@if($u->status==1)
                                        <div class="switch">
                                            <label>
                                            Activo
                                            <input type="checkbox" checked readonly="readonly" onclick="javascript: return false;">
                                            </label>
                                        </div>
                                    @else
                                        <div class="switch">
                                            <label>
                                            Inactivo
                                            <input type="checkbox" readonly onclick="javascript: return false;">
                                            </label>
                                        </div>
                                    @endif</td>
                            
                                <td align="center">
                                    <button type="button" class="show-modal-usuario btn btn-warning btn-sm" data-id="{{$u->id}}"
                                        data-nombre="{{$u->name}}" 
                                        data-apellido_paterno="{{$u->apellido_paterno}}"
                                        data-apellido_materno="{{$u->apellido_materno}}"
                                        data-email="{{$u->email}}"
                                        data-status="{{$u->status}}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                        
                                    @foreach ($rol as $r)
                                       @if ($r['cargo']=='Administrador')
                                            <button type="button" class="edit-modal-usuario btn btn-danger btn-sm" data-id="{{$u->id}}"
                                                data-nombre="{{$u->name}}" 
                                                data-apellido_paterno="{{$u->apellido_paterno}}"
                                                data-apellido_materno="{{$u->apellido_materno}}"
                                                data-cargo="Administrador"
                                                data-status="{{$u->status}}"
                                                data-email="{{$u->email}}">

                                                <i class="fa fa-pencil-alt"></i>
                                            </button>


                                            @if($u->id!=Auth::user()->id)

                                                @if ($u->status==1)
                                                    <button type="button" class="delete-modal-usuario btn btn-info btn-sm" data-id="{{$u->id}}">
                                                        <i class="fa fa-eraser"></i>
                                                    </button>
                                                @else
                                                    <button type="button" class="delete-modal-usuario btn btn-info btn-sm" data-id="{{$u->id}}" disabled>
                                                        <i class="fa fa-eraser" ></i>
                                                    </button>      
                                                @endif
                                            @else
                                                <button type="button" class="delete-modal-usuario btn btn-info btn-sm" data-id="{{$u->id}}" disabled>
                                                    <i class="fa fa-eraser" ></i>
                                                </button>    
                                            @endif    
                                       @else
                                           
                                       @endif
                                    @endforeach
                                    
                                </td>
                            </tr>             
                        @endforeach 
                    @endif    
                                 
                </tbody>
            </table>
            {!! $usuarios->links() !!}
        </div>

    </div> 

    <div class="modal fade" id="create_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <input  type="text" name="nombre" placeholder="Nombre"
                                    class="form-control" id="name">
                            <span class="text-danger" id="name_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" placeholder="Apellido Paterno"
                                   class="form-control" id="apellido_paterno">
                            <span class="text-danger" id="apellido_paterno_error"></span>

                        </div>

                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input  type="text" name="apellido_materno" placeholder="Apellido Materno"
                                    class="form-control" id="apellido_materno">
                            <span class="text-danger" id="apellido_materno_error"></span>

                        </div>

                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select class="form-control" name="sexo" id="sexo">
                                <option value="" selected disabled>Seleccionar sexo</option>
                                <option value="H">Hombre</option>
                                <option value="M">Mujer</option>
                            </select>
                            <span class="text-danger" id="sexo_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="text" class="form-control fj-date" id="fecha_nacimiento" 
                            placeholder="yyyy/mm/dd" name="fecha_nacimiento">
                            <span class="text-danger" id="fecha_nacimiento_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Entidad de nacimiento</label>
                            <select name="estado" id="estado" class="form-control">
                             <option value="" selected disabled>Seleccione su estado</option>
                                    @foreach ($estado as $e)
                                        <option value="{{$e->id_estado}}">{{$e->nombre}}</option>
                                    @endforeach
                            </select>
                            <span class="text-danger" id="estado_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Municipio de nacimiento</label>
                            <select name="id_municipio" id="id_municipio" class="form-control">
                                <option value="" selected disabled>Seleccione su municipio</option>
                            </select>
                            <span class="text-danger" id="id_municipio_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                            <span class="text-danger" id="email_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input  type="password" name="password" class="form-control" id="password" placeholder="Password">
                            <span class="text-danger" id="password_error"></span>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" id="agregar_usuario">
                        Guardar
                        <i class="fa fa-save"></i>
                    </button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">
                        Cerrar
                        <i class="fa fa-times-circle"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>  
    
    <div id="role_usuario" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Asignar rol</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="">Id</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="text" name="id_usuario" id="id_usuario" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="">Seleccionar rol</label>
                            <select name="cargo" id="cargo" class="form-control">
                                <option value="" selected disabled>Seleccione un rol</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Secretaria">Secretari@</option>
                               </select>
                        </div>
                    </form>

                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" id="asignar_rol">
                            Agregar
                            <i class="fa fa-save"></i>
                        </button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">
                            Cerrar
                            <i class="fa fa-times-circle"></i>
                        </button>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    {{-- Modal show  --}}
    <div id="show_usuario" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <b for="">Id:</b>
                        <p id="id"/>
                    </div>
                    <div class="form-group">
                        <b for="">Nombre:</b>
                        <p id="nombre_usuario_show"/>
                    </div>
                    
                    <div class="form-group">
                        <b for="">Apellido Paterno:</b>
                        <p id="paterno_show"/>
                    </div>
                    <div class="form-group">
                        <b for="">Apellido Materno:</b>
                        <p id="materno_show"/>
                    </div>
                    <div class="form-group">
                        <b for="">Email:</b>
                        <p id="email_show"/>
                    </div>
                    <div class="form-group">
                        <b for="">Status:</b>
                        <p id="status_show"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="update_usuario" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form">
                        @csrf

                        <div class="form-group">
                            <b for="">Id:</b>
                            <input class="form-control" type="text" readonly id="id2" name="id2"/>
                        </div>
                        <div class="form-group">
                            <b for="">Nombre:</b>
                            <input class="form-control" type="text" id="nombre" name="nombre2"/>
                            <span class="text-danger" id="name_error"></span>
                        </div>
                        
                        <div class="form-group">
                            <b for="">Apellido Paterno:</b>
                            <input  class="form-control"  type="text" name="paterno2" id="paterno"/>
                            <span class="text-danger" id="apellido_paterno_error"></span>
                        </div>
                        <div class="form-group">
                            <b for="">Apellido Materno:</b>
                            <input  class="form-control"  type="text" name="materno22" id="materno"/>
                            <span class="text-danger" id="apellido_materno_error"></span>
                        </div>
                        <div class="form-group">
                            <b for="">Email:</b>
                            <input  class="form-control" type="email" name="email2" id="email2"/>
                        </div>
                        <div class="form-group">
                            <b for="">Cargo:</b>
                            <input  class="form-control" readonly type="text" name="cargo" id="cargo2"/>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <div class="radio tipo">
                                <label>
                                  <input type="radio" name="radioStatus" id="activo" value="1">
                                  Activo
                                </label>
                            </div>
                            <div class="radio tipo">
                                <label>
                                  <input type="radio" name="radioStatus" id="inactivo" value="0">
                                  Inactivo
                                </label>
                            </div>
                        </div>
                        
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="actualizar-usuario btn btn-primary" type="submit" id="update_usuario">
                        Actualizar
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">
                        Cerrar
                        <i class="fa fa-times-circle"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div id="delete_usuario" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form">
                        @csrf

                        <input type="text" name="id_delete_usuario" id="id_delete_usuario" hidden>

                        <div class="deleteContent">
                            ¿Está seguro que desea eliminar este usuario? <span class="title"></span>
                        
                        </div>
                       
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary eliminar_usuario" type="submit" id="eliminar_usuario">
                        Eliminar
                        <i class="far fa-trash-alt"></i>
                    </button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        Cerrar
                        <i class="fa fa-times-circle"></i>
                    </button>
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
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

@endsection






