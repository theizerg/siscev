$("#tipoequipo").on('submit', function(e){
    e.preventDefault();   
    var data = $('#tipoequipo').serialize();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: '/tipoequipos/guardarajax',
      cache: false,
      data: data,    
      success: function( response ) {
        $('#tipoequipos').append($('<option>', {
          value: response.id,
          text: response.descripcion,
          selected: true
        }));
        $('#createModalTipoEquipo').modal('hide');
      }
    });
  });