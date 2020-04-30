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
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <input  type="text" name="nombre" placeholder="Nombre"
                                    class="form-control" id="nombre">
                            <span class="text-danger" id="nombre_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" placeholder="Apellido Paterno"
                                   class="form-control" id="apellido_paterno">
                            <span class="text-danger" id="apellido_paterno_error"></span>

                        </div>

                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input  type="text" name="apellido_materno" placeholder="Apellido Materno"
                                    class="form-control" id="apellido_materno">
                            <span class="text-danger" id="apellido_materno_error"></span>

                        </div>

                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select class="form-control" name="sexo" id="sexo">
                                <option value="" selected disabled>Seleccionar sexo</option>
                                <option value="M">Mujer</option>
                                <option value="H">Hombre</option>
                            </select>
                            <span class="text-danger" id="sexo_error"></span>
                        </div>


                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="text" class="form-control fj-date" id="datepicker" 
                            placeholder="yyyy/mm/dd" name="fecha_nacimiento">
                            <span class="text-danger" id="fecha_nacimiento_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Estado</label>
                            <select name="estado" id="estado" class="form-control">
                                <option value="" selected disabled>Seleccione su estado</option>
                                    @foreach ($estado as $e)
                                        <option value="{{$e->id_estado}}">{{$e->nombre}}</option>
                                    @endforeach
                            </select>
                            <span class="text-danger" id="estado_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Municipio</label>
                            <select name="id_municipio" id="municipio" class="form-control">
                                <option value="" selected disabled>Seleccione su municipio</option>

                            </select>
                            <span class="text-danger" id="id_municipio_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                            <span class="text-danger" id="email_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input  type="password" class="form-control" id="password" placeholder="Password">
                            <span class="text-danger" id="password_error"></span>
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

