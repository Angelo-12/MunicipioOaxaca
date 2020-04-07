@extends('layouts.master')

@section('content')

<div class="box">

  <div class="box-header">
    <h3 class="box-title center " style="text-align:center;">Usuarios</h3>
    <div class="card-tools" align="right">
      <button class="btn btn-success" name="create" id="create"
       data-toggle="modal" data-target="#agregarEmpleado">Agregar <i class="fas fa-user-plus"></i></button>
    </div>
    
  </div>
  <p></p>
  <p></p>
  
  <!-- /.box-header -->

  <div class="box-body">

    <div class="row">
      <div class="col-sm-12">
        <table  class="table table-striped" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Id</th>
                  <th>Nombre(s)</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Sexo</th>
                  <th>Puesto</th>
                  <th>Opciones</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($usuarios as $u)
            <tr id="{{$u->id}}">
              <td>{{$u->id}}</td>
              <td>{{$u->name}}</td>
              <td>{{$u->apellido_paterno}}</td>
              <td>{{$u->apellido_materno}}</td>
              <td>{{$u->sexo}}</td>
              <td>{{$u->sexo}}</td>
              <td style="text-align:center;">
                  <a href=""  class="show-modal" data-id="{{$u->id}}" data-title="{{$u->name}}">
                      <i class="fa fa-eye" title="Mostrar"></i>
                  </a>
                  <a href=""  class="edit-modal" data-id="{{$u->id}}" style="color:orange;">
                      <i class="fa fa-pencil-alt" title="Editar"></i>
                  </a>
                  <a href=""  class="delete-modal" data-id="{{$u->id}}" style="color:red;">
                      <i class="fa fa-eraser" title="Eliminar"></i>
                  </a>
              </a></td>
          </tr>
        @endforeach
          </tbody>
      </table>
      </div>
    </div>
</div>

  <!-- /.box-body -->




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

      <script>
       $('sample_form').on('submit',function(event){
          event.preventDefault();
          var action_url='';
          if($('#action').val=='Add'){
            action_url="/Usuarios/insertar";
          }

          $.ajax({
            url:action_url,
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data){
              var html='';

              if(data.errors){
                html='<div class="alert alert-danger">';

                  for(var count=0; count<data.errors.length; count++){
                    html+='<p>'+data.errors[count]+'</p>'
                  }

                  html+='</div>'
              }

              if(data.success){
                html='<div class="alert alert-success">'+data.success+'</div>';
                $('#sample_form')[0].reset();
                $('#myTable').DataTable().ajax.reload();

              }
              $('#form_result').html(html);

            }
          });
       });
      </script>
      
      
      @endsection

