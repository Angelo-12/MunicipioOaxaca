@extends('layouts.master')

@section('content')


<div class="container-fluid center">
      <div class="card">
        <div class="card-header">
            <h1>
              Zonas
              de Comercialización
            </h1>
        </div>
        <div class="card-body">
        
          <div class="row">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box azul">
                    <div class="inner verde" >
                      <h3>150</h3>
  
                      <p>PERMITIDA</p>
                    </div>
                    <div class="icon azul">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="detalle_zona/1" id="permitida" class="small-box-footer">Mas Informacion <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green azul">
                    <div class="inner amarillo">
                      <h3>53<sup style="font-size: 20px">%</sup></h3>
  
                      <p>REGISTRINGIDA</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="detalle_zona/2" class="small-box-footer">Mas Informacion <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow azul">
                    <div class="inner rojo">
                      <h3>44</h3>
  
                      <p>PROHIBIDA</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="detalle_zona/3" class="small-box-footer">Mas Informacion<i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red azul">
                    <div class="inner gris">
                      <h3>65</h3>
  
                      <p>SIN ZONA</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="detalle_zona/4" class="small-box-footer">Mas Informacion<i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
        </div>
      </div>

</div>
        
  <div class="container-fluid">
    <!-- Ejemplo de tabla Listado -->
    <div class="card">
        <div class="card-header">
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
                    <button type="button"  class="show-modal-zona btn btn-warning btn-sm" data-toggle="modal" data-id="{{$z->id}}" data-target="#show_zona">
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
              <input type="text" id="id_zona_update" name="id_zona">
            </div>
             
            <div id="map" style="height:300px;"></div> 
          </div>
      </div>
  </div>
</div>

 


@endsection










