<table id="table" class="table table-bordered table-striped table-sm">
    <thead >
        <tr >
            <th >Id</th>
            <th >Nombre agencia</th>
            <th >Tipo agencia</th>
            <th >Numero de colonias</th>
        </tr>

    </thead>
    <tbody >
        @foreach ($agencias as $a)
        <tr class="post{{$a->id}}">
            <td>{{$a->id}}</td>
            <td >{{$a->nombre}}</td>
            <td >{{$a->tipo_agencia}}</td>
            <td >{{$a->total}}</td>
        </tr>             
        @endforeach                   
    </tbody>
</table>