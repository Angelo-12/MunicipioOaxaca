@extends('layouts.master')

@section('content')

<div class="centrado" id="onload">
    <div class="lds-dual-ring"></div>
</div>

<div class="container-fluid center" hidden> 

    <div class="card">
        <div class="card-header">
            <h1>
                Organizaciones
            </h1>
        </div>
    </div>

    <div class="card">
        <div class="card-header">

            <a class="create-modal btn btn-secondary">
                <i class="fa fa-plus"></i>&nbsp;Nuevo
            </a>
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
            <table id="table" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr >
                        <th>Id</th>
                        <th>Nombre de la organizacion</th>
                        <th>Nombre del dirigente</th>
                        <th>Total de vendedores</th>
                        <th>Opciones</th>
                    </tr>
                    {{ csrf_field() }}

                </thead>
                <tbody>
                    @foreach ($organizaciones as $o)
                    <tr class="post{{$o->id}}">
                        <td >{{$o->id}}</td>
                        <td >{{$o->nombre_organizacion}}</td>
                        <td>{{$o->nombre_dirigente}}</td>
                        <td>{{$o->id_organizacion}}</td>
                        <td align="center">
                            <button type="button" class="show-modal btn btn-warning btn-sm" data-id="{{$o->id}}"
                                    data-nombre_organizacion="{{$o->nombre_organizacion}}" 
                                    data-nombre_dirigente="{{$o->nombre_dirigente}}">
                                <i class="fa fa-eye"></i>
                            </button>

                            <button type="button" class="edit-modal btn btn-danger btn-sm" data-id="{{$o->id}}"
                              data-nombre_organizacion="{{$o->nombre_organizacion}}" 
                                    data-nombre_dirigente="{{$o->nombre_dirigente}}">
                                <i class="fa fa-pencil-alt"></i>
                            </button>

                            <button type="button" class="delete-modal btn btn-info btn-sm" data-id="{{$o->id}}">
                                <i class="fa fa-eraser"></i>
                            </button>

                        </td>
                    </tr>             
                    @endforeach                   
                </tbody>
            </table>
            {!! $organizaciones->links() !!}
        </div>

    </div>
</div>

{{-- Modal Form Create Post --}}
<div id="create_organizacion" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar Organizacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" >
                  <span id="form_result"></span>
                </div>
                <form class="form-horizontal" role="form" id="form_organizaciones">
                    @csrf

                    <div class="form-group">
                        <label>Nombre de la organizacion</label>
                        <input  type="text" name="nombre_organizacion" id="nombre_organizacion" placeholder="Nombre de la organizacion"
                                class="form-control">
                        <span class="text-danger" id="nombre_organizacion_error"></span>
                    </div>
                    <div class="form-group">
                        <label>Nombre del dirigente</label>
                        <input  type="text" name="nombre_dirigente" id="nombre_dirigente" placeholder="Nombre del dirigente"
                                class="form-control">
                        <span class="text-danger" id="nombre_dirigente_error"></span>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" id="agregar_organizacion">
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

{{-- Modal show  --}}
<div id="show_organizacion" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detalles</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">ID :</label>
                    <b id="id"/>
                </div>
                <div class="form-group">
                    <label for="">Nombre de la Organizacion :</label>
                    <b id="nombre_organizacion_show"/>
                </div>
                <div class="form-group">
                    <label for="">Nombre del dirigente :</label>
                    <b id="nombre_dirigente_show"/>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Update  --}}
<div id="update_organizacion" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Organizacion</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">

            <form class="form-horizontal" role="modal">
              <div class="form-group">
                <label class="control-label col-sm-2" for="">ID :</label>
                <div class="col-sm-12">
                  <input class="form-control" type="text" id="id_update" disabled/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-10" for="">Nombre de la Organizacion :</label>
                <div class="col-sm-12">
                  <input class="form-control" type="text" id="nombre_organizacion_update"/>
                </div>
               
            </div>
            <div class="form-group">
                <label class="control-label col-sm-10" for="">Nombre del dirigente :</label>
                <div class="col-sm-12">
                  <input class="form-control" type="text" id="nombre_dirigente_update"/>
                </div>
                
            </div>
            </form> 
            <div class="modal-footer">
                <button class="btn btn-primary actualizar_organizacion" type="submit" id="actualizar_organizacion">
                    Actualizar
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cerrar
                    <i class="fa fa-times-circle"></i>
                </button>
            </div>
        </div>
              
          </div>
      </div>
  </div>

  {{-- Modal Delete  --}}
<div id="delete_organizacion" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Organizacion</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
  
            </div>
            <div class="modal-body">
  
                <div class="deleteContent">
                    ¿Esta seguro que desea eliminar este registro? <span class="title"></span>?
                    <span class="hidden id"></span>
                </div>
              <div class="modal-footer">
                  <button class="btn btn-primary eliminar_organizacion" type="submit" id="eliminar_organizacion">
                      Eliminar
                      <i class="far fa-trash-alt"></i>
                  </button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">
                      Cerrar
                      <i class="fa fa-times-circle"></i>
                  </button>
              </div>
          </div>
                
            </div>
        </div>
    </div>

</div>

@endsection

