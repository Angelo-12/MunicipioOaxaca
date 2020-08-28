<table id="table" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo Electronico</th>
            <th>Fecha de nacimiendo</th>
            <th>Cargo</th>
            <th>Status</th>
        </tr>
        {{ csrf_field() }}
        
    </thead>
    <tbody>
    
      @foreach ($usuarios as $u)
        <tr class="post{{$u->id}}" id="{{$u->id}}">
            <td>{{$u->id}}</td>
            <td>{{$u->name}}</td>
            <td>{{$u->apellido_paterno}}</td>
            <td>{{$u->apellido_materno}}</td>
            <td>{{$u->email}}</td>
            <td>{{$u->fecha_nacimiento}}</td>
            <td>
                {{$u->cargo}}
                
            </td>
                
            <td>@if($u->status==1)
                <div class="switch">
                    <label>
                    Activo
                    <input type="checkbox" checked readonly="readonly" onclick="javascript: return false;">
                    </label>
                </div>
                @else
                <div class="switch">
                    <label>
                    Inactivo
                    <input type="checkbox" readonly onclick="javascript: return false;">
                    </label>
                </div>
                @endif</td>
        </tr>             
      @endforeach                   
    </tbody>
</table>