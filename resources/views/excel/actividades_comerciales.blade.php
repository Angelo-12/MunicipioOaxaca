<table id="table" class="table table-bordered table-striped table-sm">
    <thead >
        <tr >
            <th>Id</th>
            <th>Nombre</th>
            <th>Total de vendedores</th>
        </tr>
    </thead>
    <tbody >
        @foreach ($actividades as $a)
                   
            <tr class="post{{$a->id}}">
                <td >{{$a->id}}</td>
                <td >{{$a->nombre_actividad}}</td>
                 <td >{{$a->total}}</td>
            </tr>             
        @endforeach                  
    </tbody>
</table>