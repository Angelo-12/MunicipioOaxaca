<style>
    body{
        /*margin: 2.54mm 2.54mm 2.54mm 2.54mm;*/
        font-family: 'Times New Roman', Times, serif;
        margin-top: 1.54mm;
        background-image: url('/img/hoja_membretada.png');
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }

    .texto{
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }

    table {
                border: none;
                width: 100%;
                border-collapse: collapse;
            }

            td { 
                padding: 5px 10px;
                text-align: center;
                /*border: 1px solid #999;*/
                
            }

            tr:nth-child(1) {
                /*background: #dedede;*/
            }
</style>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VENDEDORES</title>
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h4 class="texto">
        Vendedores
    </h4>

    <p>
        <p> Creado : <?php
            date_default_timezone_set('America/Mexico_City');
            ?>
            <?=date('m/d/Y g:ia');?></p>
        <p>Total de registros :
          {{$vendedores->count()}}
        </p>
    </p>

    <div id="table_data">
        <table class="table table-striped">
            <thead >
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($vendedores as $u)
                <tr class="post{{$u->id}}" id="{{$u->id}}">
                  <td>{{$u->id}}</td>
                  <td>{{$u->name}}</td>
                  <td>{{$u->apellido_paterno}}</td>
                  <td>{{$u->apellido_materno}}</td>
                  <td>{{$u->email}}</td>
                      
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

    </div>

</body>
</html>