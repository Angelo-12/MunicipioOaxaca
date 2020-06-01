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
                        
            <button type="button" class="create-modal-permiso btn btn-secondary" data-toggle="modal" data-target="#create_permiso">
                <i class="fa fa-plus"></i>&nbsp;Nuevo
            </button>
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
                      <button type="button" class="show-modal-permiso btn btn-warning btn-sm" data-toggle="modal" data-target="#show_permiso"
                        data-id="{{$p->id}}"
                        data-numero_cuenta="{{$p->numero_cuenta}}"
                        data-numero_expediente="{{$p->numero_expediente}}"
                        data-tipo_actividad="{{$p->tipo_actividad}}"
                        data-giro="{{$p->giro}}"
                        data-dias_laborados="{{$p->dias_laborados}}"
                        data-hora_inicio="{{$p->hora_inicio}}"
                        data-hora_fin="{{$p->hora_fin}}"
                        data-latitud="{{$p->latitud}}"
                        data-longitud="{{$p->longitud}}">
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form" name="formulario">
                        @csrf
                        <div class="form-group">
                            <label>Numero de cuenta</label>
                            <input  type="text" name="numero_cuenta" placeholder="Numero de cuenta"
                                    class="form-control" id="numero_cuenta">
                            <span class="text-danger" id="numero_cuenta_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Numero de expediente</label>
                            <input type="text" name="numero_expediente" placeholder="Numero de expediente"
                                   class="form-control" id="numero_expediente">
                            <span class="text-danger" id="numero_expediente_error"></span>

                        </div>

                        <div class="form-group">
                            <label>Tipo de actividad</label>
                            <select class="form-control" name="tipo_actividad" id="tipo_actividad">
                                <option value="ninguna" selected disabled>Seleccionar Actividad</option>
                                <option value="Comercial Movil">Comercial Movil</option>
                                <option value="Comercial Semifija">Comercial Semifija</option>
                                <option value="Comercial Movil Con Equipo Rodante">Comercial Movil Con Equipo Rodante</option>
                                <option value="Comercial Fija">Comercial Fija</option>
                                <option value="Comercio Establecido">Comercio Establecido</option>
                                <option value="Tianguis">Tianguis</option>
                                <option value="Prestacion de Servicios">Prestacion de Servicios</option>
                            </select>
                            <span class="text-danger" id="tipo_actividad_error"></span>

                        </div>

                        <div class="form-group">
                            <label for="sexo">Giro</label>
                            <input type="text" name="giro" placeholder="Giro"
                            class="form-control" id="giro">
                            <span class="text-danger" id="giro_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Seleccione la ubicacion del permiso</label>
                            <div id="map" style="height:200px;"></div> 
                        </div>
                        
                        <pre id="coordinates" class="coordinates"></pre>

                        <div class="form-group">
                            <label>Dias Laborados</label>
                            <div class="checkbox" id="checkbox">
                                <label>
                                    <input type="checkbox"> Lunes
                                </label>
                                <label>
                                    <input type="checkbox"> Martes
                                </label>
                                <label>
                                    <input type="checkbox"> Miercoles
                                </label>
                                <label>
                                    <input type="checkbox"> Jueves
                                </label>
                                <label>
                                    <input type="checkbox"> Viernes
                                </label>
                                <label>
                                    <input type="checkbox"> Sabado
                                </label>
                                <label>
                                    <input type="checkbox"> Domingo
                                </label>
                                <label>
                                    <input type="checkbox" id="seleccionar-todos"> Seleccionar Todos
                                </label>
                              </div>
                        </div>

                        <div class="form-group">
                            <label>Hora de Inicio</label>
                           
                                <input type="text" class="form-control clockpicker" data-placement="right" data-align="top"
                                data-autoclose="true" readonly="">
                                
                            
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

                <div class="form-group">
                    <div id="map" style="height:200px;"></div> 
                </div>

                <div class="form-group">
                    <label for="">N° Cuenta:</label>
                    <p id="numero_cuenta_show"/>
                </div>
                <div class="form-group">
                    <label for="">N° Expediente:</label>
                    <p id="numero_expediente_show"/>
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

