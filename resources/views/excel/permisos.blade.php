<table id="table" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>N° Cuenta</th>
            <th>Expediente</th>
            <th>Tipo de actividad</th>
            <th>Giro</th>
            <th>Fecha de Registro</th>
        </tr>
        {{ csrf_field() }}
        
    </thead>
    <tbody>
      @foreach ($permisos as $p )
        <tr class="post{{$p->id}}" id="{{$p->id}}">
            <td>{{$p->numero_cuenta}}</td>
            <td>{{$p->numero_expediente}}</td>
            <td>{{$p->giro}}</td>      
            <td>{{$p->created_at}}</td>
            
        </tr>             
      @endforeach                   
    </tbody>
</table>