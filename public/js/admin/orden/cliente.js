$("#formcliente").on('submit', function(e){
    e.preventDefault();   
    var data = $('#formcliente').serialize();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: '/clientes/guardarajax',
      cache: false,
      data: data,    
      success: function( response ) {
        $('#cliente').append($('<option>', {
          value: response.id,
          text: response.name,
          selected: true
        }));
         $('#telefono_cliente').val(response.telefono);
        $('#createModalCliente').modal('hide');
      }
    });
  });