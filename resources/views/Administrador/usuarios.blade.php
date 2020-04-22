@extends('layouts.master')

@section('content')
<div class="centrado" id="onload">
  <div class="lds-dual-ring"></div>
</div>
<div class="container-fluid center" hidden> 
  <div class="card">
    <div class="card-header">
      <h1>
        Usuarios
      </h1>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
       
        <a class="create-modal btn btn-secondary">
            <i class="fa fa-plus"></i>&nbsp;Nuevo
        </a>
         <button type="button"  class="btn btn-info">
            <i class="fa fa-file-pdf"></i>&nbsp;Reporte
        </button>
    </div>

    @include('Administrador.pagination_data')
   
</div> 

<div class="modal fade" id="create_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
          <div class="modal-body">
              <form class="form-horizontal" role="form">
                @csrf
                   <div class="form-group">
                      <label>Nombre</label>
                      <input  type="text" name="name" placeholder="Nombre"
                      class="form-control">
                   </div>

                   <div class="form-group">
                      <label>Apellido Paterno</label>
                      <input type="text" name="apellido_paterno" placeholder="Apellido Paterno"
                        class="form-control" >
                      
                    </div>
            
                    <div class="form-group">
                      <label>Apellido Materno</label>
                      <input  type="text" name="apellido_materno" placeholder="Apellido Materno"
                        class="form-control" >
                      
                    </div>
            
                    <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
            
                    <div class="form-group">
                          <label for="password">Password</label>
                          <input  type="password" class="form-control" id="password" placeholder="Password">
                    </div>
            
                   <div class="form-group">
                      <label>Sexo</label>
                      <select class="form-control" >
                        <option value="" selected disabled>Seleccionar sexo</option>
                        <option value="M">Mujer</option>
                        <option value="H">Hombre</option>
                      </select>
                   </div>
            
                   <div class="form-group">
                      <label>Fecha de nacimiento</label>
                        <div class="input-group date">
                            <input type="date" class="form-control pull-right" id="datepicker">
                        </div>
                   </div>
            
                   <div class="form-group">
                      <label>Estado</label>
                      <select name="estado" id="estado" class="form-control">
                        <option value="" selected disabled>Seleccionar Estado</option>
                        @foreach ($estado as $e)
                          <option value="{{$e->id_estado}}">{{$e->nombre}}</option>
                        @endforeach
                      </select>
                   </div>
            
                   <div class="form-group">
                      <label>Municipio</label>
                      <select name="municipio" id="municipio" class="form-control">
                        <option value="" selected disabled>Seleccionar Municipio</option>
                        
                      </select>
                   </div>
              </form>
          </div>
      
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" id="agregar_usuario">
          Guardar
          <i class="fa fa-save"></i>
        </button>
        <button class="btn btn-danger" type="button" data-dismiss="modal">
          Cerrar
          <i class="fa fa-times-circle"></i>
        </button>
      </div>
    </div>
  </div>
</div>     

</div>

@endsection



