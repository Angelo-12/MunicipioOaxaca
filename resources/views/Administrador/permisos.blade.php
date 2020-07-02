@extends('layouts.master2')

@section('content')

<div class="centrado" id="carga">
    <div class="lds-dual-ring"></div>
</div>

<div class="container-fluid center hidden"> 
    <div class="card">
        <div class="card-header">
            <h1>
                Permisos   {{$nombre}}
            </h1>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
                
            @if (!($nombre=="Sancionados"||$nombre=="Cancelados"
            ||$nombre=="Revalidados"||$nombre=="Anuales"||$nombre=="Eventuales"||$nombre=="Provisionales"))
            <button type="button" class="create-modal-permiso btn btn-secondary" 
            data-toggle="modal" data-target="#create_permiso">
                <i class="fa fa-plus"></i>&nbsp;Nuevo
            </button> 
            @endif
           

            <a type="button" href="{{url('Permisos/download/pdf/'.$nombre)}}" class="btn btn-info">
                <i class="fa fa-file-pdf"></i>&nbsp;PDF
              </a>

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
                        @if ($nombre=="Pendientes")
                            <th>Tipo</th>
                        @endif
                        <th>Fecha de Registro</th>
                        <th>Status</th>
                        <th>Opciones</th>
                    </tr>
                    {{ csrf_field() }}
                    
                </thead>
                <tbody>
                
                  @foreach ($permisos as $p )
                  <tr class="post{{$p->id}}" id="{{$p->id}}">
                    <td>{{$p->numero_cuenta}}</td>
                    <td>{{$p->numero_expediente}}</td>
                    <td>{{$p->tipo_actividad}}</td>
                    <td>{{$p->giro}}</td>

                    @if ($nombre=="Pendientes")
                    <td>
                        Pendiente
                        <button type="button" class="tipo-permiso btn btn-success btn-sm" data-toggle="modal"
                            data-target="#asignar_tipo_permiso" data-id-permiso="{{$p->id}}" >
                            <i class="fas fa-cog"></i>
                        </button>

                    </td> 
                    @endif
                   
                    <td>{{$p->created_at}}</td>
                    
                    <td>@if($p->asignado==1)
                        <div class="switch">
                            <label>
                                Asignado
                            <input type="checkbox" checked readonly="readonly" onclick="javascript: return false;">
                            </label>
                          </div>
                        @else
                        <div class="switch">
                            <label>
                              Pendiente
                              <input type="checkbox" readonly onclick="javascript: return false;">
                            </label>
                          </div>
                        @endif</td>
                   
                    <td align="center">
                      <button type="button" title="Mostrar" class="show-modal-permiso btn btn-warning btn-sm" data-toggle="modal" data-target="#show_permiso"
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
        
                      <button type="button" title="Editar" class="btn btn-danger btn-sm" data-id="{{$p->id}}">
                          <i class="fa fa-pencil-alt"></i>
                      </button>

                      @if (!($nombre=="Cancelados"||$nombre=="Sancionados"||$nombre=="Revalidados"||$p->asignado==0))
                        <button type="button" title="Reevalidar" class="asignar-reevalidacion btn btn-success btn-sm" data-id="{{$p->id}}">
                            <i class="fas fa-hand-point-right"></i>
                        </button>
                        
                        <button type="button" title="Sancionar" class="asignar-sancion btn btn-secondary btn-sm" data-id="{{$p->id}}">
                            <i class="fa fa-ban"></i>
                        </button>

                        <button type="button" title="Cancelar" class="asignar-cancelacion btn btn-info btn-sm" data-id="{{$p->id}}">
                            <i class="fa fa-eraser"></i>
                        </button> 
                            
                      @endif
                          
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
                    <form class="form-horizontal" role="form" name="formulario" id="formulario">
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
                                <option value="1">Comercial Movil</option>
                                <option value="2">Comercial Semifija</option>
                                <option value="3">Comercial Movil Con Equipo Rodante</option>
                                <option value="4">Comercial Fija</option>
                                <option value="5">Comercio Establecido</option>
                                <option value="6">Tianguis</option>
                                <option value="7">Prestacion de Servicios</option>
                            </select>
                            <span class="text-danger" id="tipo_actividad_error"></span>

                        </div>

                        <div class="form-group">
                            <label for="Giro">Giro</label>
                            <input type="text" name="giro" placeholder="Giro"
                            class="form-control" id="giro">
                            <span class="text-danger" id="giro_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Seleccione la ubicacion del permiso</label>
                            <div id="map" style="height:200px;"></div> 
                        </div>
                       
                        <div class="form-group" hidden>
                            <label >Latitud</label>
                            <input  class="form-control" type="text" name="latitud" id="latitud" value="17.063483">
                        </div>

                        <div class="form-group" hidden>
                            <label >Longitud</label>
                            <input class="form-control" type="text" name="longitud" id="longitud" value="-96.729649">
                        </div>

                        <div class="form-group">
                            <label>Dias Laborados</label>
                            <div class="checkbox" name="dias_laborados" id="checkbox">
                                <label>
                                    <input type="checkbox" name="dias[]" value="Lunes"> Lunes
                                </label>
                                <label>
                                    <input type="checkbox" name="dias[]" value="Martes"> Martes
                                </label>
                                <label>
                                    <input type="checkbox" name="dias[]" value="Miercoles"> Miercoles
                                </label>
                                <label>
                                    <input type="checkbox" name="dias[]" value="Jueves"> Jueves
                                </label>
                                <label>
                                    <input type="checkbox" name="dias[]" value="Viernes"> Viernes
                                </label>
                                <label>
                                    <input type="checkbox" name="dias[]" value="Sabado"> Sabado
                                </label>
                                <label>
                                    <input type="checkbox" name="dias[]" value="Domingo"> Domingo
                                </label>
                                <label>
                                    <input type="checkbox" id="seleccionar-todos"> Seleccionar Todos
                                </label>
                              </div>
                              <span class="text-danger" id="dias_laborados_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Hora de Inicio</label>
                            <input type="text" class="form-control clockpicker" data-placement="right" data-align="top"
                            data-autoclose="true" readonly="" name="hora_inicio">
                            <span class="text-danger" id="hora_inicio_error"></span>    
                        </div>
                          
                        <div class="form-group">
                            <label>Hora de Fin</label>
                            <input type="text" class="form-control clockpicker" data-placement="right" data-align="top"
                            data-autoclose="true" readonly="" name="hora_fin">  
                            <span class="text-danger" id="hora_fin_error"></span>   
                        </div>

                        <div class="form-group">
                            <label for="detalles">Detalles</label>
                            <textarea class="form-control" id="detalles" name="detalles" placeholder="Detalles" rows="3"></textarea>
                            <span class="text-danger" id="detalles_error"></span>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" id="agregar_permiso">
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
                        <div id="map2" style="height:200px;"></div> 
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

    <div id="asignar_tipo_permiso" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tipo de Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form" name="formulario" id="formulario_asignar">
                        @csrf                        
                        <input type="text" id="id_permiso" name="id_permiso" hidden>

                        <div class="form-group">
                            <label>Seleccione el tipo de permiso</label>
                            <div class="radio tipo">
                                <label>
                                  <input type="radio" name="radioTipo" id="Anual" value="Anual">
                                  Anual
                                </label>
                            </div>
                            <div class="radio tipo">
                                <label>
                                  <input type="radio" name="radioTipo" id="Eventual" value="Eventual">
                                  Eventual
                                </label>
                            </div>
                            <div class="radio tipo">
                                <label>
                                  <input type="radio" name="radioTipo" id="Provisional" value="Provisional">
                                  Provisional
                                </label>
                            </div>

                            <div id="div1" style="display:none;">
                                <div class="form-group">
                                    <label>Largo  <span class="valueSpan"></span></label>
                                    <input  type="range" name="largo" id="largo" class="form-control" 
                                    min="0.5" max="6" step="0.5" value="1">
                                   
                                    <span class="text-danger" id="largo_error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Ancho <span class="valueSpan2"></span></label>
                                    <input  type="range" name="ancho" id="ancho" class="form-control" 
                                    min="0.5" max="6" step="0.5" value="1">
                                    <span class="text-danger" id="ancho_error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Utensilios</label>
                                    <div id="utensilios">
                                        <div class="utensilios" name="utensilios" id="checkbox">
                                            <label>
                                            <input type="checkbox" name="utensilios[]" value="Cubiertos"> Cubiertos
                                            </label>
                                            <label>
                                                <input type="checkbox" name="utensilios[]" value="Mostrador"> Mostrador
                                            </label>
                                            <label>
                                                <input type="checkbox" name="utensilios[]" value="Sillas"> Sillas
                                            </label>
                                            <label>
                                                <input type="checkbox" name="utensilios[]" value="Mesas"> Mesas
                                            </label>
                                            <label>
                                                <input type="checkbox" name="utensilios[]" value="Material Desechable"> Material Desechable
                                            </label>
                                            <label>
                                                <input type="checkbox" name="utensilios[]" value="Estructura"> Estructura
                                            </label>
                                            <label>
                                                <input type="checkbox" onchange="javascript:opcionOtra()" id="otra" value> Otra
                                            </label>
                                    </div>
                                    
                                    <span class="text-danger" id="utensilios_error"></span>
                                </div>
                                <div id="div4" style="display:none;">
                                    <input  type="text" name="otraOpcion" placeholder="Escriba el utensilio"
                                    class="form-control" id="otro">
                                    <span class="text-danger" id="otra_error"></span>
                                </div>
                                   
                                </div>
                            </div>

                            <div id="div2" style="display:none;">
                                <div class="form-group">
                                    <label>Seleccione la ubicacion de termino</label>
                                    <div id="map3" style="height:200px;"></div> 
                                </div>

                                <div class="form-group">
                                    <label hidden>Latitud</label>
                                    <input hidden class="form-control" type="text" name="latitudFin" id="latitudfin"  value="17.063483">
                                </div>
        
                                <div class="form-group" hidden>
                                    <label hidden>Longitud</label>
                                    <input hidden class="form-control" type="text" name="longitudFin" id="longitudfin" value="-96.729649">
                                </div>

                            </div>

                            <div id="div3" style="display:none;">
                                <div class="form-group {{$errors->has('fecha_vencimiento') ? 'has-error' : 'has-success' }}">
                                    <label for="fecha_nacimiento">Fecha de vencimiento</label>
                                    <input type="text" class="form-control fj-date-vencimiento" id="fecha_vencimiento" 
                                    placeholder="yyyy/mm/dd" name="fecha_vencimiento">
                                    <span class="text-danger" id="fecha_vencimiento_error"></span>
                                </div>
                            </div>

                        </div>
                        
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" id="agregar_tipo_permiso">
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

    <div id="asignar_sancion" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Sancion</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form" name="formulario" id="formulario_sancion">
                        @csrf                        
                        <input type="text" id="id_permiso_sancion" name="id_permiso_sancion" hidden>
                       

                        <div class="form-group">
                                <div class="form-group">
                                    <label>Monto $</label>
                                    <input type="text" name="multa" id="multa" class="form-control" 
                                    placeholder="Monto $">
                                   
                                    <span class="text-danger" id="multa_error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Motivo </label>
                                    <textarea class="form-control" id="motivo" name="motivo" placeholder="Motivo" rows="2"></textarea>
                                    <span class="text-danger" id="motivo_error"></span>
                                </div>
                        </div>    
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" id="agregar_sancion">
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
    </div>

    <div id="asignar_cancelacion" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cancelacion</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form" name="formulario_cancelacion" id="formulario_cancelacion">
                        @csrf                        
                        <input type="text" id="id_permiso_cancelacion" name="id_permiso_cancelacion" hidden>
                       

                        <div class="form-group">
                                <div class="form-group">
                                    <label>Motivo </label>
                                    <textarea class="form-control" id="motivo_cancelacion" name="motivo_cancelacion" placeholder="Motivo" rows="2"></textarea>
                                    <span class="text-danger" id="motivo_error">El campo motivo es obligatorio</span>
                                </div>

                                <div class="form-group">
                                    <label>Observaciones </label>
                                    <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Opcional" rows="2"></textarea>
                                    <span class="text-danger" id="observaciones_error"></span>
                                </div>
                        </div>    
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" id="agregar_cancelacion">
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
    </div>

    <div id="asignar_reevalidacion" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Reevalidacion</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form" name="formulario_reevalidacion" id="formulario_reevalidacion">
                        @csrf                        
                        <input name="id_revalidacion" id="id_revalidacion" hidden></inp>
                        <div class="form-group">
                                <div class="form-group">
                                   <label for="seguro">¿Esta seguro que desea revalidar el permiso con Id
                                    <b name="id_permiso_reevalidacion" id="id_permiso_reevalidacion"></b>
                                    ?
                                   </label>
                                </div>   

                                <div class="form-group">
                                    <label for="seguro">Monto</label>
                                    <input class="form-control" type="text" name="monto" id="monto" placeholder="">
                                    <span class="text-danger" id="monto_error">El campo monto es obligatorio</span>
                                 </div>   
                        </div>    
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" id="agregar_reevalidacion">
                            SI
                            <i class="fa fa-check"></i>
                        </button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">
                            NO
                            <i class="fa fa-times-circle"></i>
                        </button>
                    </div>
                    
                </div>

                
            </div>
        </div>
    </div>

</div>

@endsection

