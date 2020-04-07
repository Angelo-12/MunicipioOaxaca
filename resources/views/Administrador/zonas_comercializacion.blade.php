
@extends('layouts.master')

<style>
  .verde{
   background-color:#2EA71B; 
   color: white;
  }

  .amarillo{
    background-color:#E7EA26; 
    color: white;
  }

  .rojo{
    background-color:#D60A0A; 
    color: white;
  }

  .gris{
    background-color:#898686; 
    color: white;
  }

  .azul{
    background-color: #4CAEF1;
  }
</style>


@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/">Inicio</a></li>
</ol>

    
<h1>
    Zonas
    de Comercialización
  </h1>

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
        <a href="#" class="small-box-footer">Mas Informacion <i class="fa fa-arrow-circle-right"></i></a>
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
        <a href="#" class="small-box-footer">Mas Informacion <i class="fa fa-arrow-circle-right"></i></a>
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
        <a href="#" class="small-box-footer">Mas Informacion<i class="fa fa-arrow-circle-right"></i></a>
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
        <a href="#" class="small-box-footer">Mas Informacion<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

 
  <div class="container-fluid">
    <!-- Ejemplo de tabla Listado -->
    <div class="card">
        <div class="card-header">
           
            <button type="button"  class="btn btn-secondary" data-toggle="modal"  data-target="#exampleModal">
                <i class="fa fa-plus"></i>&nbsp;Nuevo
            </button>
             <button type="button"  class="btn btn-info">
                <i class="fa fa-file-pdf"></i>&nbsp;Reporte
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
                        <th>Id</th>
                        <th>Nombre Zona</th>
                        <th>Total de vendedores</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($zonas as $z)
                  <tr >
                    <td >{{$z->id_zona}}</td>
                    <td >{{$z->nombre}}</td>
                    <td>{{$z->id_zona}}</td>
                    <td align="center">
                      <button type="button"  class="btn btn-warning btn-sm">
                        <i class="fa fa-eye"></i>
                      </button>
                     
                          <button type="button" class="btn btn-danger btn-sm" >
                              <i class="fa fa-pencil-alt"></i>
                          </button>
                     
                          <button type="button" class="btn btn-info btn-sm" >
                              <i class="fa fa-eraser"></i>
                          </button>
                    
                  </td>
                </tr>             
                  @endforeach                   
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li class="page-item" >
                        <a class="page-link" href="#" >Ant</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" ></a>
                    </li>
                    <li class="page-item" >
                        <a class="page-link" href="#" >Sig</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    </div>
 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Zona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nombre de la zona</label>
          <input  type="text" name="nombre" placeholder="Nombre de la zona"
          class="form-control">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
            Cerrar
            <i class="fa fa-times-circle"></i>
        </button>
        <button type="button" id="agregar" class="btn btn-primary" value="Add">
            Guardar
            <i class="fa fa-save"></i>
        </button>
      </div>
    </div>
  </div>
</div>
@endsection









