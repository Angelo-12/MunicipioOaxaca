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
    <title>Agencias</title>
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
       Agencias
    </h4>

    <p>
        <p> Creado : <?php
            date_default_timezone_set('America/Mexico_City');
            ?>
            <?=date('m/d/Y g:ia');?></p>
        <p>Total de registros :
          {{$agencias->count()}}
        </p>
    </p>

    <div id="table_data">
        <table class="table table-striped">
            <thead >
                <tr >
                    <th >Id</th>
                    <th >Nombre agencia</th>
                    <th >Tipo agencia</th>
                    <th >Numero de colonias</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agencias as $a)
                <tr class="post{{$a->id}}">
                    <td>{{$a->id}}</td>
                    <td >{{$a->nombre}}</td>
                    <td >{{$a->tipo_agencia}}</td>
                    <td >{{$a->total}}</td>
                  
                </tr>             
                @endforeach             
            </tbody>
        </table>

    </div>

</body>
</html>