<table  class="table table-bordered table-striped table-sm">
    <thead>
        <tr >
            <th >Id</th>
            <th >Nombre</th>
            <th >Apellido Paterno</th>
            <th >Apellido Materno</th>
            <th >RFC</th>
            <th >Curp</th>
            <th >Permiso</th>
            <th >Actividad</th>
        </tr>

    </thead>
    <tbody >
        @foreach ($vendedores as $v)
                   
            <tr class="post{{$v->id}}">
                <td >{{$v->id}}</td>
                <td >{{$v->name}}</td>
                <td >{{$v->apellido_paterno}}</td>
                <td >{{$v->apellido_materno}}</td>
                <td >{{$v->rfc}}</td>
                <td >{{$v->curp}}</td>
                <td >{{$v->id_permiso}}</td>
                <td >{{$v->nombre_actividad}}</td>
            </tr>             
        @endforeach                  
    </tbody>
</table>