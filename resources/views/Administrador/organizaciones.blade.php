<div class="container-fluid">
    <!-- Ejemplo de tabla Listado -->
    <div class="card">
      <div class="card-header">
        <h1>
          Organizaciones
        </h1>
      </div>
    </div>

    <div class="card">
        <div class="card-header">
           
            <a class="create-modal btn btn-secondary">
                <i class="fa fa-plus"></i>&nbsp;Nuevo
            </a>
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
            <table id="table" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre de la organizacion</th>
                        <th>Nombre del dirigente</th>
                        <th>Total de vendedores</th>
                        <th>Opciones</th>
                    </tr>
                    {{ csrf_field() }}
                    
                </thead>
                <tbody>
                  @foreach ($organizaciones as $o)
                  <tr >
                    <td >{{$o->id_organizacion}}</td>
                    <td >{{$o->nombre_organizacion}}</td>
                    <td>{{$o->nombre_dirigente}}</td>
                    <td>{{$o->id_organizacion}}</td>
                    <td align="center">
                      <button type="button" class="btn btn-warning btn-sm" data-id="{{$o->id_organizacion}}">
                          <i class="fa fa-eye"></i>
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-id="{{$o->id_organizacion}}">
                          <i class="fa fa-pencil-alt"></i>
                      </button>
                     
                      <button type="button" class="btn btn-info btn-sm" data-id="{{$o->id_organizacion}}">
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
 

{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Organizacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">

          <div class="form-group">
            <label>Nombre de la organizacion</label>
            <input  type="text" name="nombre_organizacion" id="nombre_organizacion" placeholder="Nombre de la organizacion"
            class="form-control">
         </div>
         <div class="form-group">
          <label>Nombre del dirigente</label>
          <input  type="text" name="nombre_dirigente" id="nombre_dirigente" placeholder="Nombre del dirigente"
          class="form-control">
       </div>
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit" id="agregando">
              <span class="glyphicon glyphicon-plus"></span>Guardar
            </button>
            <button class="btn btn-danger" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Cerrar
            </button>
          </div>
    </div>
  </div>
</div>

{{-- Modal Form Create Post --}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="">ID :</label>
                      <b id="id"/>
                    </div>
                    <div class="form-group">
                      <label for="">Nombre de la Organizacon </label>
                      <b id="nombre_organizacion"/>
                    </div>
                    <div class="form-group">
                      <label for="">Nombre del dirigente</label>
                      <b id="nombre_dirigente"/>
                    </div>
                    </div>
                    </div>
                  </div>
</div>

<script src="{{asset('js/funciones.js')}}"></script>

