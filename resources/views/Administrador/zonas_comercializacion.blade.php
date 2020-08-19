@extends('layouts.master2')

@section('content')
        
  <div class="container-fluid">
    <!-- Ejemplo de tabla Listado -->
    <div class="card">
        <div class="card-header">
            <a type="button" href="{{url('Zonas/download/pdf')}}" class="btn btn-info">
              <i class="fa fa-file-pdf"></i>&nbsp;PDF
            </a>

            <button type="button"  class="btn btn-info">
                <i class="fa fa-file-csv"></i></i>&nbsp;EXCEL
            </button>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="input-group">
                       
                        <input type="text"  class="form-control" id="caja_busqueda_zona" placeholder="Texto a buscar">
                        <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </div>

            <div id="table_data">
              <table class="table table-bordered table-striped table-sm">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Nombre Zona</th>
                      <th>Total de vendedores</th>
                      <th>Opciones</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($zonas as $z)
                <tr >
                  <td >{{$z->id}}</td>
                  <td >{{$z->nombre}}</td>
                  <td>{{$z->total}}</td>
                  <td align="center">
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-id="{{$z->id}}" data-target="#show_zona">
                      <i class="fa fa-eye"></i>
                    </button>
                   
                    <button type="button" class="btn btn-danger btn-sm" >
                            <i class="fa fa-pencil-alt"></i>
                    </button>
                  
                </td>
              </tr>             
                @endforeach                   
              </tbody>
            </table>
         </div>

            
        </div>
    </div>
  </div>

  {{-- Modal show  --}}
<div id="show_zona" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
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


@endsection










