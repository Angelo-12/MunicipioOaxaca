@extends('layouts.master')

@section('content')
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
          <label>Nombre de la organizacion</label>
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