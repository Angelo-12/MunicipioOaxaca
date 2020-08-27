  <table id="table" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr >
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Email</th>
                        <th>Motivo</th>
                        <th>Fecha</th>
                    </tr>
                    {{ csrf_field() }}

                </thead>
                <tbody>
                    @if ($observaciones->count()==0)
                        <tr>
                            <td colspan='7' align='center' >No hay registros</td>
                        </tr>
                    @else
                        @foreach ($observaciones as $o)
                        <tr class="post{{$o->id}}">
                            <td >{{$o->id}}</td>
                            <td >{{$o->nombre}}</td>
                            <td>{{$o->apellido_paterno}}</td>
                            <td>{{$o->email}}</td>
                            <td>{{$o->motivo}}</td>
                            <td>{{$o->fecha}}</td>
                           
                        </tr>             
                        @endforeach        
                    @endif
                         
                </tbody>
  </table>