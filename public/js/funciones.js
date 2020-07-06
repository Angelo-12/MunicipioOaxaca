$(document).ready(function() {

    $('#permitida').click(function() {
        $('#table_data').load('/Zonas/detalle_zona/1');
    });

    $('#zona').click(function() {
        $('#contenido').load('/Zonas/mostrar');
    });

    $('#organizacion').click(function() {
        $('#contenido').load('/Organizaciones/mostrar');
    });

    //Funcion para asignar un rol a un usuario

    $("#asignar_rol").click(function(){
        var aux=$('#cargo option:selected').val();
        var a=$("#id_usuario").val();
        $.ajax({
            type: 'POST',
            url: 'insertar_rol',
            data: {
                '_token': $('input[name=_token]').val(),
                'cargo': aux,
                'id_usuario': a,
                
            },
            dataType:'json',
            success: function(data) {
               
                if ((data.errors)) {
                    
                    $.each( data.errors, function( key, value ) {
                        console.log(key);
                        console.log(value);
                    });

                } else {

                    Swal.fire({
                        icon: 'success',
                        title: 'Rol asignado',
                        showConfirmButton: false,
                        timer: 1500
                      })

                }     
            },
        });
    });

    //Funcion para agregar un usuario
    $("#agregar_usuario").click(function(){
        var aux=$('#sexo option:selected').val();
        $.ajax({
            type: 'POST',
            url: 'insertar_administrador',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=nombre]').val(),
                'apellido_paterno': $('input[name=apellido_paterno]').val(),
                'apellido_materno': $('input[name=apellido_materno]').val(),
                'sexo': aux,
                'fecha_nacimiento': $('input[name=fecha_nacimiento]').val(),
                'email': $('input[name=email]').val(),
                'password': $('input[name=password]').val(),
                'id_municipio': $('select[name=id_municipio]').val(),

            },
            dataType:'json',
            success: function(data) {
                
                //Agrega los bordes verdes a los inputs
                $('#name').addClass('green-border');
                $('#apellido_paterno').addClass('green-border');
                $('#apellido_materno').addClass('green-border');
                $('#sexo').addClass('green-border');
                $('#fecha_nacimiento').addClass('green-border');
                $('#estado').addClass('green-border');
                $('#municipio').addClass('green-border');
                $('#email').addClass('green-border');
                $('#password').addClass('green-border');
                //Oculta los errores en caso de que el valor sea correcto
                $('#name_error').addClass('d-none');
                $('#apellido_paterno_error').addClass('d-none');
                $('#apellido_materno_error').addClass('d-none');
                $('#sexo_error').addClass('d-none');
                $('#fecha_nacimiento_error').addClass('d-none');
                $('#estado_error').addClass('d-none');
                $('#municipio_error').addClass('d-none');
                $('#email_error').addClass('d-none');
                $('#password_error').addClass('d-none');

                if ((data.errors)) {   

                    $.each( data.errors, function( key, value ) {
                        
                        var ErrorId='#'+key+'_error';
                        var aux='#'+key;
                        $(aux).removeClass('green-border');
                        $(aux).addClass('red-border');
                        $(ErrorId).removeClass('d-none');
                        $(ErrorId).text(value);
                    });
                   
                } else {

                    $('#name').val('');
                    $('#apellido_paterno').val('');
                    $('#apellido_materno').val('');
                    $('#fecha_nacimiento').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#sexo').prop('selectedIndex',0);
                    $('#id_municipio').prop('selectedIndex',0);

                    $('#name').removeClass('green-border');
                    $('#name').removeClass('red-border');
                    $('#name_error').addClass('d-none');
                    $('#apellido_paterno').removeClass('green-border');
                    $('#apellido_paterno').removeClass('red-border');
                    $('#apellido_paterno_error').addClass('d-none');
                    $('#apellido_materno').removeClass('green-border');
                    $('#apellido_materno').removeClass('red-border');
                    $('#apellido_materno_error').addClass('d-none');
                    $('#fecha_nacimiento').removeClass('green-border');
                    $('#fecha_nacimiento').removeClass('red-border');
                    $('#fecha_nacimiento_error').addClass('d-none');
                    $('#sexo').removeClass('green-border');
                    $('#sexo').removeClass('red-border');
                    $('#sexo_error').addClass('d-none');
                    $('#estado').removeClass('green-border');
                    $('#estado').removeClass('red-border');
                    $('#estado_error').addClass('d-none');
                    $('#id_municipio').removeClass('green-border');
                    $('#id_municipio').removeClass('red-border');
                    $('#id_municipio_error').addClass('d-none');
                    $('#email').removeClass('green-border');
                    $('#email').removeClass('red-border');
                    $('#email_error').addClass('d-none');
                    $('#password').removeClass('green-border');
                    $('#password').removeClass('red-border');
                    $('#password_error').addClass('d-none');

                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario agregado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })

                    $('#table').append("<tr class='post" + data.id + "'>" +
                        "<td>" + data.id + "</td>" +
                        "<td>" + data.name + "</td>" +
                        "<td>" + data.apellido_paterno + "</td>" +
                        "<td>" + data.apellido_materno + "</td>" +
                        "<td>" + data.email + "</td>" +
                        "<td>  No asignado    </td>" +
                        "<td>" + "<div class='switch'>"+
                                "<label>"+
                                    Activo
                                    +"<input type='checkbox' checked readonly='readonly' onclick='javascript: return false;'>"+
                                +"</label>"
                               +"</div>" 
                        + "</td>" +
                        "<td align='center'>" +
                        "<button type='button' style='margin-right:3px;'  class='show-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'" +
                        "data-apellido_paterno='" + data.apellido_paterno + "'><i class='fa fa-eye'></i></button>" +
                        "<button type='button' style='margin-right:3px;' class='btn btn-danger btn-sm' data-idorganizacion='" + data.idorganizacion + "'><i class='fa fa-pencil-alt'></i></button>" +
                        "<button type='button' style='margin-right:3px;' class='btn btn-info btn-sm' data-id='" + data.id + "'><i class='fa fa-eraser'></i></button>" +
                        "</td>" +
                        "</tr>");
                        
                }
            },
        });

    });

    //Funcion que permite crear una nueva secretaria
    $("#agregar_usuario_administrativo").click(function(){
        var aux=$('#sexo option:selected').val();
        $.ajax({
            type: 'POST',
            url: 'insertar_secretaria',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=nombre]').val(),
                'apellido_paterno': $('input[name=apellido_paterno]').val(),
                'apellido_materno': $('input[name=apellido_materno]').val(),
                'sexo': aux,
                'fecha_nacimiento': $('input[name=fecha_nacimiento]').val(),
                'email': $('input[name=email]').val(),
                'password': $('input[name=password]').val(),
                'id_municipio': $('select[name=id_municipio]').val(),

            },
            dataType:'json',
            success: function(data) {
                
                //Agrega los bordes verdes a los inputs
                $('#name').addClass('green-border');
                $('#apellido_paterno').addClass('green-border');
                $('#apellido_materno').addClass('green-border');
                $('#sexo').addClass('green-border');
                $('#fecha_nacimiento').addClass('green-border');
                $('#estado').addClass('green-border');
                $('#municipio').addClass('green-border');
                $('#email').addClass('green-border');
                $('#password').addClass('green-border');
                //Oculta los errores en caso de que el valor sea correcto
                $('#name_error').addClass('d-none');
                $('#apellido_paterno_error').addClass('d-none');
                $('#apellido_materno_error').addClass('d-none');
                $('#sexo_error').addClass('d-none');
                $('#fecha_nacimiento_error').addClass('d-none');
                $('#estado_error').addClass('d-none');
                $('#municipio_error').addClass('d-none');
                $('#email_error').addClass('d-none');
                $('#password_error').addClass('d-none');

                if ((data.errors)) {   

                    $.each( data.errors, function( key, value ) {
                        
                        var ErrorId='#'+key+'_error';
                        var aux='#'+key;
                        $(aux).removeClass('green-border');
                        $(aux).addClass('red-border');
                        $(ErrorId).removeClass('d-none');
                        $(ErrorId).text(value);
                    });
                   
                } else {

                    $('#name').val('');
                    $('#apellido_paterno').val('');
                    $('#apellido_materno').val('');
                    $('#fecha_nacimiento').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#sexo').prop('selectedIndex',0);
                    $('#id_municipio').prop('selectedIndex',0);

                    $('#name').removeClass('green-border');
                    $('#name').removeClass('red-border');
                    $('#name_error').addClass('d-none');
                    $('#apellido_paterno').removeClass('green-border');
                    $('#apellido_paterno').removeClass('red-border');
                    $('#apellido_paterno_error').addClass('d-none');
                    $('#apellido_materno').removeClass('green-border');
                    $('#apellido_materno').removeClass('red-border');
                    $('#apellido_materno_error').addClass('d-none');
                    $('#fecha_nacimiento').removeClass('green-border');
                    $('#fecha_nacimiento').removeClass('red-border');
                    $('#fecha_nacimiento_error').addClass('d-none');
                    $('#sexo').removeClass('green-border');
                    $('#sexo').removeClass('red-border');
                    $('#sexo_error').addClass('d-none');
                    $('#estado').removeClass('green-border');
                    $('#estado').removeClass('red-border');
                    $('#estado_error').addClass('d-none');
                    $('#id_municipio').removeClass('green-border');
                    $('#id_municipio').removeClass('red-border');
                    $('#id_municipio_error').addClass('d-none');
                    $('#email').removeClass('green-border');
                    $('#email').removeClass('red-border');
                    $('#email_error').addClass('d-none');
                    $('#password').removeClass('green-border');
                    $('#password').removeClass('red-border');
                    $('#password_error').addClass('d-none');

                    Swal.fire({
                        icon: 'success',
                        title: 'Secretaria Agregada Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })

                    $('#table').append("<tr class='post" + data.id + "'>" +
                        "<td>" + data.id + "</td>" +
                        "<td>" + data.name + "</td>" +
                        "<td>" + data.apellido_paterno + "</td>" +
                        "<td>" + data.apellido_materno + "</td>" +
                        "<td>" + data.email + "</td>" +
                        "<td>  No asignado    </td>" +
                        "<td>" + "<div class='switch'>"+
                                "<label>"+
                                    Activo
                                    +"<input type='checkbox' checked readonly='readonly' onclick='javascript: return false;'>"+
                                +"</label>"
                               +"</div>" 
                        + "</td>" +
                        "<td align='center'>" +
                        "<button type='button' style='margin-right:3px;'  class='show-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'" +
                        "data-apellido_paterno='" + data.apellido_paterno + "'><i class='fa fa-eye'></i></button>" +
                        "<button type='button' style='margin-right:3px;' class='btn btn-danger btn-sm' data-idorganizacion='" + data.idorganizacion + "'><i class='fa fa-pencil-alt'></i></button>" +
                        "<button type='button' style='margin-right:3px;' class='btn btn-info btn-sm' data-id='" + data.id + "'><i class='fa fa-eraser'></i></button>" +
                        "</td>" +
                        "</tr>");
                        
                }
            },
        });

    });

     //Funcion para agregar un nuevo vendedor se valida antes que haya un permiso disponible
     $("#agregar_vendedor").click(function(){
        
        $.ajax({
            type: 'POST',
            url: '/Vendedores/insertar',
            data: {
                '_token': $('input[name=_token]').val(),
                'rfc': $('input[name=rfc]').val(),
                'curp': $('textarea[name=curp]').val(),
                'id_permiso':$('input[name=id_permiso]').val(),

            },
            dataType:'json',
            success: function(data) {
                if ((data.errors)) {
                    $.each( data.errors, function( key, value ) {
                        console.log(key);
                        console.log(value);
                    });

                } else {
                
                    var registros=document.getElementById("table").rows.length;

                    Swal.fire({
                        icon: 'success',
                        title: 'Vendedor Creado Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }     
            },
        });

    
    });

    $("#btn_siguiente").click(function(){
        $("#paso1").hide();
        $("#paso2").show();
        $("#siguiente").hide();
        $("#guardar").show();
    });

    $("#btn_anterior").click(function(){
        $("#paso2").hide();
        $("#paso1").show();
        $("#siguiente").show();
        $("#guardar").hide();
    });

    //Funcion para agregar una organizacion
    $("#agregar_organizacion").click(function() {
        
        $.ajax({
            type: 'POST',
            url: 'insertar',
            data: {
                '_token': $('input[name=_token]').val(),
                'nombre_organizacion': $('input[name=nombre_organizacion]').val(),
                'nombre_dirigente': $('input[name=nombre_dirigente]').val()
            },
            dataType:'json',
            success: function(data) {
                $('#nombre_organizacion').addClass('green-border');
                $('#nombre_dirigente').addClass('green-border');
                $('#nombre_organizacion_error').addClass('d-none');
                $('#nombre_dirigente_error').addClass('d-none');
                if ((data.errors)) {
                    
                    $.each( data.errors, function( key, value ) {
                        var ErrorId='#'+key+'_error';
                        var aux='#'+key;
                        $(aux).removeClass('green-border');
                        $(aux).addClass('red-border');
                        $(ErrorId).removeClass('d-none');
                        $(ErrorId).text(value);
                    });

                } else {
                    $('#nombre_organizacion').val('');
                    $('#nombre_dirigente').val('');
                    $('#nombre_organizacion').removeClass('green-border');
                    $('#nombre_dirigente').removeClass('green-border');

                    var registros=document.getElementById("table").rows.length;

                    Swal.fire({
                        icon: 'success',
                        title: 'Organizacion agregada correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })

                     $('#create_organizacion').modal('hide');


                    if(registros<11){
                        $('#table').append("<tr class='post" + data.id + "'>" +
                            "<td>" + data.id + "</td>" +
                            "<td>" + data.nombre_organizacion + "</td>" +
                            "<td>" + data.nombre_dirigente + "</td>" +
                            "<td>" + data.id + "</td>" +
                            "<td align='center'>" +
                            "<button type='button' style='margin-right:3px;'  class='show-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-nombre_organizacion='" + data.nombre_organizacion + "'" +
                            "data-nombre_dirigente='" + data.nombre_dirigente + "'><i class='fa fa-eye'></i></button>" +
                            "<button type='button' style='margin-right:3px;' class='btn btn-danger btn-sm' data-idorganizacion='" + data.idorganizacion + "'><i class='fa fa-pencil-alt'></i></button>" +
                            "<button type='button' style='margin-right:3px;' class='btn btn-info btn-sm' data-id='" + data.id + "'><i class='fa fa-eraser'></i></button>" +
                            "</td>" +
                        "</tr>");
                        
                    }   
                }     
            },
        });
    });

    
    //Funcion para actualizar una organizacion
    $('.modal-footer').on('click', '.actualizar_organizacion', function() {
        $.ajax({
        type: 'POST',
        url: 'editar',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#id_update").val(),
            'nombre_organizacion': $('#nombre_organizacion_update').val(),
            'nombre_dirigente': $('#nombre_dirigente_update').val()
        },
        success: function(data) {
                $('.post' + data.id).replaceWith(" "+
                "<tr class='post" + data.id + "'>"+
                    "<td>" + data.id + "</td>"+
                    "<td>" + data.nombre_organizacion + "</td>"+
                    "<td>" + data.nombre_dirigente + "</td>"+
                    "<td>" + data.id + "</td>"+
                    "<td align='center'>" +
                                    "<button type='button' style='margin-right:3px;'  class='show-modal btn btn-warning btn-sm' data-id='" 
                                     + data.id + "' data-nombre_organizacion='" + data.nombre_organizacion + "'" +
                                    "data-nombre_dirigente='" + data.nombre_dirigente + "'><i class='fa fa-eye'></i></button>" +
                                    "<button type='button' style='margin-right:3px;'  class='edit-modal btn btn-danger btn-sm' data-id='" 
                                    + data.id + "' data-nombre_organizacion='" + data.nombre_organizacion + "'" +
                                    "data-nombre_dirigente='" + data.nombre_dirigente + "'><i class='fa fa-pencil'></i></button>" +
                                    "<button type='button' style='margin-right:3px;'  class='delete-modal btn btn-info btn-sm' data-id='" 
                                    + data.id + "' data-nombre_organizacion='" + data.nombre_organizacion + "'" +
                                    "data-nombre_dirigente='" + data.nombre_dirigente + "'><i class='fa fa-eraser'></i></button>" +
                    "</td>" +
                "</tr>");
            }
            });
    });


    //Funcion para mostrar los municipios dependiendo del estado seleccionado
    $('#estado').change(function(){
        var estado = $(this).val();
        $.get('municipioEstado/'+estado, function(data){
            var municipio_select = '<option value="" selected disabled>Seleccione su municipio</option>'
              for (var i=0; i<data.length;i++)
                municipio_select+='<option value="'+data[i].id_municipio+'">'+data[i].nombre+'</option>';
  
              $("#id_municipio").html(municipio_select);
        });
    });

    $('#observacion').change(function(){
        var id=$(this).val();
        $('#table_seguimiento tbody').empty();
        $.get('seguimiento/'+id, function(data){

                if(data.length==0){
                    $('#table_seguimiento').append("<tr>" +
                    "<td colspan='5' align='center' >No hay registros</td>"
                    +"</tr>");
                }

              for (var i=0; i<data.length;i++){  
                
                $('#table_seguimiento').append("<tr class='post" + data[i].id + "'>" +
                    "<td>" + data[i].id + "</td>" +
                    "<td>" + data[i].mensaje + "</td>" +
                    "<td>" + data[i].status + "</td>" +
                    "<td>" + data[i].id_observacion + "</td>" +
                    "<td align='center'>" +
                    "<button type='button' style='margin-right:3px;'  class='show-modal btn btn-warning btn-sm' data-id='" + data[i].id + "' data-nombre_organizacion='" + data[i].id + "'" +
                    "data-nombre_dirigente='" + data[i].mensaje + "'><i class='fa fa-eye'></i></button>" +
                    "<button type='button' style='margin-right:3px;' class='btn btn-danger btn-sm' data-idorganizacion='" + data[i].id + "'><i class='fa fa-pencil-alt'></i></button>" +
                    "<button type='button' style='margin-right:3px;' class='btn btn-info btn-sm' data-id='" + data[i].id + "'><i class='fa fa-eraser'></i></button>" +
                    "</td>" +
                "</tr>");
              }

        });
    });

    //Funcion para mostrar los detalles de un permiso en los inputs
    $('#id_permiso').change(function(){
        $('#datos_permiso').show();
        var id = $(this).val();
        $.get('/Permisos/detalle/'+id, function(data){
           
          var actividad=data[0].tipo_actividad;
          var tipo;
          if(actividad==1){
            tipo="Comercial Movil";
          }else if(actividad==2){
            tipo="Comercial Semifija";
          }else if(actividad==3){
            tipo="Comercial Movil Con Equipo Rodante";
          }else if(actividad==4){
            tipo="Comercial Fija";
          }else if(actividad==5){
            tipo="Comercios Establecidos";
          }else if(actividad==6){
            tipo="Tianguis";
          }else if(actividad==7){
            tipo="Prestacion De Servicios";
          }
          $('#actividad_permiso').val(tipo);  
          //$('#id_usuario').val(data[0].id_usuario);  
        });
    });

    //Funcion pora mostrar el formulario de responder una observacion si el usuario presiona la casilla de responder
    $('#responder_observacion').change(function() {
        if(this.checked) {
            $('#div_responder').show();
            $('#div_enviar').show();
        }else{
            $('#div_responder').hide();
            $('#div_enviar').hide();
        }     
    });

});

/******************************************* PERMISOS *****************************************************/
    //Funcion para que al dar click en el boton de sancion aparezca la ventana modal
    $(document).on('click','.asignar-sancion',function(){
        $('#asignar_sancion').modal('show');
        $('#id_permiso_sancion').val($(this).data('id'));
    });

    $(document).on('click','.detalles-organizacion',function(){
        $('#show_detalles').modal('show');
        var id=$(this).data('id');

        $('#table_organizacion_vendedor tbody').empty();
        $.get('/Organizaciones/detalle/'+id, function(data){

            /*if(data.length==0){
                $('#table_organizacion_vendedor').append("<tr>" +
                "<td colspan='5' align='center' >No hay registros</td>"
                +"</tr>");
            }*/

          for (var i=0; i<data.length;i++){  
            
            $('#table_organizacion_vendedor').append("<tr class='post" + data[i].id + "'>" +
                "<td style='width: 15%'>" + data[i].id + "</td>" +
                "<td style='width: 20%'>" + data[i].rfc + "</td>" +
                "<td style='width: 30%'>" + data[i].curp + "</td>" +
                "<td style='width: 10%'>" + data[i].id_permiso + "</td>" +
                "<td style='width: 25%' align='center'>" +
                "<button type='button' style='margin-right:3px;'  class='show-modal-organizacion-vendedor btn btn-warning btn-sm' data-id='" + data[i].id + "' data-nombre='" + data[i].name + "'" +
                "data-apellido-paterno='" + data[i].apellido_paterno + "' data-apellido-materno='" + data[i].apellido_materno + "' data-registro='" + data[i].created_at + "'  data-sexo='" + data[i].sexo + "'><i class='fa fa-eye'></i></button>" +
                /*"<button type='button' style='margin-right:3px;' class='btn btn-danger btn-sm' data-idorganizacion='" + data[i].id + "'><i class='fa fa-pencil-alt'></i></button>" +
                "<button type='button' style='margin-right:3px;' class='btn btn-info btn-sm' data-id='" + data[i].id + "'><i class='fa fa-eraser'></i></button>" +*/
                "</td>" +
            "</tr>");
          }

    });
       
    });

    $(document).on('click','.show-modal-organizacion-vendedor',function(){
        $('#show_organizacion_vendedor').modal('show');
        $('#nombre_show').text($(this).data('nombre'));
        $('#apellido_paterno_show').text($(this).data('apellido-paterno'));
        $('#apellido_materno_show').text($(this).data('apellido-materno'));
        $('#fecha_show').text($(this).data('registro'));
        if($(this).data('sexo')=='H'){
            $('#sexo_show').text('Hombre');
        }else
         $('#sexo_show').text('Mujer');

    });

    $(document).on('click','.responder-observacion',function(){
        $('#show_observacion').modal('show');
        $('#id_observacion').text($(this).data('id'));
        $('#nombre_observacion').text($(this).data('nombre'));
        $('#apellido_observacion').text($(this).data('apellido_paterno'));
        $('#motivo_observacion').text($(this).data('motivo'));
        $('#email_observacion').text($(this).data('email'));

    });
    

    //Funcion para que al dar click en el boton de cancelacion aparezca la ventana modal
    $(document).on('click','.asignar-cancelacion',function(){
        $('#asignar_cancelacion').modal('show');
        $('#id_permiso_cancelacion').val($(this).data('id'));
    });

    /*Funcion para que al dar click en el boton de reevalidacion 
    aparezca la ventana modal y te pregunte si deseas reevalidar el permiso*/ 
    $(document).on('click','.asignar-reevalidacion',function(){
        $('#asignar_reevalidacion').modal('show');
        $('#id_permiso_reevalidacion').text($(this).data('id'));
        $('#id_revalidacion').val($(this).data('id'));
    });

    //Funcion para cambiar el valor del slider y mostrar la medida seleccionada
    $(function(){
        var $valueSpan = $('.valueSpan');
        var $value = $('#largo');
        $valueSpan.html($value.val()+"  Metro(s)");
        $value.on('input change', () => {

            $valueSpan.html($value.val()+"  Metro(s)");
        });

        var $valueSpan2 = $('.valueSpan2');
        var $value2 = $('#ancho');
        $valueSpan2.html($value2.val()+"  Metro(s)");
        $value2.on('input change', () => {

        $valueSpan2.html($value2.val()+"  Metro(s)");
        });

    });

     /**FUNCION que muestra el selector de fechas */
    $('.fj-date').datepicker({
        language: "es",
        format: "yyyy/mm/dd",
        endDate: "-18Y",
        autoclose: true
    });

      /**Selector de fecha de vencimiento */
    $('.fj-date-vencimiento').datepicker({
        language: "es",
        format: "yyyy/mm/dd",
        startDate: "+5d",
        autoclose: true
    });

    //Funcion para mostrar los detalles de un permiso
    $('#show_permiso').on('shown.bs.modal', function(e) {
        var latitud=$(e.relatedTarget).data('latitud');
        var longitud=$(e.relatedTarget).data('longitud');
        var id=$(e.relatedTarget).data('id');
        var cuenta=$(e.relatedTarget).data('numero_cuenta');
        var expediente=$(e.relatedTarget).data('numero_expediente');
        var actividad=$(e.relatedTarget).data('tipo_actividad');
        var giro=$(e.relatedTarget).data('giro');
        var laborales=$(e.relatedTarget).data('dias_laborados');
        var inicio=$(e.relatedTarget).data('hora_inicio');
        var fin=$(e.relatedTarget).data('hora_fin');
        $('#id').text(id);
        $('#numero_cuenta_show').text(cuenta);
        $('#numero_expediente_show').text(expediente);
        $('#actividad_show').text(actividad);
        $('#giro_show').text(giro);
        $('#laborales_show').text(laborales);
        $('#inicio_show').text(inicio);
        $('#fin_show').text(fin);
        
        agregarMarcador(latitud,longitud);
    });

    //Funcion para mostrar la ventana para registrar un nuevo permiso
    $('#create_permiso').on('shown.bs.modal', function() {
       limpiarCamposPermiso();
        agregarPosicion();
        
    });

    //Funcion que muestra la zona de comercializacion en un mapa modal
    $('#show_zona').on('shown.bs.modal',function(e){
        var aux =$(e.relatedTarget).data('id');
        $('#id_zona_update').val(aux);
        cargarMapa(aux);
        //map.resize();
    });

    //Funcion para asignar un tipo de permiso a los permisos pendientes que hay en los registros
    $('#asignar_tipo_permiso').on('shown.bs.modal', function(e) {
        limpiarCamposTipoPermiso();
        mapaUbicacionFin();
        var id_permiso=$(e.relatedTarget).data('id-permiso');
        $('#id_permiso').val(id_permiso);
    });


    //Funcion para desplegar las opciones dependiendo del radio seleccionado
    $("input[type=radio]").click(function(event){
        var valor = $(event.target).val();
       
        if(valor =="Anual"){
            limpiarCamposTipoPermiso();
            $("#div1").show();
            $("#div2").hide();
            $("#div3").hide();
        } else if (valor == "Eventual") {
            limpiarCamposTipoPermiso();
            $("#div1").hide();
            $("#div2").show();
            $("#div3").hide();
        } else if(valor=="Provisional") { 
            limpiarCamposTipoPermiso();
            $("#div1").show();
            $("#div2").hide();
            $("#div3").show();
        }
    });

    /**Funcion para crear el seguimiento de una nueva observacion ya sea una queja o una sugerencia */
    $('#agregar_seguimiento_observacion').click(function(){
        
        $.ajax({
            type: 'POST',
            url: '/Observaciones/responder',
            data: {
                '_token': $('input[name=_token]').val(),
                'mensaje': $('textarea[name=mensaje]').val(),
                'status': $('input:radio[name=radioStatus]:checked').val(),
                'id_observacion':$('#id_observacion').text(),

            },
            dataType:'json',
            success: function(data) {
                if ((data.errors)) {
                    $.each( data.errors, function( key, value ) {
                        console.log(key);
                        console.log(value);
                    });

                } else {
                

                    Swal.fire({
                        icon: 'success',
                        title: 'Respuesta Enviada Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    location.reload();
                }     
            },
        });
    });

    /*Funcion para asignar que tipo de permiso sera el anteriormente creado
    ya sea Anual, provisional o Eventual*/
    $('#agregar_tipo_permiso').click(function(e){
        var seleccionado=$('input:radio[name=radioTipo]:checked').val();
        var ancho = $('#ancho').val();
        var otraOpcion='';
        var utensilios = '';  
        var total_utensilios=0;  
        $('#formulario_asignar input[type=checkbox]').each(function(){
            if (this.checked) {
                utensilios += $(this).val()+', ';
                total_utensilios++;
            }
        }); 

        if( $('#otra').prop('checked') ) {
        otraOpcion=$('input[name=otraOpcion]').val()
        utensilios+=otraOpcion;
        }

        if(seleccionado=='Anual'){
            
            $.ajax({
                type: 'POST',
                url: '/insertarAnuales',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'largo': $('#largo').val(),
                    'ancho': ancho,
                    'utensilios':utensilios,
                    'id_permiso':$('input[name=id_permiso]').val(),
                },
                dataType:'json',
                success: function(data) {
                    mensajesPermiso();
                    if ((data.errors)) {
                        if(total_utensilios==0){
                            
                            $('#utensilios').removeClass('green-border');
                            $('#utensilios').addClass('red-border');
                            $('#utensilios_error').removeClass('d-none');
                            $('#utensilios_error').text('El campo utensilios es obligatorio');
                        }
                    } else {
                    
                        var registros=document.getElementById("table").rows.length;

                        Swal.fire({
                            icon: 'success',
                            title: 'Tipo Asignado Correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }     
                },
            });

        }else if(seleccionado=='Eventual'){

            $.ajax({
                type: 'POST',
                url: '/Eventuales/insertar',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'largo': $('#largo').val(),
                    'ancho': ancho,
                    'utensilios':utensilios,
                    'id_permiso':$('input[name=id_permiso]').val(),
                },
                dataType:'json',
                success: function(data) {
                    mensajesPermiso();
                    if ((data.errors)) {
                        $.each( data.errors, function( key, value ) {
                            console.log(key);
                            console.log(value);
                        });

                    } else {
                    
                        var registros=document.getElementById("table").rows.length;

                        Swal.fire({
                            icon: 'success',
                            title: 'Tipo Asignado Correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        })

                    }     
                },
            });
        }else if(seleccionado=='Provisional'){
            $.ajax({
                type: 'POST',
                url: '/Provisionales/insertar',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'largo': $('#largo').val(),
                    'ancho': ancho,
                    'utensilios':utensilios,
                    'fecha_vencimiento':$('input[name=fecha_vencimiento]').val(),
                    'id_permiso':$('input[name=id_permiso]').val(),
                },
                dataType:'json',
                success: function(data) {
                    mensajesPermiso();
                    if ((data.errors)) {
                        $.each( data.errors, function( key, value ) {
                            var ErrorId='#'+key+'_error';
                            var aux='#'+key;
                            $(aux).removeClass('green-border');
                            $(aux).addClass('red-border');
                            $(ErrorId).removeClass('d-none');
                            $(ErrorId).text(value);
                        });
                    } else {
                    
                        var registros=document.getElementById("table").rows.length;

                        Swal.fire({
                            icon: 'success',
                            title: 'Tipo Asignado Correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        })

                    }     
                },
            });    
        }
    });

    //Funcion para asignrar una sancion al permiso seleccionado
    $('#agregar_sancion').click(function(){
        
        $.ajax({
            type: 'POST',
            url: '/Sanciones/insertar',
            data: {
                '_token': $('input[name=_token]').val(),
                'multa': $('input[name=multa]').val(),
                'motivo': $('textarea[name=motivo]').val(),
                'id_permiso':$('input[name=id_permiso_sancion]').val(),

            },
            dataType:'json',
            success: function(data) {
                if ((data.errors)) {
                    $.each( data.errors, function( key, value ) {
                        console.log(key);
                        console.log(value);
                    });

                } else {
                
                    var registros=document.getElementById("table").rows.length;

                    Swal.fire({
                        icon: 'success',
                        title: 'Sancion Creada Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }     
            },
        });
    });

    //Funcion para asignar una cancelacion a un permiso determinado
    $("#agregar_cancelacion").click(function(){
    
        $.ajax({
            type: 'POST',
            url: '/Cancelaciones/insertar',
            data: {
                '_token': $('input[name=_token]').val(),
                'observaciones': $('textarea[name=observaciones]').val(),
                'motivo_cancelacion': $('textarea[name=motivo_cancelacion]').val(),
                'id_permiso':$('input[name=id_permiso_cancelacion]').val(),

            },
            dataType:'json',
            success: function(data) {
                if ((data.errors)) {
                    $.each( data.errors, function( key, value ) {
                        console.log(key);
                        console.log(value);
                    });

                } else {
                
                    var registros=document.getElementById("table").rows.length;

                    Swal.fire({
                        icon: 'success',
                        title: 'Cancelacion Creada Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }     
            },
        });
    });

    //Funcion para agregar un nuevo permiso e insertar el registro en la base de datos
    $("#agregar_permiso").click(function(){
        var actividad=$('#tipo_actividad option:selected').val();
        var dias = '';    
        var total_dias;
        $('#formulario input[type=checkbox]').each(function(){
            if (this.checked) {
                dias += $(this).val()+', ';
                total_dias++;
            }
        }); 

        $.ajax({
            type: 'POST',
            url: '/Permisos/insertar',
            data: {
                '_token': $('input[name=_token]').val(),
                'numero_cuenta': $('input[name=numero_cuenta]').val(),
                'numero_expediente': $('input[name=numero_expediente]').val(),
                'tipo_actividad': actividad,
                'giro': $('input[name=giro]').val(),
                'latitud': $('input[name=latitud]').val(),
                'longitud': $('input[name=longitud]').val(),
                'dias_laborados': dias,
                'hora_inicio': $('input[name=hora_inicio]').val(),
                'hora_fin': $('input[name=hora_fin]').val(),
                'detalles': $('textarea[name=detalles]').val(),
            },
            dataType:'json',
            success: function(data) {
                mensajesPermiso();
                if ((data.errors)) {
                    
                    $.each( data.errors, function( key, value ) {
                        var ErrorId='#'+key+'_error';
                        var aux='#'+key;
                        $(aux).removeClass('green-border');
                        $(aux).addClass('red-border');
                        $(ErrorId).removeClass('d-none');
                        $(ErrorId).text(value);
                    });

                    if(actividad=="ninguna"){
                        $(tipo_actividad).removeClass('green-border');
                        $(tipo_actividad).addClass('red-border');
                        $(tipo_actividad).removeClass('d-none');
                        $(tipo_actividad_error).text('Seleccione una actividad');
                    }

                } else {
                    limpiarCamposPermiso();
                

                    Swal.fire({
                        icon: 'success',
                        title: 'Permiso Agregado Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    //$('#create_organizacion').modal('hide');


                    /*if(registros<11){
                        $('#table').append("<tr class='post" + data.id + "'>" +
                            "<td>" + data.id + "</td>" +
                            "<td>" + data.nombre_organizacion + "</td>" +
                            "<td>" + data.nombre_dirigente + "</td>" +
                            "<td>" + data.id + "</td>" +
                            "<td align='center'>" +
                            "<button type='button' style='margin-right:3px;'  class='show-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-nombre_organizacion='" + data.nombre_organizacion + "'" +
                            "data-nombre_dirigente='" + data.nombre_dirigente + "'><i class='fa fa-eye'></i></button>" +
                            "<button type='button' style='margin-right:3px;' class='btn btn-danger btn-sm' data-idorganizacion='" + data.idorganizacion + "'><i class='fa fa-pencil-alt'></i></button>" +
                            "<button type='button' style='margin-right:3px;' class='btn btn-info btn-sm' data-id='" + data.id + "'><i class='fa fa-eraser'></i></button>" +
                            "</td>" +
                        "</tr>");
                        
                    } */  
                }     
            },
        });
    });
    
    //Funcion para asignar una revalidacion al permiso que se haya seleccionado
    $("#agregar_reevalidacion").click(function(){
    
        $.ajax({
            type: 'POST',
            url: '/Revalidaciones/insertar',
            data: {
                '_token': $('input[name=_token]').val(),
                'monto': $('input[name=monto]').val(),
                'id_permiso':$('input[name=id_revalidacion]').val(),

            },
            dataType:'json',
            success: function(data) {
                if ((data.errors)) {
                    $.each( data.errors, function( key, value ) {
                        console.log(key);
                        console.log(value);
                    });

                } else {
                
                    var registros=document.getElementById("table").rows.length;

                    Swal.fire({
                        icon: 'success',
                        title: 'Se Ha Actualizado Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }     
            },
        });
    });


/********************************************ORGANIZACIONES************************************************ */

//Funcuion para crear la ventana modal para agregar una organizacion
$(document).on('click', '.create-modal', function() {
    $('#create_organizacion').modal('show');
    
});

$(document).on('click', '.create-modal-administrativo', function() {
    $('#create_administrativo').modal('show');    
});


//Funcuion para mostrar la ventana modal para crear un permiso
$(document).on('click', '.create-modal-vendedor', function() {
    var total=$(this).data('total');
    if(total==0){
        Swal.fire({
            icon: 'error',
            title: 'No hay permisos creados',
            showConfirmButton: true
        })
    }else {
        $('#create_vendedor').modal('show');
    }
    
});

//Funcion para mostrar los datos de la organizacion
$(document).on('click', '.show-modal', function() {
    $('#show_organizacion').modal('show');
    $('#id').text($(this).data('id'));
    $('#nombre_organizacion_show').text($(this).data('nombre_organizacion'));
    $('#nombre_dirigente_show').text($(this).data('nombre_dirigente'));
    $('#show').modal('show');

});

//Funcion para mostrar la ventana modal para actualizar la organizacion
$(document).on('click','.edit-modal',function(){
    $('#update_organizacion').modal('show');
    $('#id_update').val($(this).data('id'));
    $('#nombre_organizacion_update').val($(this).data('nombre_organizacion'));
    $('#nombre_dirigente_update').val($(this).data('nombre_dirigente'));
    $('#show').modal('show');
});

//Funcion para mostrar la ventana modal para eliminar una organizacion
$(document).on('click', '.delete-modal', function() {
    $('#delete_organizacion').modal('show');
    $('#show').modal('show');
    
});

//Funcion para limpiar los datos de la ventana modal al cerrarla
$('#create_organizacion').on('hidden.bs.modal', function(){ 
    $('#form_organizaciones')[0].reset();

    $('#nombre_organizacion_error').empty();
    $('#nombre_dirigente_error').empty();
    $('#nombre_organizacion').removeClass('green-border');
    $('#nombre_organizacion').removeClass('red-border');
    $('#nombre_dirigente').removeClass('green-border');
    $('#nombre_dirigente').removeClass('red-border');
});



/******************************************** USUARIOS ************************************************ */
$(document).on('click', '.create-modal', function() {
    $('#create_usuario').modal('show');
});

$(document).on('click','.show-modal-usuario',function(){
    $('#show_usuario').modal('show');
    $('#id').text($(this).data('id'));
    $('#nombre_usuario_show').text($(this).data('nombre'));
    $('#paterno_show').text($(this).data('apellido_paterno'));
    $('#materno_show').text($(this).data('apellido_materno'));
    $('#email_show').text($(this).data('email'));
});


$(document).on('click', '.role-usuario', function() {
    $('#role_usuario').modal('show');
    $('#id_usuario').val($(this).data('id'));
});

$('#create_usuario').on('hidden.bs.modal', function(){ 
    $('#name').val('');
    $('#apellido_paterno').val('');
    $('#apellido_materno').val('');
    $('#fecha_nacimiento').val('');
    $('#email').val('');
    $('#password').val('');
    $('#sexo').prop('selectedIndex',0);
    $('#id_municipio').prop('selectedIndex',0);

    $('#name').removeClass('green-border');
    $('#name').removeClass('red-border');
    $('#name_error').addClass('d-none');
    $('#apellido_paterno').removeClass('green-border');
    $('#apellido_paterno').removeClass('red-border');
    $('#apellido_paterno_error').addClass('d-none');
    $('#apellido_materno').removeClass('green-border');
    $('#apellido_materno').removeClass('red-border');
    $('#apellido_materno_error').addClass('d-none');
    $('#fecha_nacimiento').removeClass('green-border');
    $('#fecha_nacimiento').removeClass('red-border');
    $('#fecha_nacimiento_error').addClass('d-none');
    $('#sexo').removeClass('green-border');
    $('#sexo').removeClass('red-border');
    $('#sexo_error').addClass('d-none');
    $('#estado').removeClass('green-border');
    $('#estado').removeClass('red-border');
    $('#estado_error').addClass('d-none');
    $('#id_municipio').removeClass('green-border');
    $('#id_municipio').removeClass('red-border');
    $('#id_municipio_error').addClass('d-none');
    $('#email').removeClass('green-border');
    $('#email').removeClass('red-border');
    $('#email_error').addClass('d-none');
    $('#password').removeClass('green-border');
    $('#password').removeClass('red-border');
    $('#password_error').addClass('d-none');
});


//Funcion para agregar un pageloader
window.onload=function(){
    //alert("hola");
    $('#onload').fadeOut();
    $('#carga').fadeOut();
    $('body').removeClass('hidden');
    $('div').removeClass('hidden');
}

$(function (){
    $('#seleccionar-todos').change(function() {
      $('#checkbox > label >input[type=checkbox]').prop('checked', $(this).is(':checked'));
    });
  });

function mensajesPermiso(){
    $('#numero_cuenta').addClass('green-border');
    $('#numero_expediente').addClass('green-border');
    $('#tipo_actividad').addClass('green-border');
    $('#giro').addClass('green-border');
    $('#dias_laborados').addClass('green-border');
    $('#giro').addClass('green-border');
    $('#hora_inicio').addClass('green-border');
    $('#hora_fin').addClass('green-border');
    $('#detalles').addClass('green-border');

    $('#numero_cuenta_error').addClass('d-none');
    $('#numero_expediente_error').addClass('d-none');
    $('#tipo_actividad_error').addClass('d-none');
    $('#giro_error').addClass('d-none');
    $('#dias_laborados_error').addClass('d-none');
    $('#giro_error').addClass('d-none');
    $('#hora_inicio_error').addClass('d-none');
    $('#hora_fin_error').addClass('d-none');
    $('#detalles_error').addClass('d-none');
    
}

function limpiarCamposPermiso(){
    $('#numero_cuenta').val('');
    $('#numero_expediente').val('');
    $('#tipo_actividad').prop('selectedIndex',0);
    $('#giro').val('');
    $('#checkbox > label >input[type=checkbox]').prop('checked', false);
    $('#hora_inicio').val('');
    $('#hora_fin').val('');
    $('#detalles').val('');
    $('#numero_cuenta').removeClass('green-border');
    $('#numero_cuenta').removeClass('red-border');
    $('#numero_cuenta_error').addClass('d-none');

    $('#numero_expediente').removeClass('green-border');
    $('#numero_expediente').removeClass('red-border');
    $('#numero_expediente_error').addClass('d-none');

    $('#tipo_actividad').removeClass('green-border');
    $('#tipo_actividad').removeClass('red-border');
    $('#tipo_actividad_error').addClass('d-none');

    $('#giro').removeClass('green-border');
    $('#giro').removeClass('red-border');
    $('#giro_error').addClass('d-none');

    $('#dias_laborados_error').addClass('d-none');
    $('#hora_inicio_error').addClass('d-none');
    $('#hora_fin_error').addClass('d-none');
    $('#detalles').removeClass('green-border');
    $('#detalles').removeClass('red-border');
    $('#detalles_error').addClass('d-none');
}

function limpiarCamposTipoPermiso(){
    $('#utensilios').removeClass('green-border');
    $('#utensilios').removeClass('red-border');
    $('#utensilios_error').addClass('d-none');

    $('#fecha_vencimiento').removeClass('green-border');
    $('#fecha_vencimiento').removeClass('red-border');
    $('#fecha_vencimiento_error').addClass('d-none');
}

//Funcion para que aparezca otra opcion para que el administrador eliga otro utensislio que no aparezca en la lista
function opcionOtra(){
    var check=document.getElementById("otra");
    if(check.checked){
        $("#div4").show();
    }else if(!check.checked){
        $("#div4").hide();
    }
}

