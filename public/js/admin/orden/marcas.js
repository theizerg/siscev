
$("#marca").on('submit', function(e){
    e.preventDefault();   
    var data = $('#marca').serialize();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: '/marcas/guardarajax',
      cache: false,
      data: data,    
      success: function( response ) {
        $('#marcas').append($('<option>', {
          value: response.id,
          text: response.descripcion,
          selected: true
        }));
        $('#createModalMarca').modal('hide');
      }
    });
  });