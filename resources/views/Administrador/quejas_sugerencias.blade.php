@extends('layouts.master2')

@section('content')
<div class="container-fluid center"> 

    <div class="card">
        <div class="card-header">
            <h1>
                Quejas y Sugerencias
            </h1>
        </div>
    </div>

    <div class="card">
        <div class="card-header">

            <a type="button" href="{{url('Observaciones/descargar_pdf')}}" class="btn btn-info">
                <i class="fa fa-file-pdf"></i>&nbsp;PDF
            </a>

            <a type="button" href="{{url('Observaciones/descargar_excel')}}" class="btn btn-info">
                <i class="fa fa-file-csv"></i></i>&nbsp;EXCEL
            </a>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="input-group">

                        <input type="text" id="caja_busqueda_observacion" class="form-control" placeholder="Texto a buscar">
                        <button type="submit" onclick="BuscarObservacion();" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </div>
            <table id="table" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr >
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Email</th>
                        <th>Motivo</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                    {{ csrf_field() }}

                </thead>
                <tbody>
                    @if ($observaciones->count()==0)
                        <tr>
                            <td colspan='7' align='center' >No hay registros</td>
                        </tr>
                    @else
                        @foreach ($observaciones as $o)
                        <tr class="post{{$o->id}}">
                            <td >{{$o->id}}</td>
                            <td >{{$o->nombre}}</td>
                            <td>{{$o->apellido_paterno}}</td>
                            <td>{{$o->email}}</td>
                            <td>{{$o->motivo}}</td>
                            <td>{{$o->fecha}}</td>
                            <td align="center">
                                <button type="button" class="responder-observacion btn btn-warning btn-sm" data-id="{{$o->id}}"
                                        data-nombre="{{$o->nombre}}" 
                                        data-apellido_paterno="{{$o->apellido_paterno}}"
                                        data-motivo="{{$o->motivo}}"
                                        data-email="{{$o->email}}"
                                        title="Responder">
                                        <i class="fa fa-inbox"></i>
                                </button>

                                <button type="button" class="detalles-observacion btn btn-secondary btn-sm"
                                    data-id="{{$o->id}}" 
                                    title='Detalles'>
                                    <i class="fa fa-info-circle"></i>
                                </button>

                            </td>
                        </tr>             
                        @endforeach        
                    @endif
                         
                </tbody>
            </table>
            {!! $observaciones->links() !!}
        </div>

    </div>

    <br>
    <br>

    <div id="show_observacion" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Revisando</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" name="formulario" id="formulario_observaciones">
                    @csrf   

                        <div class="form-group">
                            <b for="">Id</b>
                            <p id="id_observacion"/>
                        </div>
                        <div class="form-group">
                            <b for="">Nombre</b>
                            <p id="nombre_observacion"/>
                        </div>
                        <div class="form-group">
                            <b for="">Apellido Paterno </b>
                            <p id="apellido_observacion"/>
                        </div>
                        <div class="form-group">
                            <b for="">Email </b>
                            <p id="email_observacion"/>
                        </div>

                        <div class="form-group">
                            <b for="">Motivo </b>
                            <p id="motivo_observacion"/>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="responder_observacion" name="responder_observacion">
                            <label class="form-check-label" for="responder">Responder</label>
                        </div>

                        <div id="div_responder" style="display: none;">
                            <div class="form-group">
                                <b for="detalles">Respuesta </b>
                                <textarea class="form-control" id="respuesta_observacion" name="mensaje" placeholder="Responder" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <b>Status</b>
                                    <div class="radio status">
                                        <label>
                                        <input type="radio" name="radioStatus" id="revisar" value="Por Revisar">
                                        Por Revisar
                                        </label>
                                    </div>
                                    <div class="radio status">
                                        <label>
                                        <input type="radio"name="radioStatus" id="resulta" value="Resuelta">
                                        Resuelta
                                        </label>
                                    </div>
                            </div>

                        </div>

                    </form>
                </div>

                <div class="modal-footer" id="div_enviar" style="display: none">
                    <button class="btn btn-primary" type="submit" id="agregar_seguimiento_observacion">
                        Responder
                        <i class="fa fa-share-square"></i>
                    </button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">
                        Cerrar
                        <i class="fa fa-times-circle"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div id="show_detalles_observacion" class="modal fade" role="dialog">

            <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Quejas</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
                        </div>

                        <div class="modal-body" >

                            <div class="card-header">
                                <button type="button" onclick="DescargarPdfObservacion();"  class="btn btn-info">
                                    <i class="fa fa-file-pdf"></i>&nbsp;PDF
                                </button>
                    
                                <button type="button" onclick="DescargarExcelObservacionesVendedores();" class="btn btn-info">
                                    <i class="fa fa-file-csv"></i></i>&nbsp;EXCEL
                                </button>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                    
                                            <input type="text" id="caja_busqueda_observacion_vendedor" class="form-control" placeholder="Texto a buscar">
                                        </div>
                                    </div>
                                </div>

                                <table  class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr >
                                            <th style="width: 10%;" >Id</th>
                                            <th style="width: 35%;">Mensaje</th>
                                            <th style="width: 30%;">Status</th>
                                            <th style="width: 25%; text-align:center;" >Opciones</th>
                                        </tr>
                                        {{ csrf_field() }}
                    
                                    </thead>
                                </table>

                                <div class="ajustar" style="overflow-y: auto">

                                    <input type="text" id="id_observacion2" name="id_observacion2" hidden>

                                    <table id="table_observacion_vendedor" class="table table-bordered table-striped table-sm">
                                        <tbody >                   
                                        </tbody>
                                    </table>

                                </div>
                            
                            </div>
                        </div>
                         
                        <div class="modal-footer">       
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
<br>

@endsection