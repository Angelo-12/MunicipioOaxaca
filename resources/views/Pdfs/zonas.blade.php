<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

            <div id="table_data">
                <table class="table table-striped">
                    <thead >
                  <tr>
                      <th style="background:#C10E62;">Id</th>
                      <th style="background:#C10E62;">Nombre Zona</th>
                      <th style="background:#C10E62;">Total de vendedores</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($zonas as $z)
                <tr >
                  <td >{{$z->id}}</td>
                  <td >{{$z->nombre}}</td>
                  <td>{{$z->total}}</td>
                  
              </tr>             
                @endforeach                   
              </tbody>
            </table>
         </div>
            