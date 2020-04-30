<div class="card-body">
    <div class="form-group row">
        <div class="col-md-6">
            <div class="input-group">
               
                <input type="text"  class="form-control" placeholder="Texto a buscar">
                <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
            </div>
        </div>
    </div>
    <table id="table" class="table table-bordered table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo Electronico</th>
                <th>Cargo</th>
                <th>Status</th>
                <th>Opciones</th>
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
            <td>{{$u->sexo}}</td>
            <td>{{$u->sexo}}</td>
           
            <td align="center">
              <button type="button" class="show-modal btn btn-warning btn-sm" data-id="{{$u->id}}"
                data-nombre_organizacion="{{$u->name}}" 
                data-nombre_dirigente="{{$u->name}}">
                  <i class="fa fa-eye"></i>
              </button>

              <button type="button" class="btn btn-danger btn-sm" data-id="{{$u->id}}">
                  <i class="fa fa-pencil-alt"></i>
              </button>
             
              <button type="button" class="btn btn-info btn-sm" data-id="{{$u->id}}">
                  <i class="fa fa-eraser"></i>
              </button>
            
          </td>
        </tr>             
          @endforeach                   
        </tbody>
    </table>
    {!! $usuarios->links() !!}
</div>