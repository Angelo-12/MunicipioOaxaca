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
  <title>PERMISOS</title>
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
      Permisos {{$nombre}}
  </h4>

  <p>
      <p> Creado : <?php
          date_default_timezone_set('America/Mexico_City');
          ?>
          <?=date('m/d/Y g:ia');?></p>
      <p>Total de registros :
        {{$permisos->count()}}
      </p>
  </p>

  <div id="table_data">
    <table class="table table-striped">
        <thead >
            <tr>
                <th>N° Cuenta</th>
                <th>Expediente</th>
                <th>Tipo de actividad</th>
                <th>Giro</th>
                <th>Fecha de Registro</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($permisos as $p )
            <tr class="post{{$p->id}}" id="{{$p->id}}">
              <td>{{$p->numero_cuenta}}</td>
              <td>{{$p->numero_expediente}}</td>
              <td>
                @if ($p->tipo_actividad==1)
                    Comercial Movil
                @elseif($p->tipo_actividad==2)
                    Comercial Semifija
                @elseif($p->tipo_actividad==3)
                    Comercial Movil Con Equipo Rodante 
                @elseif($p->tipo_actividad==4)
                    Comercial Fija
                @elseif($p->tipo_actividad==5)
                    Comercios Establecidos
                @elseif($p->tipo_actividad==6)
                    Tianguis
                @elseif($p->tipo_actividad==7)
                    Prestacion de Servicios    
                @endif
              </td>
                                      
              <td>{{$p->giro}}</td>
            
              <td>{{$p->created_at}}</td>
              
              <td>@if($p->asignado==1)
                  <div class="switch">
                      <label>
                          Asignado
                      <input type="checkbox" checked readonly="readonly" onclick="javascript: return false;">
                      </label>
                    </div>
                  @else
                  <div class="switch">
                      <label>
                        Sin Asignar
                        <input type="checkbox" readonly onclick="javascript: return false;">
                      </label>
                    </div>
                  @endif
                </td>
            
            </tr>             
          @endforeach                
        </tbody>
    </table>
</div>
 
</body>
</html>