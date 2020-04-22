@extends('layouts.master')

@section('content')
<div class="container-fluid center"> 
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

<div class="modal fade" id="agregarEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
          <div id="formModal" class="modal-body">
              <form id="sample_form" action="" class="form-horizontal" role="form">
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
                      <select class="form-control">
                        <option value="" selected disabled>Seleccionar Estado</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Mexico">Mexico</option>
                      </select>
                   </div>
            
                   <div class="form-group">
                      <label>Municipio</label>
                      <select class="form-control">
                        <option value="" selected disabled>Seleccionar Municipio</option>
                        <option value="1">Oaxaca de juarez</option>
                        <option value="2">Santa Cruz Xoxocotlan</option>
                      </select>
                   </div>
              </form>
          </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
            Cerrar
            <i class="fa fa-times-circle"></i>
        </button>
        <button type="button" id="agregar" class="btn btn-primary" value="Add">
            Guardar
            <i class="fa fa-save"></i>
        </button>
      </div>
    </div>
  </div>
</div>     

</div>

@endsection



