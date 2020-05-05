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
                      <button type="button"  class="btn btn-warning btn-sm">
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