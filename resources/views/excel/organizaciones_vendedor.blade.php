<table  class="table table-bordered table-striped table-sm">
    <thead>
        <tr >
            <th >Id</th>
            <th >RFC</th>
            <th >Curp</th>
            <th >Permiso</th>
        </tr>

    </thead>
    <tbody >
        @foreach ($vendedores as $v)
                   
            <tr class="post{{$v->id}}">
                <td >{{$v->id}}</td>
                <td >{{$v->rfc}}</td>
                <td >{{$v->curp}}</td>
                <td >{{$v->id_permiso}}</td>
            </tr>             
        @endforeach                  
    </tbody>
</table>