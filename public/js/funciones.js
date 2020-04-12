$(document).ready(function(){
    $('#usuarios').click(function(){
      $('#contenido').load('/Usuarios/mostrar');
    });

    $('#zona').click(function(){
      $('#contenido').load('/Zonas/mostrar');
    });

    $('#organizacion').click(function(){
      $('#contenido').load('/Organizaciones/mostrar');
    });

    $("#agregando").click(function() {
      $.ajax({
        type: 'POST',
        url: 'Organizaciones/insertar',
        data: {
          '_token': $('input[name=_token]').val(),
          'nombre_organizacion': $('input[name=nombre_organizacion]').val(),
          'nombre_dirigente': $('input[name=nombre_dirigente]').val()
        },
        success: function(data){
          if ((data.errors)) {
            $('.error').removeClass('hidden');
            $('.error').text(data.errors.nombre_organizacion);
            $('.error').text(data.errors.nombre_dirigente);
          } else {
            $('.error').remove();
            $('#table').append("<tr>"+
            "<td>" + data.id + "</td>"+
            "<td>" + data.nombre_organizacion + "</td>"+
            "<td>" + data.nombre_dirigente + "</td>"+
            "<td>" + data.id + "</td>"+
            "<td align='center'>"+  
              "<button type='button' style='margin-right:3px;'  class='btn btn-warning btn-sm data-id='"+data.id +"'><i class='fa fa-eye'></i></button>"+
              "<button type='button' style='margin-right:3px;' class='btn btn-danger btn-sm' data-id='"+data.id+"'><i class='fa fa-pencil-alt'></i></button>"+
              "<button type='button' style='margin-right:3px;' class='btn btn-info btn-sm' data-id='"+data.id+"'><i class='fa fa-eraser'></i></button>"+
            "</td>"+
            "</tr>");

          }
        },
      });
      $('#nombre_organizacion').val('');
      $('#nombre_dirigente').val('');
     
    });

  });

  $(document).on('click','.create-modal', function(){
    $('#create').modal('show');
    
  });


 