@extends('layouts.master')

@section('content')
<div class="container-fluid center">
    <div class="card">
      <div class="card-header">
          <h1>
           Zona {{$zona}}
          </h1>
      </div>
      
    </div>

</div>

<div class="container-fluid">
    <!-- Ejemplo de tabla Listado -->
    <div class="card">
        <div class="card-header">
            <button type="button"  class="btn btn-info">
              <i class="fa fa-file-pdf"></i>&nbsp;PDF
            </button>

            <button type="button"  class="btn btn-info">
                <i class="fa fa-file-csv"></i></i>&nbsp;CSV
            </button>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="input-group">
                       
                        <input type="text"  class="form-control" placeholder="Texto a buscar">
                        <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </div>

            <div id="table_data">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>N° de Cuenta</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Paterno</th>
                            <th>Actividad Comercial</th>
                            <th>Giro</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($vendedor as $v)
                    <tr >
                        <td >{{$v->id}}</td>
                        <td >{{$v->numero_cuenta}}</td>
                        <td >{{$v->name}}</td>
                        <td >{{$v->apellido_paterno}}</td>
                        <td >{{$v->apellido_materno}}</td>
                        <td >{{$v->id_actividad}}</td>
                        <td >{{$v->giro}}</td>
                        <td align="center">
                        <button type="button"  class="btn btn-warning btn-sm">
                            <i class="fa fa-eye"></i>
                        </button>
                        
                        <button type="button" class="btn btn-danger btn-sm" >
                                <i class="fa fa-pencil-alt"></i>
                        </button>
                        
                    </td>
                    </tr>             
                    @endforeach                   
                    </tbody>
            </table>
            {!! $vendedor->links() !!}
            </div>
        </div>
    </div>
  </div>
    
@endsection


