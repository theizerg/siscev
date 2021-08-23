$(document).ready(function(){

  $('#main-form').submit(function(){
    

        $('.missing_alert').css('display', 'none');

         if ($('#main-form #empresa').val() === '') {
            $('#main-form #empresa_alert').text('Ingrese el nombre de la empresa').show();
            $('#main-form #empresa').focus();
            return false;
        }
         if ($('#main-form #rif_empresa').val() === '') {
            $('#main-form #rif_empresa_alert').text('Ingrese el rif de la empresa').show();
            $('#main-form #rif_empresa').focus();
            return false;
        }

         if ($('#main-form #correo').val() === '') {
            $('#main-form #correo_alert').text('Ingrese correo electrónico').show();
            $('#main-form #correo').focus();
            return false;
        }

        if (! $('#main-form #correo').val().match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/)) {
            $('#main-form #correo').focus();
            $('#main-form #correo_alert').text('Ingrese correo electrónico válido').show();
            return false;
        }

        if ($('#main-form #telefono').val() === '') {
            $('#main-form #telefono_alert').text('Ingrese el teléfono de la empresa').show();
            $('#main-form #telefono').focus();
            return false;
        }

        if ($('#main-form #descricion_solicitud').val() === '') {
            $('#main-form #descricion_solicitud_alert').text('Ingrese la descripción de la solicitud').show();
            $('#main-form #descricion_solicitud').focus();
            return false;
        }

        if (! $('#main-form #telefono').val().match(/^(?:-?\d+|-?\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/)) {
            $('#main-form #telefono').focus();
            $('#main-form #telefono_alert').text('Ingrese sólo números').show();
            return false;
        }

        
       
        var data = $('#main-form').serialize();
        $('input').iCheck('disable');
        $('#main-form input, #main-form button').attr('disabled','true');
         $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-save');

        Pace.track(function () {
            $.ajax({
              url: $('#main-form #_url').val(),
              headers: {'X-CSRF-TOKEN': $('#main-form #_token').val()},
              type: 'POST',
              cache: false,
              data: data,
              success: function (response) {
                var json = $.parseJSON(response);
                if(json.success){
                  $('#main-form #submit').hide();
                  $('#main-form #edit-button').attr('href', $('#main-form #_url').val() + '/' + json.user_id + '/edit');
                  $('#main-form #edit-button').removeClass('hide');
                  toastr.success('Datos ingresados exitosamente');
                  $(location).attr('href', $('#main-form #_redirect').val());
                }
              },error: function (data) {
                var errors = data.responseJSON;
                console.log(errors);
                $.each( errors.errors, function( key, value ) {
                  toastr.error(value);
                  return false;
                });
                $('input').iCheck('enable');
                $('#main-form input, #main-form button').removeAttr('disabled');
                 $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-save');
              }
           });
        });

       return false;

    });
});
