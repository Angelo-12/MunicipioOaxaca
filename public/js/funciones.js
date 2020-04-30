$(document).ready(function() {
    $('#usuarios').click(function() {
        $('#contenido').load('/Usuarios/mostrar');
    });

    $('#zona').click(function() {
        $('#contenido').load('/Zonas/mostrar');
    });

    $('#organizacion').click(function() {
        $('#contenido').load('/Organizaciones/mostrar');
    });

    //Funcion para agregar un usuario

    $("agregar_usuario").click(function(){
        $.ajax({
            type: 'POST',
            url: 'insertar',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=nombre]').val(),
                'apellido_paterno': $('input[name=apellido_paterno]').val(),
                'apellido_materno': $('input[name=apellido_materno]').val(),
                'sexo': $('input[name=sexo]').val(),
                'email': $('input[name=email]').val(),
                'password': $('input[name=password]').val(),
                'id_municipio': $('input[name=id_municipio]').val(),

            },
            dataType:'json',
            success: function(data) {
                $('#nombre').addClass('green-border');
                $('#apellido_paterno').addClass('green-border');
                $('#apellido_materno').addClass('green-border');
                $('#apellido_paterno').addClass('green-border');
                $('#sexo').addClass('green-border');
                $('#estado').addClass('green-border');
                $('#municipio').addClass('green-border');
                $('#email').addClass('green-border');
                $('#password').addClass('green-border');
                
                if ((data.errors)) {
                   
                } else {
                   
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
                municipio_select+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
  
              $("#municipio").html(municipio_select);
        });
      });

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
    //var yea=document.getElementById("table").rows.length;
    //console.log(yea);

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
    $('#id_update').val($(this).data('id'))
    $('#nombre_organizacion_update').val($(this).data('nombre_organizacion'));
    $('#nombre_dirigente_update').val($(this).data('nombre_dirigente'));
    $('#show').modal('show');
});

//Funcion para mostrar la ventana modal para eliminar una organizacion
$(document).on('click', '.delete-modal', function() {
    $('#delete_organizacion').modal('show');
    $('#show').modal('show');
    
});


/******************************************** USUARIOS ************************************************ */
$(document).on('click', '.create-modal', function() {
    $('#create_usuario').modal('show');

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


//Funcion para agregar un pageloader
window.onload=function(){
    $('#onload').fadeOut();
    $('body').removeClass('hidden');
    $('div').removeAttr('hidden');
}

