<table id="table_zona" class="table table-bordered table-striped table-sm">
              <thead >
                  <tr >
                      <th  >Id zona</th>
                      <th  >Nombre de la zona</th>
                      <th  >Total de vendedores</th>
                  </tr>
                  {{ csrf_field() }}

              </thead>
              <tbody >
                @if ($zonas->count()==0)
                    <tr>
                      <td colspan='5' align='center' >No hay registros</td>
                    </tr>
                @else
                  @foreach ($zonas as $z)
                  <tr class="post{{$z->id}}">
                      <td>{{$z->id}}</td>
                      <td >{{$z->nombre}}</td>
                      <td >{{$z->total}}</td>
                      
                  </tr>             
                  @endforeach  
                @endif                      
              </tbody>
</table>