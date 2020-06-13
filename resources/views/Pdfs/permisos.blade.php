<div align="center"><img src="img/encabezado.png"></div>

                 <div class="card-header" align="center">
                    <h2>
                        Permisos  {{$nombre}}
                    </h2>
                </div>

            <p>
                <h3> Creado : <?php
                    date_default_timezone_set('America/Mexico_City');
                    ?>
                    <?=date('m/d/Y g:ia');?></h3>
                <h3>Total de registros :
                  {{$permisos->count()}}
                </h3>
            </p>
            

            <div id="table_data">
                <table class="table table-striped">
                    <thead >
                        <tr style="background:#C10E62;">
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
                  <td>{{$p->tipo_actividad}}</td>
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
                      @endif</td>
                 
                </tr>             
                @endforeach                
              </tbody>
            </table>
         </div>