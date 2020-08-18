<table id="table" class="table table-bordered table-striped table-sm">
    <thead >
        <tr >
            <th >Id</th>
            <th >Nombre de la organizacion</th>
            <th >Nombre del dirigente</th>
            <th >Total de vendedores</th>
        </tr>
        {{ csrf_field() }}

    </thead>
    <tbody >

        @if($organizaciones->count()==0)
          <tr>
            <td colspan='5' align='center' >No hay registros</td>
          </tr>
        @else
            @foreach ($organizaciones as $o)
                <tr class="post{{$o->id}}">
                    <td>{{$o->id}}</td>
                    <td >{{$o->nombre_organizacion}}</td>
                    <td >{{$o->nombre_dirigente}}</td>
                    <td >{{$o->total}}</td>
                
                </tr>             
            @endforeach          
        @endif

    </tbody>
</table>