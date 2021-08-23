$("#formodelo").on('submit', function(e){
    e.preventDefault();   
    var data = $('#formodelo').serialize();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: '/modelos/guardarajax',
      cache: false,
      data: data,    
      success: function( response ) {
        $('#modelos').append($('<option>', {
          value: response.id,
          text: response.descripcion,
          selected: true
        }));
        $('#createModalModelo').modal('hide');
      }
    });
  });