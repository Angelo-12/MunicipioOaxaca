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

        <a type="button"  class="btn btn-info" href="{{url('Agencia/descargar_excel')}}">
              <i class="fa fa-file-csv"></i></i>&nbsp;EXCEL
          </a>
      </div>
      <div class="card-body">
          <div class="form-group row">
              <div class="col-md-6">
                  <div class="input-group">

                      <input type="text"  class="form-control" placeholder="Texto a buscar" name="caja_busqueda_agencias" 
                      id="caja_busqueda_agencias">
                      <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                  </div>
              </div>
          </div>
          <table id="table" class="table table-bordered table-striped table-sm">
              <thead >
                  <tr >
                      <th >Id</th>
                      <th >Nombre agencia</th>
                      <th >Tipo agencia</th>
                      <th >Numero de colonias</th>
                      <th style="text-align: center">Opciones</th>
                  </tr>
                  {{ csrf_field() }}

              </thead>
              <tbody >
                  @foreach ($agencias as $a)
                  <tr class="post{{$a->id}}">
                      <td>{{$a->id}}</td>
                      <td >{{$a->nombre}}</td>
                      <td >{{$a->tipo_agencia}}</td>
                      <td >{{$a->total}}</td>
                      <td  align="center">
                          <button type="button" class="show-modal-agencia btn btn-warning btn-sm" 
                                  data-toggle="modal" 
                                  data-id="{{$a->id}}" 
                                  data-target="#show_zona"
                                  data-nombre_zona="{{$a->nombre_zona}}" 
                                  data-total="{{$a->total}}"
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

                            <button type="button" onclick="Colonias();"  class="btn btn-info">
                                <i class="fa fa-file-csv"></i></i>&nbsp;PDF
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

                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 15%" >Id</th>
                                        <th style="width: 20%">Colonia</th>
                                        <th style="width: 30%">Codigo Postal</th>
                                        <th style="width: 10%">Numero de Vendedores</th>
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