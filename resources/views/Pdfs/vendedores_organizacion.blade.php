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
        Vendedores de la organizacion
        @foreach ($organizacion as $o)
           {{$o->nombre_organizacion}} 
        @endforeach
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
                    <th>Fecha Registro</th>
                    <th>RFC</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendedores as $v)
                    <tr class="post{{$v->id}}">
                        <td>{{$v->id}}</td>
                        <td >{{$v->name}}</td>
                        <td >{{$v->apellido_paterno}}</td>
                        <td >{{$v->created_at}}</td>
                        <td >{{$v->rfc}}</td>
                    </tr>             
                @endforeach           
            </tbody>
        </table>

    </div>

</body>
</html>