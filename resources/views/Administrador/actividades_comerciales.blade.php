@extends('layouts.master')

@section('content')
<div class="centrado" id="onload">
    <div class="lds-dual-ring"></div>
</div>

<div class="container-fluid center" hidden> 

    <div class="card">
        <div class="card-header">
            <h1>
                {{$actividad}}
               
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
                        <th>N° Permiso</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>RFC</th>
                        <th>Opciones</th>
                    </tr>
                    {{ csrf_field() }}

                </thead>
                <tbody>
                    @foreach ($vendedor as $v)
                   
                    <tr class="post{{$v->id}}">
                        <td >{{$v->id}}</td>
                        <td >{{$v->id_permiso}}</td>
                        <td >{{$v->name}}</td>
                        <td >{{$v->apellido_paterno}}</td>
                        <td>{{$v->apellido_materno}}</td>
                        <td>{{$v->rfc}}</td>
                        <td align="center">
                            <button type="button" class="show-modal btn btn-warning btn-sm" data-id="{{$v->id}}"
                                    data-nombre_organizacion="{{$v->name}}" 
                                    data-nombre_dirigente="{{$v->name}}">
                                <i class="fa fa-eye"></i>
                            </button>

                            <button type="button" class="edit-modal btn btn-danger btn-sm" data-id="{{$v->id}}"
                              data-nombre_organizacion="{{$v->name}}" 
                                    data-nombre_dirigente="{{$v->name}}">
                                <i class="fa fa-pencil-alt"></i>
                            </button>

                            <button type="button" class="delete-modal btn btn-info btn-sm" data-id="{{$v->id}}">
                                <i class="fa fa-eraser"></i>
                            </button>

                        </td>
                    </tr>             
                    @endforeach                   
                </tbody>
            </table>
           {{$vendedor->links()}}
        </div>

    </div>
</div>

@endsection