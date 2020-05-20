@extends('layouts.master')

@section('content')
<div class="centrado" id="onload">
    <div class="lds-dual-ring"></div>
</div>
<div class="container-fluid center" hidden> 
    <div class="card">
        <div class="card-header">
            <h1>
                Permisos
            </h1>
        </div>
    </div>

    <div class="card">
        <div class="card-header">

            <a class="create-modal btn btn-secondary">
                <i class="fa fa-plus"></i>&nbsp;Nuevo
            </a>
            <button type="button"  class="btn btn-info">
                <i class="fa fa-file-pdf"></i>&nbsp;PDF
            </button>

            <button type="button"  class="btn btn-info">
                <i class="fa fa-file-csv"></i></i>&nbsp;CSV
            </button>
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
                        <th>N° Cuenta</th>
                        <th>Expediente</th>
                        <th>Tipo de actividad</th>
                        <th>Giro</th>
                        <th>Fecha de Registro</th>
                        <th>Status</th>
                        <th>Opciones</th>
                    </tr>
                    {{ csrf_field() }}
                    
                </thead>
                <tbody>
                
                  @foreach ($permisos as $p)
                  <tr class="post{{$p->id}}" id="{{$p->id}}">
                    <td>{{$p->numero_cuenta}}</td>
                    <td>{{$p->numero_expediente}}</td>
                    <td>{{$p->tipo_actividad}}</td>
                    <td>{{$p->giro}}</td>
                    <td>{{$p->created_at}}</td>
                    
                    
                    <td>@if($p->status==1)
                        <div class="switch">
                            <label>
                                Asignado
                            <input type="checkbox" checked readonly="readonly" onclick="javascript: return false;">
                            </label>
                          </div>
                        @else
                        <div class="switch">
                            <label>
                              Sin Asignar
                              <input type="checkbox" readonly onclick="javascript: return false;">
                            </label>
                          </div>
                        @endif</td>
                   
                    <td align="center">
                      <button type="button" class="show-modal-permiso btn btn-warning btn-sm" data-id="{{$p->id}}"
                        data-numero_cuenta="{{$p->numero_cuente}}"
                        data-numero_expediente="{{$p->numero_expediente}}"
                        data-tipo_actividad="{{$p->tipo_actividad}}"
                        data-giro="{{$p->giro}}"
                        data-dias_laborados="{{$p->dias_laborados}}"
                        data-hora_inicio="{{$p->hora_inicio}}"
                        data-hora_fin="{{$p->hora_fin}}">
                          <i class="fa fa-eye"></i>
                      </button>
        
                      <button type="button" class="btn btn-danger btn-sm" data-id="{{$p->id}}">
                          <i class="fa fa-pencil-alt"></i>
                      </button>
                     
                      <button type="button" class="btn btn-info btn-sm" data-id="{{$p->id}}">
                          <i class="fa fa-eraser"></i>
                      </button>
                    
                  </td>
                </tr>             
                  @endforeach                   
                </tbody>
            </table>
            {!! $permisos->links() !!}
        </div>

    </div> 

    <div class="modal fade" id="create_permiso" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <label>Municipio</label>
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
    

    {{-- Modal show  --}}
<div id="show_permiso" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Permiso</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Id:</label>
                    <p id="id"/>
                </div>

                <div id="map" style="height:100px;"></div> 

                <div class="form-group">
                    <label for="">N° Cuenta:</label>
                    <p id="numero_cuenta_show"/>
                </div>
                <div class="form-group">
                    <label for="">N° Expediente:</label>
                    <p id="numero_expendiente_show"/>
                </div>
                <div class="form-group">
                    <label for="">Tipo de Actividad:</label>
                    <p id="actividad_show"/>
                </div>
                <div class="form-group">
                    <label for="">Giro:</label>
                    <p id="giro_show"/>
                </div>
                <div class="form-group">
                    <label for="">Dias Laborales:</label>
                    <p id="laborales_show"/>
                </div>
                <div class="form-group">
                    <label for="">Hora Inicio:</label>
                    <p id="inicio_show"/>
                </div>
                <div class="form-group">
                    <label for="">Hora Fin:</label>
                    <p id="fin_show"/>
                </div>
               
            </div>
        </div>
    </div>
</div>

</div>

@endsection

