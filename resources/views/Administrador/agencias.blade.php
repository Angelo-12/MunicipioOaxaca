@extends('layouts.master2')

@section('content')



<div class="container-fluid">

    <div class="card">
      <div class="card-header">
          <h1>
            Agencias y colonias
          </h1>
      </div>
    </div>

    <div class="card">

      <div class="card-header">

          <a type="button"  class="btn btn-info" href="{{url('Agencia/descargar_pdf')}}">
              <i class="fa fa-file-pdf"></i>&nbsp;PDF
          </a>

        <a type="button" onclick="MensajeConfirmacion();" class="btn btn-info" href="{{url('Agencia/descargar_excel')}}">
              <i class="fa fa-file-csv"></i></i>&nbsp;EXCEL
          </a>
      </div>
      <div class="card-body">
          <div class="form-group row">
              <div class="col-md-6">
                  <div class="input-group">

                      <input type="text"  class="form-control" placeholder="Texto a buscar" name="caja_busqueda_agencias" 
                      id="caja_busqueda_agencias">
                      <button type="button"  onclick="BuscarAgencia();"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                  </div>
              </div>
          </div>
          <table id="table_agencias" class="table table-bordered table-striped table-sm">
              <thead >
                  <tr >
                      <th >Id</th>
                      <th >Nombre agencia</th>
                      <th >Tipo agencia</th>
                      <th >Número de colonias</th>
                      <th style="text-align: center">Opciones</th>
                  </tr>
                  {{ csrf_field() }}

              </thead>
              <tbody >
                  @if ($agencias->count()==0)
                      <tr>
                        <td colspan='5' align='center' >No hay registros</td>
                      </tr>
                  @else
                    @foreach ($agencias as $a)
                    <tr class="post{{$a->id}}">
                        <td>{{$a->id}}</td>
                        <td >{{$a->nombre}}</td>
                        <td >{{$a->tipo_agencia}}</td>
                        <td >{{$a->total}}</td>
                        <td  align="center">
                            <button type="button" class="show-modal-agencia btn btn-warning btn-sm" 
                                    data-toggle="modal" 
                                    data-target="#show_agencia"
                                    data-id="{{$a->id}}" 
                                    data-nombre="{{$a->nombre}}" 
                                    data-tipo="{{$a->tipo_agencia}}"
                                    data-total="{{$a->total}}"
                                    data-longitud="{{$a->longitud_centro}}"
                                    data-latitud="{{$a->latitud_centro}}"
                                    title='Mostrar'>
                                <i class="fa fa-eye"></i>
                            </button>

                            <button type="button" class="detalles-agencia btn btn-secondary btn-sm"
                            data-id="{{$a->id}}" 
                            title='Detalles'>
                                <i class="fa fa-info-circle"></i>
                            </button>

                        </td>
                    </tr>             
                    @endforeach 
                  @endif                  
              </tbody>
          </table>
          {!! $agencias->links() !!}
      </div>

    </div>

    <div id="show_detalles" class="modal fade" role="dialog">

        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Colonias</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
                    </div>

                    <div class="modal-body" >

                        <div class="card-header">

                            <button type="button" onclick="DescargarPdfColonias();"  class="btn btn-info">
                                <i class="fa fa-file-csv"></i></i>&nbsp;PDF
                            </button>
                
                            <button type="button" onclick="DescargarExcelColonias();" class="btn btn-info">
                                <i class="fa fa-file-csv"></i></i>&nbsp;EXCEL
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="input-group">
                
                                        <input type="text" id="caja_busqueda_colonias"  class="form-control" placeholder="Texto a buscar">
                                    </div>
                                </div>
                            </div>

                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10%" >Id</th>
                                        <th style="width: 20%">Colonia</th>
                                        <th style="width: 30%">Código Postal</th>
                                        <th style="width: 15%">Vendedores</th>
                                        <th style="width: 25%" style="text-align: center">Opciones</th>
                                    </tr>
                                    {{ csrf_field() }}
                
                                </thead>
                            </table> 
                           
                            <div class="ajustar" style="overflow-y: auto">

                                <input type="text" id="id_agencia" name="id_agencia" hidden>

                                <table id="table_colonias" class="table table-bordered table-striped table-sm">
                        
                                    <tbody >
                                                        
                                    </tbody>
                                </table>

                            </div>
                        
                        </div>
                    </div>
    
                </div>
                        
        </div>

    </div>

    <div id="show_agencia" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agencia</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <b for="">Id :</b>
                        <p id="id_ag"/>
                    </div>
                    <div class="form-group">
                        <b for="">Nombre :</b>
                        <p id="nombre_agencia"/>
                    </div>
                    <div class="form-group">
                        <b for="">Tipo :</b>
                        <p id="tipo_agencia"/>
                    </div>

                    <div class="form-group">
                        <b for="">Ubicación :</b>
                        <div id="map_agencia" style="height:200px;">

                        </div>
                    </div>

                    <div class="form-group">
                        <b for="">Número de colonias :</b>
                        <p id="total_colonias"/>
                    </div>

                   

                </div>
            </div>
        </div>
    </div>

    <div id="show_colonia" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Colonia</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Colonia :</label>
                        <b id="nombre_show"/>
                    </div>

                    <div class="form-group">
                        <div id="map_colonia" style="height:200px;"></div> 
                    </div>

                    <div class="form-group">
                        <label for="">Código Postal :</label>
                        <b id="codigo_show"/>
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
<br>
<br>



@endsection