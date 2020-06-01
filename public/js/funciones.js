$(document).ready(function() {

    $('#permitida').click(function() {
        $('#table_data').load('/Zonas/detalle_zona/1');
        console.log("permitida");
    });

    $('#zona').click(function() {
        $('#contenido').load('/Zonas/mostrar');
    });

    $('#organizacion').click(function() {
        $('#contenido').load('/Organizaciones/mostrar');
    });

    $('#show_zona').on('shown.bs.modal', function(e) {
    
        var aux =$(e.relatedTarget).data('id');
        $('#id_zona_update').val(aux);
        cargarMapa(aux);
        //map.resize();
    });

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

    $('#create_permiso').on('shown.bs.modal', function() {
        agregarPosicion();
    });



    //Funcion para asignar un rol a un usuario

    $("#asignar_rol").click(function(){
        var aux=$('#cargo option:selected').val();
        var a=$("#id_usuario").val();
        console.log(a);
        console.log(aux);
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
            url: 'insertar',
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
        console.log(estado);
        $.get('municipioEstado/'+estado, function(data){
          console.log(data);
            var municipio_select = '<option value="" selected disabled>Seleccione su municipio</option>'
              for (var i=0; i<data.length;i++)
                municipio_select+='<option value="'+data[i].id_municipio+'">'+data[i].nombre+'</option>';
  
              $("#id_municipio").html(municipio_select);
        });
      });

      /**FUNCION que muestra el selector de fechas */
      $('.fj-date').datepicker({
        language: "es",
        format: "yyyy/mm/dd",
        endDate: "-18Y",
        autoclose: true
      });

});

/********************************************ORGANIZACIONES************************************************ */

//Funcuion para crear la ventana modal para agregar una organizacion
$(document).on('click', '.create-modal', function() {
    $('#create_organizacion').modal('show');

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
    $('#onload').fadeOut();
    $('body').removeClass('hidden');
    $('div').removeAttr('hidden');
}

$(function(){
    $('#seleccionar-todos').change(function() {
      $('#checkbox > label >input[type=checkbox]').prop('checked', $(this).is(':checked'));
      console.log("hola");
    });
  });
 
  