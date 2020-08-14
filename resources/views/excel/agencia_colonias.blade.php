<table id="table" class="table table-bordered table-striped table-sm">
    <thead >
        <tr >
            <th >Id</th>
            <th >Colonia</th>
            <th >Codigo Postal</th>
            <th >Numero de vendedores</th>
        </tr>

    </thead>
    <tbody >
        @foreach ($agencias as $a)
        <tr class="post{{$a->id}}">
            <td>{{$a->id}}</td>
            <td >{{$a->nombre}}</td>
            <td >{{$a->codigo_postal}}</td>
            <td >{{$a->total}}</td>
        </tr>             
        @endforeach                   
    </tbody>
</table>