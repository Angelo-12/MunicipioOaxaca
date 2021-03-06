@extends('layouts.master2')

@section('content')

<div class="container-fluid center"> 

    <div class="card">
        <div class="card-header">
            <h1>
               Actividades Comerciales
            </h1>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a type="button" href="{{url('Actividades/descargar_pdf')}}" class="btn btn-info">
                <i class="fa fa-file-pdf"></i>&nbsp;PDF
            </a>

            <a type="button" onclick="MensajeConfirmacion();" href="{{url('Actividades/descargar_excel')}}" class="btn btn-info">
                <i class="fa fa-file-csv"></i></i>&nbsp;EXCEL
            </a>

            <a type="button" onclick="MostrarActividades();" class="btn btn-info" title="Actividades Comerciales">
                <i class="fa fa-list"></i></i>&nbsp;
            </a>

        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="input-group">

                        <input type="text"   class="form-control" placeholder="Texto a buscar" id="caja_busqueda_actividades">
                        <button type="submit" onclick="BuscarActividadComercial();" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </div>
            <table id="table_actividades" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr >
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Total de vendedores</th>
                        <th style="text-align: center">Opciones</th>
                    </tr>
                    {{ csrf_field() }}

                </thead>
                <tbody>
                    @if ($actividades->count()==0)
                        <tr>
                            <td colspan='5' align='center' >No hay registros</td>
                        </tr>
                    @else
                    
                    @foreach ($actividades as $a)
                   
                    <tr class="post{{$a->id}}">
                        <td >{{$a->id}}</td>
                        <td >{{$a->nombre_actividad}}</td>
                        <td >{{$a->total}}</td>
                        <td align="center">
                            <button type="button" class="show-modal-actividad btn btn-warning btn-sm" data-id="{{$a->id}}"
                                    data-nombre_actividad="{{$a->nombre_actividad}}" 
                                    data-total="{{$a->total}}"
                                    title="Mostrar">
                                <i class="fa fa-eye"></i>
                            </button>

                            <button type="button" class="detalles-actividad btn btn-secondary btn-sm" data-id="{{$a->id}}" title="Detalles">
                                <i class="fa fa-info-circle"></i>
                            </button>
                        </td>
                    </tr>             
                    @endforeach  
                    @endif                        
                </tbody>
            </table>
         
        </div>

    </div>

    <div id="show_actividad" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Actividad Comercial</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
                    </div>

                    <div class="modal-body" >
                        <div class="form-group">
                            <label for="">Id :</label>
                            <b id="id"/>
                        </div>
                        <div class="form-group">
                            <label for="">Nombre de la actividad :</label>
                            <b  id="actividad_show"/>
                        </div>
                        <div class="form-group">
                            <label for="">Numero de vendedores :</label>
                            <b id="numero_vendedores_show"/>
                        </div>
                   
                      
                    </div>
        
                        
                    <div class="modal-footer">
                        
                    </div>
                </div>
                        
        </div>
    </div>

    <div id="show_detalles_actividad" class="modal fade" role="dialog">

        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Vendedores</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
                    </div>

                    <div class="modal-body" >
                        
                        <div class="card-header">
                            <button type="button" onclick="ActividadesComercialesVendedor();"  class="btn btn-info">
                                <i class="fa fa-file-pdf"></i>&nbsp;PDF
                            </button>
                
                            <button type="button" onclick="DescargarExcelActividadesVendedor();" class="btn btn-info">
                                <i class="fa fa-file-csv"></i></i>&nbsp;EXCEL
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="input-group">
                
                                        <input type="text" class="form-control" placeholder="Texto a buscar" id="caja_busqueda_actividad_vendedor">
                                    </div>
                                </div>
                            </div>

                            <table  class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr >
                                        <th style="width: 10%;" >Id</th>
                                        <th style="width: 20%;">RFC</th>
                                        <th style="width: 30%;">Curp</th>
                                        <th style="width: 15%;">Permiso</th>
                                        <th style="width: 25%; text-align:center;" >Opciones</th>
                                    </tr>
                                    {{ csrf_field() }}
                
                                </thead>
                            </table>

                            <div class="ajustar" style="overflow-y: auto">
                                <input type="text" id="id_actividad_comercial" name="id_actividad_comercial" hidden>


                                <table id="table_actividad_vendedor" class="table table-bordered table-striped table-sm">
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

    <div id="show_actividad_vendedor" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detalles Vendedor</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nombre :</label>
                        <p id="nombre_show"/>
                    </div>
                    <div class="form-group">
                        <label for="">Apellido Paterno :</label>
                        <p id="apellido_paterno_show"/>
                    </div>
    
                    <div class="form-group">
                        <label for="">Apellido Materno :</label>
                        <p id="apellido_materno_show"/>
                    </div>
    
                    <div class="form-group">
                        <label for="">Sexo :</label>
                        <p id="sexo_show"/>
                    </div>
    
                    <div class="form-group">
                        <label for="">Fecha de Registro :</label>
                        <p id="fecha_show"/>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <div id="show_actividades" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Actividades Comerciales</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
                </div>

                <div class="modal-body" >

                    <div class="card-header">
                    <a type="button" href="{{url('Actividades/descargar_actividades')}}" class="btn btn-info">
                            <i class="fa fa-file-pdf"></i>&nbsp;PDF
                    </a>
            
                        <a type="button" href="{{url('Actividades/descargar_excel_actividades')}}" onclick="MensajeConfirmacion();" class="btn btn-info">
                            <i class="fa fa-file-csv"></i></i>&nbsp;EXCEL
                        </a>
                    </div>

                    <div class="card-body">

                        <table  class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr >
                                    <th >Id</th>
                                    <th >Nombre de la actividad</th>
                                </tr>
                                {{ csrf_field() }}
            
                            </thead>
                        </table>


                        <div class="ajustar" style="overflow-y: auto">

                            <table id="table_actividades_comerciales" class="table table-bordered table-striped table-sm">
                            
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


@endsection