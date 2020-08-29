@extends('layouts.master2')

@section('content')

<div class="container-fluid center"> 
    <div class="card">
        <div class="card-header">
            <h1>
                Vendedores
            </h1>
        </div>
    </div>

    <div class="card">
        <div class="card-header">

            <button class="create-modal-vendedor btn btn-secondary" data-total="{{$permisos->count()}}">
                <i class="fa fa-plus"></i>&nbsp;Nuevo
            </button>
            <a type="button" href="{{url('Vendedores/descargar_pdf')}}" class="btn btn-info">
                <i class="fa fa-file-pdf"></i>&nbsp;PDF
            </a>

            <a href="{{url('Vendedores/descargar_excel')}}" type="button"  class="btn btn-info">
                <i class="fa fa-file-csv"></i></i>&nbsp;EXCEL
            </a>
        </div>

        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="input-group">
                       
                        <input type="text"  class="form-control" placeholder="Texto a buscar">
                        <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
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
                        <th>Correo Electronico</th>
                        <th>Status</th>
                        <th>Opciones</th>
                    </tr>
                    {{ csrf_field() }}
                    
                </thead>
                <tbody>
                    @if($vendedores->count()==0)
                        <tr>
                            <td colspan='5' align='center' >No hay registros</td>
                        </tr>
                    @else
                        @foreach ($vendedores as $u)
                            <tr class="post{{$u->id}}" id="{{$u->id}}">
                                <td>{{$u->id}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->apellido_paterno}}</td>
                                <td>{{$u->apellido_materno}}</td>
                                <td>{{$u->email}}</td>
                                    
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
                                            <button type="button" class="show-modal-vendedor btn btn-warning btn-sm" data-id="{{$u->id}}"
                                                data-nombre="{{$u->name}}" 
                                                data-apellido_paterno="{{$u->apellido_paterno}}"
                                                data-apellido_materno="{{$u->apellido_materno}}"
                                                data-cargo="Vendedor"
                                                data-email="{{$u->email}}"
                                                data-estado="{{$u->status}}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                
                                            <button type="button" class="edit-modal-vendedor btn btn-danger btn-sm" data-id="{{$u->id}}"
                                                data-nombre="{{$u->name}}" 
                                                data-apellido_paterno="{{$u->apellido_paterno}}"
                                                data-apellido_materno="{{$u->apellido_materno}}"
                                                data-cargo="Administrador"
                                                data-status="{{$u->status}}"
                                                data-email="{{$u->email}}">

                                                <i class="fa fa-pencil-alt"></i>
                                            </button>
                                            
                                            @if ($u->status==1)
                                                <button type="button" class="delete-modal-vendedor btn btn-info btn-sm" data-id="{{$u->id}}">
                                                    <i class="fa fa-eraser"></i>
                                                </button>
                                            @else
                                                <button type="button" class="delete-modal-vendedor btn btn-info btn-sm" data-id="{{$u->id}}" disabled>
                                                    <i class="fa fa-eraser" ></i>
                                                </button>      
                                            @endif
                                            
                                    </td>
                            </tr>             
                        @endforeach  
                    @endif                 
                </tbody>
            </table>
            {!! $vendedores->links() !!}
        </div>

    </div> 

    <div class="modal fade" id="create_vendedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Vendedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        @csrf
                        

                        <div id="paso1">
                            <b for="">Paso 1/2</b>
                            <div class="progress form-group">
                                <div class="progress-bar bg-success" role="progressbar"  
                                style="width: 50%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input  type="text" name="nombre" placeholder="Nombre"
                                        class="form-control" id="name">
                                <span class="text-danger" id="name_error">El campo nombre es obligatorio</span>
                            </div>
    
                            <div class="form-group">
                                <label>Apellido Paterno</label>
                                <input type="text" name="apellido_paterno" placeholder="Apellido Paterno"
                                       class="form-control" id="apellido_paterno">
                                <span class="text-danger" id="apellido_paterno_error">El campo apellido paterno es obligatorio</span>
    
                            </div>
    
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input  type="text" name="apellido_materno" placeholder="Apellido Materno"
                                        class="form-control" id="apellido_materno">
                                <span class="text-danger" id="apellido_materno_error">El campo apellido materno es obligatorio</span>
    
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
                                <label>Estado</label>
                                <select name="estado" id="estado" class="form-control">
                                 <option value="" selected disabled>Seleccione su estado</option>
                                        @foreach ($estado as $e)
                                            <option value="{{$e->id_estado}}">{{$e->nombre}}</option>
                                        @endforeach
                                </select>
                                <span class="text-danger" id="estado_error"></span>
                            </div>
    
                            <div class="form-group">
                                <label>Municipio</label>
                                <select name="id_municipio" id="id_municipio" class="form-control">
                                    <option value="" selected disabled>Seleccione su municipio</option>
    
                                </select>
                                <span class="text-danger" id="id_municipio_error"></span>
                            </div>
    
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                <span class="text-danger" id="email_error">El campo email ya se encuentra</span>
                            </div>
    
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input  type="password" name="password" class="form-control" id="password" placeholder="Password">
                                <span class="text-danger" id="password_error"></span>
                            </div>
    

                        </div>

                        <div id="paso2" style="display:none;">
                            <b for="">Paso 2/2</b>
                            <div class="progress form-group">
                                <div class="progress-bar bg-success form-control" role="progressbar" 
                                style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="form-group">
                                <label>RFC</label>
                                <input  type="text" name="rfc" placeholder="RFC (Opcional)"
                                        class="form-control" id="rfc">
                                <span class="text-danger" id="rfc_error">El campo RFC es requerido</span>
                            </div>
    
                            <div class="form-group">
                                <label>CURP</label>
                                <input type="text" name="curp" placeholder="CURP"
                                       class="form-control" id="curp">
                                <span class="text-danger" id="curp_error">El campo CURP es requerido</span>
    
                            </div>
    
                            <div class="form-group">
                                <label for="sexo">Seleccione la Organizacion</label>
                                <select class="form-control" name="id_organizacion" id="id_organizacion">
                                    <option value="" selected disabled>Seleccionar organizacion</option>
                                    @foreach ($organizaciones as $o)
                                        <option value="{{$o->id}}">{{$o->nombre_organizacion}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="id_organizacion_error">Debe Seleccionar una organizacion</span>
                            </div>
    
                            <div class="form-group">
                                <label>Seleccione el permiso</label>
                                <select name="id_permiso" id="id_permiso" class="form-control">
                                 <option value="" selected disabled>Seleccione el permiso</option>
                                        @foreach ($permisos as $p)
                                            <option value="{{$p->id}}">{{$p->numero_cuenta}}</option>
                                        @endforeach
                                </select>
                                <span class="text-danger" id="id_permiso_error"></span>
                            </div>
    
                            <div id="datos_permiso" style="display:none;">
                                <div class="form-group">
                                    <label>Giro</label>
                                    <input class="form-control red-border" id="giro_permiso" type="text" name="giro_permiso" readonly></input> 
                                    <span class="text-danger" id="giro_error"></span>
                                </div>
    
                                <div class="form-group">
                                    <label >Actividad</label>
                                    <input class="form-control" type="text" name="actividad_permiso" id="actividad_permiso" readonly>
                                </div>
    
                                <div class="form-group">
                                    <label>Id Usuario</label>
                                    <input  type="text" name="id_usuario" placeholder="id"
                                            class="form-control" id="id_usuario" readonly>
                                    <span class="text-danger" id="id_usuario_error"></span>
                                </div>
        
    
                            </div>
                        </div>
                        

                    </form>
                </div>

                <div class="modal-footer">

                    <div id="siguiente">
                        <button class="btn btn-secondary" type="button" id="btn_siguiente">
                            Siguiente
                            <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>

                    <div id="guardar" style="display: none;">
                        <button class="btn btn-secondary" type="button" id="btn_anterior">
                            Anterior
                            <i class="fa fa-arrow-circle-left"></i>
                        </button>

                        <button class="btn btn-primary" type="submit" id="agregar_vendedor">
                            Guardar
                            <i class="fa fa-save"></i>
                        </button>
                    </div>  
                   
                </div>
            </div>
        </div>
    </div>  

    {{-- Modal show  --}}
    <div id="show_vendedor" class="modal fade" role="dialog">
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
                        <b for="">Cargo:</b>
                        <p id="cargo_show"/>
                    </div>
                    <div class="form-group">
                        <b for="">Status:</b>
                        <p id="status_show"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="update_vendedor" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar vendedor</h5>
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
                        </div>
                        
                        <div class="form-group">
                            <b for="">Apellido Paterno:</b>
                            <input  class="form-control"  type="text" name="paterno2" id="paterno"/>
                        </div>
                        <div class="form-group">
                            <b for="">Apellido Materno:</b>
                            <input  class="form-control"  type="text" name="materno22" id="materno"/>
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
                                  <input type="radio" name="radioStatusVendedor" id="activo" value="1">
                                  Activo
                                </label>
                            </div>
                            <div class="radio tipo">
                                <label>
                                  <input type="radio" name="radioStatusVendedor" id="inactivo" value="0">
                                  Inactivo
                                </label>
                            </div>
                        </div>
                        
                    </form>

                   
                </div>

                <div class="modal-footer">
                    <button class="actualizar-vendedor btn btn-primary" type="submit" id="update_vendedor">
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

    <div id="delete_vendedor" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar vendedor</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form">
                        @csrf

                        <input type="text" name="id_delete_vendedor" id="id_delete_vendedor" hidden>

                        <div class="deleteContent">
                            ¿Esta seguro que desea eliminar este vendedor? <span class="title"></span>
                        
                        </div>
                       
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary eliminar_vendedor" type="submit" id="eliminar_vendedor">
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
<br>

@endsection

