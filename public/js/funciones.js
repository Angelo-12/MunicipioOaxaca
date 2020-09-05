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

                      location.reload();
                        
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
                        title: 'Secretari@ agregada correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })
                     
                      location.reload();   
                }
            },
        });

    });

     //Funcion para agregar un nuevo vendedor se valida antes que haya un permiso disponible
    $("#agregar_vendedor").click(function(){
        var aux=$('#id_organizacion option:selected').val();
        var aux2=$('#id_permiso option:selected').val();
        var sexo=$('#sexo option:selected').val();

        $.ajax({
            type: 'POST',
            url: '/Vendedores/insertar',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=nombre]').val(),
                'apellido_paterno': $('input[name=apellido_paterno]').val(),
                'apellido_materno': $('input[name=apellido_materno]').val(),
                'sexo': sexo,
                'fecha_nacimiento': $('input[name=fecha_nacimiento]').val(),
                'email': $('input[name=email]').val(),
                'password': $('input[name=password]').val(),
                'id_municipio': $('select[name=id_municipio]').val(),
                'rfc': $('input[name=rfc]').val(),
                'curp': $('input[name=curp]').val(),
                'id_organizacion':aux,
                'id_permiso':aux2,

            },
            dataType:'json',
            success: function(data) {
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

                    Swal.fire({
                        icon: 'success',
                        title: 'Vendedor creado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    location.reload();
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
    $('#agregar_organizacion').click(function() {
        
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

                     location.reload();
                }     
            },
        });
    });

    $('.modal-footer').on('click','.actualizar-usuario',function(){
        var status=$('input:radio[name=radioStatus]:checked').val();
        $.ajax({
            type: 'POST',
            url: '/Usuarios/editar',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('input[name=id2]').val(),
                'name': $('input[name=nombre2]').val(),
                'apellido_paterno': $('input[name=paterno2]').val(),
                'apellido_materno': $('input[name=materno22]').val(),
                'sexo': 'H',
                'fecha_nacimiento': '1996-02-11',
                'id_municipio': '10',
                'email': $('input[name=email2]').val(),    
                'status': status,    
            },
            dataType:'json',
            success: function(data) {
               
                if ((data.errors)) {
                    
                    $.each( data.errors, function( key, value ) {
                       console.log(value);
                    });

                } else {

                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario actualizado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })

                    location.reload();
                }     
            },
        });
    })

    $('.modal-footer').on('click','.actualizar-usuario-administrativo',function(){
        var status=$('input:radio[name=radioStatusAdministrativo]:checked').val();

        console.log(status);

        $.ajax({
            type: 'POST',
            url: '/Usuarios/editar',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('input[name=id2]').val(),
                'name': $('input[name=nombre2]').val(),
                'apellido_paterno': $('input[name=paterno2]').val(),
                'apellido_materno': $('input[name=materno22]').val(),
                'sexo': 'H',
                'fecha_nacimiento': '1996-02-11',
                'id_municipio': '10',
                'email': $('input[name=email2]').val(),    
                'status': status,    
            },
            dataType:'json',
            success: function(data) {
               
                if ((data.errors)) {
                    
                    $.each( data.errors, function( key, value ) {
                       console.log(value);
                    });

                } else {

                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario actualizado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })

                    location.reload();
                }     
            },
        });
    })

    $('.modal-footer').on('click','.actualizar-vendedor',function(){
        var status=$('input:radio[name=radioStatusVendedor]:checked').val();

        console.log(status);

        $.ajax({
            type: 'POST',
            url: '/Usuarios/editar',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('input[name=id2]').val(),
                'name': $('input[name=nombre2]').val(),
                'apellido_paterno': $('input[name=paterno2]').val(),
                'apellido_materno': $('input[name=materno22]').val(),
                'sexo': 'H',
                'fecha_nacimiento': '1996-02-11',
                'id_municipio': '10',
                'email': $('input[name=email2]').val(),    
                'status': status,    
            },
            dataType:'json',
            success: function(data) {
               
                if ((data.errors)) {
                    
                    $.each( data.errors, function( key, value ) {
                       console.log(value);
                    });

                } else {

                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario actualizado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })

                    location.reload();
                }     
            },
        });
    })
    
    $('#update_permiso').on('shown.bs.modal',function(e){

        $('#checkbox > label >input[type=checkbox]').prop('checked', false);

        $('#id_permiso').val($(e.relatedTarget).data('id'));
        $('#id_colonia2').val($(e.relatedTarget).data('id_colonia'));
        $('#tipo_actividad_permiso').val($(e.relatedTarget).data('tipo_actividad'));
        $('#giro_permiso').val($(e.relatedTarget).data('giro'));
        $('#hora_inicio').val($(e.relatedTarget).data('hora_inicio'));
        $('#hora_fin').val($(e.relatedTarget).data('hora_fin'));
        $('#detalles_permiso').val($(e.relatedTarget).data('detalles'));
        $('#latitud_permiso').val($(e.relatedTarget).data('latitud'));
        $('#longitud_permiso').val($(e.relatedTarget).data('longitud'));

       
        var latitud=$(e.relatedTarget).data('latitud');
        var longitud=$(e.relatedTarget).data('longitud');
        var auxiliar=$(e.relatedTarget).data('dias_laborados');
        
        var dias=auxiliar.split(',');

       for(var i=0; i<dias.length; i++){
            if(dias[i]=='Lunes'){
                $("#formulario_actualizar_permiso input[type=checkbox]").eq(0).prop("checked",true);
            }else if(dias[i]=='Martes'){
                $("#formulario_actualizar_permiso input[type=checkbox]").eq(1).prop("checked",true);
            }else if(dias[i]=='Miercoles'){
                $("#formulario_actualizar_permiso input[type=checkbox]").eq(2).prop("checked",true);
            }else if(dias[i]=='Jueves'){
                $("#formulario_actualizar_permiso input[type=checkbox]").eq(3).prop("checked",true);
            }else if(dias[i]=='Viernes'){
                $("#formulario_actualizar_permiso input[type=checkbox]").eq(4).prop("checked",true);
            }else if(dias[i]=='Sabado'){
                $("#formulario_actualizar_permiso input[type=checkbox]").eq(5).prop("checked",true);
            }else if(dias[i]=='Domingo'){
                $("#formulario_actualizar_permiso input[type=checkbox]").eq(6).prop("checked",true);
            }
       }

       mostrarPosicion(latitud,longitud);

    });

    $('.modal-footer').on('click', '.actualizar_permiso',function(){
        var actividad=$('#tipo_actividad_permiso2 option:selected').val();
        var id_colonia=$('#id_colonia_permiso option:selected').val();

        var dias = '';    
        $('#formulario_actualizar_permiso input[type=checkbox]').each(function(){
            if (this.checked) {
                dias += $(this).val()+',';
            }
        }); 

        if(actividad=="ninguna"){
            actividad=$('input[name=tipo_actividad_permiso]').val()
        }

        if(id_colonia=="ninguna"){
            id_colonia=$('input[name=id_colonia]').val()
        }


        $.ajax({
            type: 'POST',
            url: '/Permisos/editar',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('input[name=id_permiso]').val(),
                'tipo_actividad': actividad,
                'giro': $('input[name=giro_permiso]').val(),
                'latitud': $('input[name=latitud_permiso]').val(),
                'longitud':$('input[name=longitud_permiso]').val(),
                'dias_laborados': dias,
                'hora_inicio': $('input[name=hora_inicio2]').val(),
                'hora_fin': $('input[name=hora_fin2]').val(),   
                'detalles':$('textarea[name=detalles_permiso]').val(),    
                'id_colonia':id_colonia,
            },
            dataType:'json',
            success: function(data) {
               
                if ((data.errors)) {
                    
                    $.each( data.errors, function( key, value ) {
                       console.log(value);
                    });
    
                } else {
    
                    Swal.fire({
                        icon: 'success',
                        title: 'Permiso actualizado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })
    
                    location.reload();
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
                 Swal.fire({
                        icon: 'success',
                        title: 'Organizacion actualizada correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })
    
               
                location.reload();
            }
            });
    });

    /**Funcion para eliminar una organizacion solo se le cambia el status a el valor de 0 */
    $('.modal-footer').on('click','.eliminar_organizacion',function(){
        $.ajax({
            type: 'POST',
            url: 'eliminar',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#id_delete_organizacion").val(),
            },
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Organizacion eliminada correctamente',
                    showConfirmButton: false,
                    timer: 1500
                  })

                location.reload();       
            }
        });
    });

    $('.modal-footer').on('click','.eliminar_usuario',function(){
        $.ajax({
            type: 'POST',
            url: 'eliminar',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#id_delete_usuario").val(),
            },
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario eliminado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                  })

                location.reload();       
            }
        });
    });

    $('.modal-footer').on('click','.eliminar_usuario_administrativo',function(){
        $.ajax({
            type: 'POST',
            url: '/Usuarios/eliminar',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#id_delete_usuario_administrativo").val(),
            },
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario eliminado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                  })

                location.reload();       
            }
        });
    });

    $('.modal-footer').on('click','.eliminar_vendedor',function(){
        $.ajax({
            type: 'POST',
            url: '/Usuarios/eliminar',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#id_delete_vendedor").val(),
            },
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Vendedor eliminado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                  })

                location.reload();       
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

    $('#id_agencia').change(function(){
        var agencia = $(this).val();
        
        $.get('/Agencia/detalle_agencia/'+agencia, function(data){
            var colonia_select = '<option value="" selected disabled>Seleccionar colonia</option>'
              for (var i=0; i<data.length;i++)
                colonia_select+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
  
              $("#id_colonia").html(colonia_select);
        });

    });

    $('#id_agencia2').change(function(){
        var agencia = $(this).val();
        
        $.get('/Agencia/detalle_agencia/'+agencia, function(data){
            var colonia_select = '<option value="" selected disabled>Seleccionar colonia</option>'
              for (var i=0; i<data.length;i++)
                colonia_select+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
  
              $("#id_colonia2").html(colonia_select);
        });

    });

    $('#id_colonia').change(function(){
        var colonia = $(this).val();

        var latitud_centro,longitud_centro;
        var latitud_sureste,longitud_sureste;
        var latitud_noreste,longitud_noreste;

        $.get('/Colonia/dato/'+colonia, function(data){
           
              for (var i=0; i<data.length;i++){
                latitud_centro=data[i].latitud_centroC;
                longitud_centro=data[i].longitud_centroC;

                latitud_sureste=data[i].latitud_suresteC;
                longitud_sureste=data[i].longitud_suresteC;

                latitud_noreste=data[i].latitud_noresteC;
                longitud_noreste=data[i].longitud_noresteC;
              }
        
            moverCamara(latitud_noreste,longitud_noreste,latitud_sureste,longitud_sureste,latitud_centro,longitud_centro);

        });


    });

    $('#id_colonia2').change(function(){
        var colonia = $(this).val();

        var latitud_centro,longitud_centro;
        var latitud_sureste,longitud_sureste;
        var latitud_noreste,longitud_noreste;

        $.get('/Colonia/dato/'+colonia, function(data){
           
              for (var i=0; i<data.length;i++){
                latitud_centro=data[i].latitud_centroC;
                longitud_centro=data[i].longitud_centroC;

                latitud_sureste=data[i].latitud_suresteC;
                longitud_sureste=data[i].longitud_suresteC;

                latitud_noreste=data[i].latitud_noresteC;
                longitud_noreste=data[i].longitud_noresteC;
              }
        
            actualizarPosicion(latitud_noreste,longitud_noreste,latitud_sureste,longitud_sureste,latitud_centro,longitud_centro);

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
        $.get('/Permisos/dato/'+id, function(data){
           
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
          $('#giro_permiso').val(data[0].giro);  
          $('#id_usuario').val(data[0].id_usuario);  
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

    $(document).on('click','.detalles-observacion',function(){
       $('#show_detalles_observacion').modal('show');
       var id=$(this).data('id');
       $('#id_observacion2').val(id);
       $('#table_observacion_vendedor tbody').empty();
        $.get('/Observaciones/detalle/'+id, function(data){

            if(data.length==0){
                $('#table_observacion_vendedor').append("<tr>" +
                    "<td colspan='5' align='center' >No hay registros</td>"
                +"</tr>");
            }

          for (var i=0; i<data.length;i++){  
            
            $('#table_observacion_vendedor').append("<tr class='post" + data[i].id + "'>" +
                    "<td style='width: 10%'>" + data[i].id + "</td>" +
                    "<td style='width: 21%'>" + data[i].mensaje + "</td>" +
                    "<td style='width: 30.5%'>" + data[i].status + "</td>" +
                    "<td style='width: 23%; text-align:center;' >" +
                    "<button type='button' style='margin-right:3px;'  class='show-modal-organizacion-vendedor btn btn-warning btn-sm' data-id='" + data[i].id + "' data-nombre='" + data[i].name + "'" +
                    "data-apellido-paterno='" + data[i].apellido_paterno + "' data-apellido-materno='" + data[i].apellido_materno + "' data-registro='" + data[i].created_at + "'  data-sexo='" + data[i].sexo + "'><i class='fa fa-eye'></i></button>" +
                "</td>" +
            "</tr>");
            }

        });
    });

    $(document).on('click','.detalles-organizacion',function(){
        $('#show_detalles').modal('show');
        var id=$(this).data('id');
        $('#id_organizacion').val(id);
        $('#table_organizacion_vendedor tbody').empty();
        $.get('/Organizaciones/detalle/'+id, function(data){

            if(data.length==0){
                $('#table_organizacion_vendedor').append("<tr>" +
                "<td colspan='5' align='center' >No hay registros</td>"
                +"</tr>");
            }

          for (var i=0; i<data.length;i++){  
            
            $('#table_organizacion_vendedor').append("<tr class='post" + data[i].id + "'>" +
                "<td style='width: 10%'>" + data[i].id + "</td>" +
                "<td style='width: 21%'>" + data[i].rfc + "</td>" +
                "<td style='width: 30.5%'>" + data[i].curp + "</td>" +
                "<td style='width: 16%'>" + data[i].id_permiso + "</td>" +
                "<td style='width: 23%; text-align:center;' >" +
                "<button type='button' style='margin-right:3px;'  class='show-modal-organizacion-vendedor btn btn-warning btn-sm' data-id='" + data[i].id + "' data-nombre='" + data[i].name + "'" +
                "data-apellido-paterno='" + data[i].apellido_paterno + "' data-apellido-materno='" + data[i].apellido_materno + "' data-registro='" + data[i].created_at + "'  data-sexo='" + data[i].sexo + "'><i class='fa fa-eye'></i></button>" +
                /*"<button type='button' style='margin-right:3px;' class='btn btn-danger btn-sm' data-idorganizacion='" + data[i].id + "'><i class='fa fa-pencil-alt'></i></button>" +
                "<button type='button' style='margin-right:3px;' class='btn btn-info btn-sm' data-id='" + data[i].id + "'><i class='fa fa-eraser'></i></button>" +*/
                "</td>" +
            "</tr>");
          }

        });
    });

    $(document).on('click','.detalles-zona',function(){
        $('#show_detalles').modal('show');
        var id=$(this).data('id');
        $('#id_zona').val(id);
        $('#table_zona_vendedor tbody').empty();

        $.get('/Zonas/detalle/'+id, function(data){

            if(data.length==0){
                $('#table_zona_vendedor').append("<tr>" +
                    "<td colspan='5' align='center' >No hay registros</td>"
                +"</tr>");
            }

          for (var i=0; i<data.length;i++){  
            
            $('#table_zona_vendedor').append("<tr class='post" + data[i].id + "'>" +
               "<td style='width: 10%;'>" + data[i].id + "</td>" +
                "<td style='width: 21%;'>" + data[i].rfc + "</td>" +
                "<td style='width: 30.5%;'>" + data[i].curp + "</td>" +
                "<td style='width: 16%;'>" + data[i].id_permiso + "</td>" +
                "<td style='width: 23%; text-align:center;' >" +
                "<button type='button' style='margin-right:3px;'  class='show-modal-zona-vendedor btn btn-warning btn-sm' data-id='" + data[i].id + "' data-nombre='" + data[i].name + "'" +
                "data-apellido-paterno='" + data[i].apellido_paterno + "' data-apellido-materno='" + data[i].apellido_materno + "' data-registro='" + data[i].created_at + "'  data-sexo='" + data[i].sexo + "'><i class='fa fa-eye'></i></button>" +
                "</td>" +
            "</tr>");
          }

        });
    
    });

    $(document).on('click','.detalles-agencia',function(){
        $('#show_detalles').modal('show');
        var id=$(this).data('id');
        $('#id_agencia').val(id);
    
        $('#table_colonias tbody').empty();
        $.get('/Agencia/detalle/'+id, function(data){

            if(data.length==0){
                $('#table_colonias').append("<tr>" +
                    "<td colspan='5' align='center' >No hay registros</td>"
                +"</tr>");
            }

          for (var i=0; i<data.length;i++){  
            
            $('#table_colonias').append("<tr class='post" + data[i].id + "'>" +
                "<td style='width: 10%'>" + data[i].id + "</td>" +
                "<td style='width: 20%'>" + data[i].nombre + "</td>" +
                "<td style='width: 30%'>" + data[i].codigo_postal + "</td>" +
                "<td style='width: 15%'>" + data[i].total + "</td>" +
                "<td style='width: 25%'>" +
                "<button type='button' style='margin-right:3px;'  class='show-modal-colonia btn btn-warning btn-sm' data-id='" + data[i].id + 
                "' data-nombre='" + data[i].nombre + "' " +
                "data-toggle='modal' "+
                "data-target='#show_colonia' "+
                "data-longitud_noreste='" + data[i].longitud_noresteC  + 
                "' data-latitud_noreste='" + data[i].latitud_noresteC  + 
                "' data-longitud_sureste='" + data[i].longitud_suresteC  + 
                "' data-latitud_sureste='" + data[i].latitud_suresteC  + 
                "' data-longitud_centro='" + data[i].longitud_centroC  + 
                "' data-latitud_centro='" + data[i].latitud_centroC  + 
                "' data-total='" + data[i].total +
                "' data-codigo='"+data[i].codigo_postal+ "'>"+
                "  <i class='fa fa-eye'></i></button>" +
               "</td>" +
            "</tr>");
          }

        });
    });

    $(document).on('click','.detalles-actividad',function(){
        $('#show_detalles_actividad').modal('show');
        var id=$(this).data('id');
        $('#id_actividad_comercial').val(id);

        $('#table_actividad_vendedor tbody').empty();

        $.get('/Actividades/detalle/'+id, function(data){

            if(data.length==0){
                $('#table_actividad_vendedor').append("<tr>" +
                    "<td colspan='5' align='center' >No hay registros</td>"
                +"</tr>");
            }

          for (var i=0; i<data.length;i++){  
            
            $('#table_actividad_vendedor').append("<tr class='post" + data[i].id + "'>" +
                "<td style='width: 10%;'>" + data[i].id + "</td>" +
                "<td style='width: 21%;'>" + data[i].rfc + "</td>" +
                "<td style='width: 30.5%;'>" + data[i].curp + "</td>" +
                "<td style='width: 16%;'>" + data[i].id_permiso + "</td>" +
                "<td style='width: 23%;' align='center'>" +
                    "<button type='button' style='margin-right:3px;'  class='show-modal-actividad-vendedor btn btn-warning btn-sm' data-id='" + data[i].id + "' data-nombre='" + data[i].name + "'" +
                    "data-apellido-paterno='" + data[i].apellido_paterno + "' data-apellido-materno='" + data[i].apellido_materno + "' data-registro='" + data[i].created_at + "'  data-sexo='" + data[i].sexo + "'><i class='fa fa-eye'></i></button>" +
                "</td>" +
            "</tr>");
          }

        });

    });

    $(document).on('click','.show-modal-secretaria',function(){
        $('#show_secretaria').modal('show');
 
    });

    $(document).on('click','.show-modal-vendedor',function(){
         $('#show_vendedor').modal('show');

         var status=$(this).data('status');

         if(status==1){
             $('#status_show').text('Activo');
             $('#status_show').css('background','green');
         }else{
             $('#status_show').text('Inactivo');
             $('#status_show').css('background','red');
         }
       
        $('#id').text($(this).data('id'));
        $('#nombre_usuario_show').text($(this).data('nombre'));
        $('#paterno_show').text($(this).data('apellido_paterno'));
        $('#materno_show').text($(this).data('apellido_materno'));
        $('#cargo_show').text($(this).data('cargo'));
        $('#email_show').text($(this).data('email'));
    });

     //Funcion para mostrar los datos de la organizacion
    $(document).on('click', '.show-modal', function() {
        $('#show_organizacion').modal('show');
        $('#id').text($(this).data('id'));
        $('#nombre_organizacion_show').text($(this).data('nombre_organizacion'));
        $('#nombre_dirigente_show').text($(this).data('nombre_dirigente'));
        $('#show').modal('show');

    });

     //Funcion que muestra la zona de comercializacion en un mapa modal
    $('#show_zona').on('shown.bs.modal',function(e){
        var aux =$(e.relatedTarget).data('id');
        $('#id_zona_update').val(aux);
        cargarMapa(aux);
        //map.resize();
    });

      //Funcion para mostrar los detalles de una colonia
    $('#show_colonia').on('shown.bs.modal', function(e) {
        $('#nombre_show').text($(e.relatedTarget).data('nombre'));
        $('#codigo_show').text($(e.relatedTarget).data('codigo'));
        var latitudN=$(e.relatedTarget).data('latitud_noreste');
        var longitudN=$(e.relatedTarget).data('longitud_noreste');
        var latitudS=$(e.relatedTarget).data('latitud_sureste');
        var longitudS=$(e.relatedTarget).data('longitud_sureste');
        var latitudC=$(e.relatedTarget).data('latitud_centro');
        var longitudC=$(e.relatedTarget).data('longitud_centro');
     
        mostrarColonia(latitudN,longitudN,latitudS,longitudS,latitudC,longitudC);
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

        var tipo_actividad;
        if(actividad==1){
            tipo_actividad="Comercial Movil";
        }else if(actividad==2){
            tipo_actividad="Comercial Semifija";
        }else if(actividad==3){
            tipo_actividad="Comercial Movil Con Equipo Rodante";
        }else if(actividad==4){
            tipo_actividad="Comercial Fija";
        }else if(actividad==5){
            tipo_actividad="Comercios Establecidos";
        }else if(actividad==6){
            tipo_actividad="Tianguis";
        }else if(actividad==7){
            tipo_actividad="Prestacion de Servicios";
        }

        $('#id').text(id);
        $('#numero_cuenta_show').text(cuenta);
        $('#numero_expediente_show').text(expediente);
        $('#actividad_show').text(tipo_actividad);
        $('#giro_show').text(giro);
        $('#laborales_show').text(laborales);
        $('#inicio_show').text(inicio);
        $('#fin_show').text(fin);
        
        agregarMarcador(latitud,longitud);
    });

    $('#show_agencia').on('shown.bs.modal',function(e){
        var id_agencia=$(e.relatedTarget).data('id');
        var nombre=$(e.relatedTarget).data('nombre');
        var tipo=$(e.relatedTarget).data('tipo');
        var total=$(e.relatedTarget).data('total');
        var latitud=$(e.relatedTarget).data('latitud');
        var longitud=$(e.relatedTarget).data('longitud');

        console.log(id_agencia);

        mostrarAgencia(latitud,longitud);

        $('#id_ag').text(id_agencia);
        $('#nombre_agencia').text(nombre);
        $('#tipo_agencia').text(tipo);
        $('#total_colonias').text(total);
   
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

    $(document).on('click','.show-modal-zona-vendedor',function(){
        $('#show_zona_vendedor').modal('show');
        $('#nombre_show').text($(this).data('nombre'));
        $('#apellido_paterno_show').text($(this).data('apellido-paterno'));
        $('#apellido_materno_show').text($(this).data('apellido-materno'));
        $('#fecha_show').text($(this).data('registro'));
        if($(this).data('sexo')=='H'){
            $('#sexo_show').text('Hombre');
        }else
         $('#sexo_show').text('Mujer');

    });

    $(document).on('click','.show-modal-actividad-vendedor',function(){
        $('#show_actividad_vendedor').modal('show');
        $('#nombre_show').text($(this).data('nombre'));
        $('#apellido_paterno_show').text($(this).data('apellido-paterno'));
        $('#apellido_materno_show').text($(this).data('apellido-materno'));
        $('#fecha_show').text($(this).data('registro'));
        if($(this).data('sexo')=='H'){
            $('#sexo_show').text('Hombre');
        }else
         $('#sexo_show').text('Mujer');

    });

    $(document).on('click','.show-modal-usuario',function(){
        $('#show_usuario').modal('show');
        $('#id').text($(this).data('id'));
        $('#nombre_usuario_show').text($(this).data('nombre'));
        $('#paterno_show').text($(this).data('apellido_paterno'));
        $('#materno_show').text($(this).data('apellido_materno'));
        $('#email_show').text($(this).data('email'));

        var status=$(this).data('status');

        if(status==1){
            $('#status_show').text('Activo');
            $('#status_show').css('background','green');
        }else{
            $('#status_show').text('Inactivo');
            $('#status_show').css('background','red');
        }
    });

    $(document).on('click','.show-modal-usuario-administrativo',function(){
        $('#show_usuario_administrativo').modal('show');
        $('#id').text($(this).data('id'));
        $('#nombre_usuario_show').text($(this).data('nombre'));
        $('#paterno_show').text($(this).data('apellido_paterno'));
        $('#materno_show').text($(this).data('apellido_materno'));
        $('#email_show').text($(this).data('email'));

        var status=$(this).data('status');

        if(status==1){
            $('#status_show').text('Activo');
            $('#status_show').css('background','green');
        }else{
            $('#status_show').text('Inactivo');
            $('#status_show').css('background','red');
        }
    });

    $(document).on('click','.show-modal-actividad',function(){
        $('#show_actividad').modal('show');
        $('#id').text($(this).data('id'));
        $('#actividad_show').text($(this).data('nombre_actividad'));
        $('#numero_vendedores_show').text($(this).data('total'));
    });


    $(document).on('click','.edit-modal-usuario',function(){
        var status=$(this).data('status');
        $('#update_usuario').modal('show');

        $('#id2').val($(this).data('id'));
        $('#nombre').val($(this).data('nombre'));
        $('#paterno').val($(this).data('apellido_paterno'));
        $('#materno').val($(this).data('apellido_materno'));
        $('#cargo2').val($(this).data('cargo'));
        $('#email2').val($(this).data('email'));

        if(status==1){
            $('#activo').attr('checked', true);
        }else{
             $('#inactivo').attr('checked', true);
        }
    });

    $(document).on('click','.edit-modal-usuario-administrativo',function(){
        var status=$(this).data('status');

        $('#update_usuario_administrativo').modal('show');

        $('#id2').val($(this).data('id'));
        $('#nombre').val($(this).data('nombre'));
        $('#paterno').val($(this).data('apellido_paterno'));
        $('#materno').val($(this).data('apellido_materno'));
        $('#cargo2').val($(this).data('cargo'));
        $('#email2').val($(this).data('email'));

        if(status==1){
            $('#activo').attr('checked', true);
        }else{
             $('#inactivo').attr('checked', true);
        }
    });

    $(document).on('click','.edit-modal-vendedor',function(){
        var status=$(this).data('status');

        $('#update_vendedor').modal('show');

        $('#id2').val($(this).data('id'));
        $('#nombre').val($(this).data('nombre'));
        $('#paterno').val($(this).data('apellido_paterno'));
        $('#materno').val($(this).data('apellido_materno'));
        $('#cargo2').val('Vendedor');
        $('#email2').val($(this).data('email'));

        if(status==1){
            $('#activo').attr('checked', true);
        }else{
             $('#inactivo').attr('checked', true);
        }
    });

    $('#create_permiso').on('shown.bs.modal', function() {
        limpiarCamposPermiso();
        agregarPosicion();
    });


});
/******************************************* PERMISOS *****************************************************/
    //Funcion para que al dar click en el boton de sancion aparezca la ventana modal
    $(document).on('click','.asignar-sancion',function(){
        $('#asignar_sancion').modal('show');
        $('#id_permiso_sancion').val($(this).data('id'));
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

    //Funcion para mostrar la ventana para registrar un nuevo permiso
    $('#create_permiso').on('shown.bs.modal', function() {
        limpiarCamposPermiso();
        agregarPosicion();
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

        var contador=0;
       
        if($('#Anual').is(':checked')) {  
           contador++;
        }else if($('#Eventual').is(':checked')){
            contador++;
        }else if($('#Provisional').is(':checked')){
            contador++;
        }

        if(contador>0){
            var seleccionado=$('input:radio[name=radioTipo]:checked').val();
            var ancho = $('#ancho').val();
            var otraOpcion='';
            var utensilios = '';  
            var total_utensilios=0;  
            var latitud_fin=$('#latitudfin').val();
            var longitud_fin=$('#longitudfin').val();;
    
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
                        
                            Swal.fire({
                                icon: 'success',
                                title: 'Tipo Asignado Correctamente',
                                showConfirmButton: false,
                                timer: 1500
                            })
    
                             location.reload();
                        }     
                    },
                });
    
            }else if(seleccionado=='Eventual'){
    
                $.ajax({
                    type: 'POST',
                    url: '/Eventuales/insertar',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'longitud_fin': longitud_fin,
                        'latitud_fin': latitud_fin,
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
                        
                            Swal.fire({
                                icon: 'success',
                                title: 'Tipo Asignado Correctamente',
                                showConfirmButton: false,
                                timer: 1500
                            })
    
                             location.reload();
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
                        
                            Swal.fire({
                                icon: 'success',
                                title: 'Tipo Asignado Correctamente',
                                showConfirmButton: false,
                                timer: 1500
                            })
    
                            location.reload();
                        }     
                    },
                });    
            } 
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Debe seleccionar un tipo de permiso',
                showConfirmButton: true
            })
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

                    Swal.fire({
                        icon: 'success',
                        title: 'Sancion Creada Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    location.reload();
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

                    Swal.fire({
                        icon: 'success',
                        title: 'Cancelacion Creada Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    location.reload();
                }     
            },
        });
    });

    //Funcion para agregar un nuevo permiso e insertar el registro en la base de datos
    $("#agregar_permiso").click(function(){
        var actividad=$('#tipo_actividad option:selected').val();
        var id_colonia=$('#id_colonia option:selected').val();

        var dias = '';    
        var total_dias;
        $('#formulario input[type=checkbox]').each(function(){
            if (this.checked) {
                dias += $(this).val()+',';
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
                'id_colonia': id_colonia,
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
                        title: 'Permiso agregado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    location.reload();
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

                    Swal.fire({
                        icon: 'success',
                        title: 'Se ha actualizado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    location.reload();
                }     
            },
        });
    });

    var bandera=false;
    $('#mostrar_password').mousedown(function () { 
        event.preventDefault();
        
        if(bandera==false){
            $('#password').attr("type","text");
            $('#mostrar_password').attr('title','Ocultar');
            bandera=true;
        }else if(bandera==true){
            $('#password').attr("type","password");
             $('#mostrar_password').attr('title','Mostrar');
            bandera=false;
        }
        
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
        $('#id_delete_organizacion').val($(this).data('id'));
        
    });

    $(document).on('click','.delete-modal-usuario',function(){
        $('#delete_usuario').modal('show');
        $('#show').modal('show');
        $('#id_delete_usuario').val($(this).data('id'));
    });

    $(document).on('click','.delete-modal-usuario-administrativo',function(){
        $('#delete_usuario_administrativo').modal('show');
        $('#id_delete_usuario_administrativo').val($(this).data('id'));
    });

    $(document).on('click','.delete-modal-vendedor',function(){
        $('#delete_vendedor').modal('show');
        $('#id_delete_vendedor').val($(this).data('id'));
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

    //Funcion para que aparezca otra opcion para que el administrador eliga otro utensislio que no aparezca en la lista
    function opcionOtra(){
        var check=document.getElementById("otra");
        if(check.checked){
            $("#div4").show();
        }else if(!check.checked){
            $("#div4").hide();
        }
    }

    function limpiarCamposTipoPermiso(){
        $('#utensilios').removeClass('green-border');
        $('#utensilios').removeClass('red-border');
        $('#utensilios_error').addClass('d-none');

        $('#fecha_vencimiento').removeClass('green-border');
        $('#fecha_vencimiento').removeClass('red-border');
        $('#fecha_vencimiento_error').addClass('d-none');
    }

    $('#caja_busqueda_colonias').keyup(function(){
        var consulta=$('#caja_busqueda_colonias').val();
        var id_agencia=$('#id_agencia').val();
        
        if(consulta==""){
          
            $.get('/Agencia/detalle/'+id_agencia, function(data){
                $('#table_colonias tbody').empty();
                if(data.length==0){
                    $('#table_colonias').append("<tr>" +
                        "<td colspan='4' align='center' >No hay registros</td>"
                    +"</tr>");
                }
        
                for (var i=0; i<data.length;i++){  
                    $('#table_colonias').append("<tr class='post" + data[i].id + "'>" +
                        "<td >" + data[i].id + "</td>" +
                        "<td >" + data[i].nombre + "</td>" +
                        "<td >" + data[i].codigo_postal + "</td>" +
                        "<td >" + data[i].total + "</td>" +
                        "<td style='width: 25%'>" +
                            "<button type='button' style='margin-right:3px;'  class='show-modal-colonia btn btn-warning btn-sm' data-id='" + data[i].id + 
                            "' data-nombre='" + data[i].nombre + "' " +
                            "data-toggle='modal' "+
                            "data-target='#show_colonia' "+
                            "data-longitud_noreste='" + data[i].longitud_noresteC  + 
                            "' data-latitud_noreste='" + data[i].latitud_noresteC  + 
                            "' data-longitud_sureste='" + data[i].longitud_suresteC  + 
                            "' data-latitud_sureste='" + data[i].latitud_suresteC  + 
                            "' data-longitud_centro='" + data[i].longitud_centroC  + 
                            "' data-latitud_centro='" + data[i].latitud_centroC  + 
                            "' data-total='" + data[i].total +
                            "' data-codigo='"+data[i].codigo_postal+ "'>"+
                            "  <i class='fa fa-eye'></i></button>" +
                        "</td>" +
                    "</tr>");
                    
                }
        
            });
        
        }else{
            $.get('/Colonia/buscar/'+id_agencia+'/'+consulta, function(data){
                $('#table_colonias tbody').empty();
                if(data.length==0){
                    $('#table_colonias').append("<tr>" +
                        "<td colspan='4' align='center' >No hay registros</td>"
                    +"</tr>");
                }
        
                for (var i=0; i<data.length;i++){  
                    
                    $('#table_colonias').append("<tr class='post" + data[i].id + "'>" +
                    "<td >" + data[i].id + "</td>" +
                    "<td >" + data[i].nombre + "</td>" +
                    "<td >" + data[i].codigo_postal + "</td>" +
                    "<td >" + data[i].total + "</td>" +
                    "<td style='width: 25%'>" +
                        "<button type='button' style='margin-right:3px;'  class='show-modal-colonia btn btn-warning btn-sm' data-id='" + data[i].id + 
                        "' data-nombre='" + data[i].nombre + "' " +
                        "data-toggle='modal' "+
                        "data-target='#show_colonia' "+
                        "data-longitud_noreste='" + data[i].longitud_noresteC  + 
                        "' data-latitud_noreste='" + data[i].latitud_noresteC  + 
                        "' data-longitud_sureste='" + data[i].longitud_suresteC  + 
                        "' data-latitud_sureste='" + data[i].latitud_suresteC  + 
                        "' data-longitud_centro='" + data[i].longitud_centroC  + 
                        "' data-latitud_centro='" + data[i].latitud_centroC  + 
                        "' data-total='" + data[i].total +
                        "' data-codigo='"+data[i].codigo_postal+ "'>"+
                        "  <i class='fa fa-eye'></i></button>" +
                    "</td>" +
                    "</tr>");
                }
        
            });
        }

    });

    $('#caja_busqueda_actividad_vendedor').keyup(function(){
        var consulta=$('#caja_busqueda_actividad_vendedor').val();
        var id_actividad=$('#id_actividad_comercial').val();
        
        if(consulta==""){
          
            $.get('/Actividades/detalle/'+id_actividad, function(data){
                    $('#table_actividad_vendedor tbody').empty();
                    if(data.length==0){
                        $('#table_actividad_vendedor').append("<tr>" +
                            "<td colspan='5' align='center' >No hay registros</td>"
                        +"</tr>");
                    }
            
                    for (var i=0; i<data.length;i++){  
                        $('#table_actividad_vendedor').append("<tr class='post" + data[i].id + "'>" +
                            "<td style='width: 10%;'>" + data[i].id + "</td>" +
                            "<td style='width: 21%;'>" + data[i].rfc + "</td>" +
                            "<td style='width: 30.5%;'>" + data[i].curp + "</td>" +
                            "<td style='width: 16%;'>" + data[i].id_permiso + "</td>" +
                            "<td style='width: 23%' style='text-align=center'>" +
                            "<button type='button' style='margin-right:3px;'  class='show-modal-actividad-vendedor btn btn-warning btn-sm' data-id='" + data[i].id + "' data-nombre='" + data[i].name + "'" +
                                "data-apellido-paterno='" + data[i].apellido_paterno + "' data-apellido-materno='" + data[i].apellido_materno + "' data-registro='" + data[i].created_at + "'  data-sexo='" + data[i].sexo + "'><i class='fa fa-eye'></i></button>" +
                            "</td>" +
                        "</tr>");
                        
                    }
            
            });
        
        }else{
            $.get('/Actividades/buscar_vendedor/'+consulta+'/'+id_actividad, function(data){
                $('#table_actividad_vendedor tbody').empty();
                if(data.length==0){
                    $('#table_actividad_vendedor').append("<tr>" +
                        "<td colspan='5' align='center' >No hay registros</td>"
                    +"</tr>");
                }
        
                for (var i=0; i<data.length;i++){  
                    
                    $('#table_actividad_vendedor').append("<tr class='post" + data[i].id + "'>" +
                            "<td style='width: 10%;'>" + data[i].id + "</td>" +
                            "<td style='width: 21%;'>" + data[i].rfc + "</td>" +
                            "<td style='width: 30.5%;'>" + data[i].curp + "</td>" +
                            "<td style='width: 16%;'>" + data[i].id_permiso + "</td>" +
                            "<td style='width: 23%' style='text-align=center'>" +
                            "<button type='button' style='margin-right:3px;'  class='show-modal-actividad-vendedor btn btn-warning btn-sm' data-id='" + data[i].id + "' data-nombre='" + data[i].name + "'" +
                                "data-apellido-paterno='" + data[i].apellido_paterno + "' data-apellido-materno='" + data[i].apellido_materno + "' data-registro='" + data[i].created_at + "'  data-sexo='" + data[i].sexo + "'><i class='fa fa-eye'></i></button>" +
                            "</td>" +
                        "</tr>");
                }
        
            });
        }

    });

    $('#caja_busqueda_organizacion_vendedor').keyup(function(){
        var consulta=$('#caja_busqueda_organizacion_vendedor').val();
        var id_organizacion=$('#id_organizacion').val();
        
        if(consulta==""){
            $.get('/Organizaciones/detalle/'+id_organizacion, function(data){
                    $('#table_organizacion_vendedor tbody').empty();
                    if(data.length==0){
                        $('#table_organizacion_vendedor').append("<tr>" +
                            "<td colspan='5' align='center' >No hay registros</td>"
                        +"</tr>");
                    }
            
                    for (var i=0; i<data.length;i++){  
                        $('#table_organizacion_vendedor').append("<tr class='post" + data[i].id + "'>" +
                            "<td style='width: 10%;'>" + data[i].id + "</td>" +
                            "<td style='width: 20%;'>" + data[i].rfc + "</td>" +
                            "<td style='width: 30%;'>" + data[i].curp + "</td>" +
                            "<td style='width: 15%;'>" + data[i].id_permiso + "</td>" +
                            "<td style='width: 25%; text-align:center;' >" +
                                "<button type='button' style='margin-right:3px;'  class='show-modal-organizacion-vendedor btn btn-warning btn-sm' data-id='" + data[i].id + "' data-nombre='" + data[i].name + "'" +
                                "data-apellido-paterno='" + data[i].apellido_paterno + "' data-apellido-materno='" + data[i].apellido_materno + "' data-registro='" + data[i].created_at + "'  data-sexo='" + data[i].sexo + "'><i class='fa fa-eye'></i></button>" +
                            "</td>" +
                        "</tr>");
                    }
            
            });
        
        }else{
            $.get('/Organizaciones/buscar_vendedor/'+id_organizacion+"/"+consulta, function(data){
                $('#table_organizacion_vendedor tbody').empty();
                if(data.length==0){
                    $('#table_organizacion_vendedor').append("<tr>" +
                        "<td colspan='5' align='center' >No hay registros</td>"
                    +"</tr>");
                }
        
                for (var i=0; i<data.length;i++){  
                    
                    $('#table_organizacion_vendedor').append("<tr class='post" + data[i].id + "'>" +
                        "<td style='width: 10%;' >" + data[i].id + "</td>" +
                        "<td style='width: 20%;' >" + data[i].rfc + "</td>" +
                        "<td style='width: 30%;'>" + data[i].curp + "</td>" +
                        "<td style='width: 15%;'>" + data[i].id_permiso + "</td>" +
                        "<td style='width: 25%; text-align:center;'>" +
                            "<button type='button' style='margin-right:3px;'  class='show-modal-organizacion-vendedor btn btn-warning btn-sm' data-id='" + data[i].id + "' data-nombre='" + data[i].name + "'" +
                            "data-apellido-paterno='" + data[i].apellido_paterno + "' data-apellido-materno='" + data[i].apellido_materno + "' data-registro='" + data[i].created_at + "'  data-sexo='" + data[i].sexo + "'><i class='fa fa-eye'></i></button>" +
                        "</td>" +
                    "</tr>");
                }
            });
        }
    });   

    $('#caja_busqueda_zona_vendedor').keyup(function(){
        var consulta=$('#caja_busqueda_zona_vendedor').val();
        var id_zona=$('#id_zona').val();
        
        if(consulta==""){
            $.get('/Zonas/detalle/'+id_zona, function(data){
                    $('#table_zona_vendedor tbody').empty();
                    if(data.length==0){
                        $('#table_zona_vendedor').append("<tr>" +
                            "<td colspan='5' align='center' >No hay registros</td>"
                        +"</tr>");
                    }
            
                    for (var i=0; i<data.length;i++){  
                       $('#table_zona_vendedor').append("<tr class='post" + data[i].id + "'>" +
                            "<td style='width: 10%;'>" + data[i].id + "</td>" +
                            "<td style='width: 21%;'>" + data[i].rfc + "</td>" +
                            "<td style='width: 30.5%;'>" + data[i].curp + "</td>" +
                            "<td style='width: 16%;'>" + data[i].id_permiso + "</td>" +
                            "<td style='width: 23%; text-align:center;' >" +
                            "<button type='button' style='margin-right:3px;'  class='show-modal-zona-vendedor btn btn-warning btn-sm' data-id='" + data[i].id + "' data-nombre='" + data[i].name + "'" +
                            "data-apellido-paterno='" + data[i].apellido_paterno + "' data-apellido-materno='" + data[i].apellido_materno + "' data-registro='" + data[i].created_at + "'  data-sexo='" + data[i].sexo + "'><i class='fa fa-eye'></i></button>" +
                            "</td>" +
                        "</tr>");
                    }
            
            });
        
        }else{
            $.get('/Zonas/buscar_vendedor/'+id_zona+'/'+consulta, function(data){
                $('#table_zona_vendedor tbody').empty();
                if(data.length==0){
                    $('#table_zona_vendedor').append("<tr>" +
                        "<td colspan='5' align='center' >No hay registros</td>"
                    +"</tr>");
                }
        
                for (var i=0; i<data.length;i++){  
                    
                   $('#table_zona_vendedor').append("<tr class='post" + data[i].id + "'>" +
                        "<td style='width: 10%;'>" + data[i].id + "</td>" +
                        "<td style='width: 21%;'>" + data[i].rfc + "</td>" +
                        "<td style='width: 30.5%;'>" + data[i].curp + "</td>" +
                        "<td style='width: 16%;'>" + data[i].id_permiso + "</td>" +
                        "<td style='width: 23%; text-align:center;' >" +
                        "<button type='button' style='margin-right:3px;'  class='show-modal-zona-vendedor btn btn-warning btn-sm' data-id='" + data[i].id + "' data-nombre='" + data[i].name + "'" +
                        "data-apellido-paterno='" + data[i].apellido_paterno + "' data-apellido-materno='" + data[i].apellido_materno + "' data-registro='" + data[i].created_at + "'  data-sexo='" + data[i].sexo + "'><i class='fa fa-eye'></i></button>" +
                        "</td>" +
                    "</tr>");
                }
            });
        }
    }); 

    $('#curp').click(function(){
        var nombre= $('input[name=nombre]').val();
        var apellido_paterno=$('input[name=apellido_paterno]').val();
        var apellido_materno=$('input[name=apellido_materno]').val();
        var sexo=$('#sexo option:selected').val();

        if(sexo=='H'){
            sexo='M';
        }else if(sexo=='M'){
            sexo='F';
        }

        var fecha_nac=$('input[name=fecha_nacimiento]').val();
        GeneraCURP(nombre,apellido_paterno,apellido_materno,fecha_nac,sexo,19);
    });

    function BuscarUsuario(){
        var dato=$('#caja_busqueda_usuario').val();

        if(dato!=""){
            location.href='/Usuarios/buscar/'+dato;
        }else{
            location.href='/Usuarios/index';
        }
    }

    function BuscarAdministrativo(){
        var dato=$('#caja_busqueda_administrativo').val();

        console.log(dato);
        if(dato!=""){
            location.href='/Secretarias/buscar/'+dato;
        }else{
            location.href='/Secretarias/index';
        }
    }

    function BuscarVendedor(){
        var dato=$('#caja_busqueda_vendedor').val();

        if(dato!=""){
            location.href='/Vendedores/buscar/'+dato;
        }else{
            location.href='/Vendedores/index';
        }
    }

    function BuscarAgencia(){
        var dato=$('#caja_busqueda_agencias').val();

        if(dato!=""){
            location.href='/Agencia/buscar/'+dato;
        }else{
            location.href='/Agencia/index';
        }
    }

    function MensajeConfirmacion(){
        console.log('hola');
        Swal.fire({
            icon: 'success',
            title: 'Se ha descargado el archivo con éxito',
            showConfirmButton: false,
            timer: 1500
        })
    }

    function MensajeActualizado(){
        console.log('hola');
        Swal.fire({
            icon: 'success',
            title: 'Se han actualizado correctamente tus datos',
            showConfirmButton: false,
            timer: 1500
        })
    }    

    function BuscarActividadComercial(){
        var dato=$('#caja_busqueda_actividades').val();

        if(dato!=""){
            location.href='/Actividades/buscar/'+dato;
        }else{
            location.href='/Actividades/index';
        }    
    }

    function BuscarPermiso(){
         var dato=$('#caja_busqueda_permiso').val();
         var nombre=$('#tipo_permiso').val();

        if(dato!=""){
            location.href='/Permisos/buscar/'+dato+'/'+nombre;
        }else{
            location.href='/Permisos/index/'+nombre;
        }   
    }

    function BuscarObservacion(){
        var dato=$('#caja_busqueda_observacion').val();
        if(dato!=""){
            location.href='/Observaciones/buscar/'+dato;
        }else{
            location.href='/Observaciones/index';
        }    
    }

    function BuscarOrganizacion(){
        var dato=$('#caja_busqueda_organizacion').val();
        if(dato!=""){
            location.href='/Organizaciones/buscar/'+dato;
        }else{
            location.href='/Organizaciones/index';
        }    

    }

    function BuscarZona(){
        var dato=$('#caja_busqueda_zona').val();
        if(dato!=""){
            location.href='/Zonas/buscar/'+dato;
        }else{
            location.href='/Zonas/index';
        }     
    }

    function OrganizacionVendedor(){
        var id=$('#id_organizacion').val();

        location.href='/Organizaciones/descargar_pdf_detalle/'+id;
    }

    function ActividadesComercialesVendedor(){
        var id=$('#id_actividad_comercial').val();
        console.log(id);

        location.href='/Actividades/descargar_pdf_detalle/'+id;
    }

    function ZonasVendedor(){
        var id=$('#id_zona').val();
        location.href='/Zonas/descargar_pdf_detalle/'+id;
    }

    function DescargarPdfColonias(){
        var id=$('#id_agencia').val();
        location.href='/Agencia/descargar_pdf_colonias/'+id;
        
    }

    function DescargarPdfObservaciones(){
        var id=$('#id_observacion2').val();
        location.href='/Observaciones/descargar_pdf_detalle/'+id;
    }

    function DescargarExcelObservacionesVendedores(){

    }

    function DescargarExcelColonias(){
        var id=$('#id_agencia').val();
        location.href='/Agencia/descargar_excel_colonias/'+id;

        Swal.fire({
            icon: 'success',
            title: 'Se ha descargado el archivo con éxito',
            showConfirmButton: false,
            timer: 1500
        })
    }

    function MostrarOrganizaciones(){
        $('#show_organizaciones').modal('show');
        
        $.get('/Organizaciones/mostrar_organizaciones', function(data){
            $('#table_organizaciones tbody').empty();
            if(data.length==0){
                $('#table_organizaciones').append("<tr>" +
                    "<td colspan='3' align='center' >No hay registros</td>"
                +"</tr>");
            }
    
            for (var i=0; i<data.length;i++){  
                
               $('#table_organizaciones').append("<tr class='post" + data[i].id + "'>" +
                    "<td style='width: 7%;'>" + data[i].id + "</td>" +
                    "<td style='width: 52%;'>" + data[i].nombre_organizacion + "</td>" +
                    "<td style='width: 47%;'>" + data[i].nombre_dirigente + "</td>" +
                "</tr>");
            }
        });
    }

    function MostrarActividades(){
        $('#show_actividades').modal('show');

        $.get('/Actividades/mostrar_actividades', function(data){
            $('#table_actividades_comerciales tbody').empty();
            if(data.length==0){
                $('#table_actividades_comerciales').append("<tr>" +
                    "<td colspan='2' align='center' >No hay registros</td>"
                +"</tr>");
            }
    
            for (var i=0; i<data.length;i++){  
                
               $('#table_actividades_comerciales').append("<tr class='post" + data[i].id + "'>" +
                    "<td style='width: 7%;'>" + data[i].id + "</td>" +
                    "<td style='width: 52%;'>" + data[i].nombre_actividad + "</td>" +
                "</tr>");
            }
        });
    }

    function DescargarExcelActividadesVendedor(){
        var id=$('#id_actividad_comercial').val();
        location.href='/Actividades/descargar_excel_vendedor/'+id;
    }

    function DescargarExcelOrganizacionesVendedores(){
        var id=$('#id_organizacion').val();
        location.href='/Organizaciones/descargar_excel_vendedor/'+id;

        Swal.fire({
            icon: 'success',
            title: 'Se ha descargado el archivo con éxito',
            showConfirmButton: false,
            timer: 1500
        })
    }

    function DescargarExcelZonasVendedores(){
        var id=$('#id_zona').val();
        location.href='/Zonas/descargar_excel_vendedor/'+id;

        Swal.fire({
            icon: 'success',
            title: 'Se ha descargado el archivo con éxito',
            showConfirmButton: false,
            timer: 1500
        })
    }