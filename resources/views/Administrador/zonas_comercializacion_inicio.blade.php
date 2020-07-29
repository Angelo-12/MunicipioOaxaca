@extends('layouts.master2')

@section('content')

<div class="container-fluid">

    <div class="card">
      <div class="card-header">
          <h1>
              Zonas de comercializacion
          </h1>
      </div>
    </div>

    <div class="card">

      <div class="card-header">

          <a class="create-modal btn btn-secondary">
              <i class="fa fa-plus"></i>&nbsp;Nuevo
          </a>
          <a type="button"  class="btn btn-info" href="{{url('Zonas/descargar_pdf')}}">
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

                      <input type="text"  class="form-control" placeholder="Texto a buscar" name="caja_busqueda_zona" 
                      id="caja_busqueda_zona">
                      <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                  </div>
              </div>
          </div>
          <table id="table" class="table table-bordered table-striped table-sm">
              <thead >
                  <tr >
                      <th  >Id</th>
                      <th  >Nombre de la zona</th>
                      <th  >Total de vendedores</th>
                      <th style="text-align: center">Opciones</th>
                  </tr>
                  {{ csrf_field() }}

              </thead>
              <tbody >
                  @foreach ($zonas as $z)
                  <tr class="post{{$z->id}}">
                      <td>{{$z->id}}</td>
                      <td >{{$z->nombre}}</td>
                      <td >{{$z->total}}</td>
                      <td  align="center">
                          <button type="button" class="show-modal-zona btn btn-warning btn-sm" 
                                  data-toggle="modal" 
                                  data-id="{{$z->id}}" 
                                  data-target="#show_zona"
                                  data-nombre_zona="{{$z->nombre_zona}}" 
                                  data-total="{{$z->total}}"
                                  title='Mostrar'>
                              <i class="fa fa-eye"></i>
                          </button>

                          <button type="button" class="detalles-zona btn btn-secondary btn-sm"
                           data-id="{{$z->id}}" 
                           title='Detalles'>
                              <i class="fa fa-info-circle"></i>
                          </button>

                      </td>
                  </tr>             
                  @endforeach                   
              </tbody>
          </table>
         
      </div>

    </div>

      {{-- Modal show zona --}}
    <div id="show_zona" class="modal fade" role="dialog">
      <div  class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Zona</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>
              <div class="modal-body">

                <div class="form-group">
                  <input type="text" id="id_zona_update" name="id_zona" hidden>
                </div>
                
                <div id="map_zona" style="height:300px;"></div> 
              </div>
          </div>
      </div>
    </div>

    <div id="show_detalles" class="modal fade" role="dialog">

        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Vendedores</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
                    </div>

                    <div class="modal-body" >

                        <div class="card-header">
                            <a type="button" onclick="ZonaVendedor();"  class="btn btn-info">
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

                            <div class="ajustar" style="overflow-y: auto">

                                <input type="text" id="id_zona" name="id_zona" hidden>

                                <table id="table_zona_vendedor" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr >
                                            <th style="width: 15%" >Id</th>
                                            <th style="width: 20%">RFC</th>
                                            <th style="width: 30%">Curp</th>
                                            <th style="width: 10%">Permiso</th>
                                            <th style="width: 25%" style="text-align: center">Opciones</th>
                                        </tr>
                                        {{ csrf_field() }}
                    
                                    </thead>
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
    

@endsection
