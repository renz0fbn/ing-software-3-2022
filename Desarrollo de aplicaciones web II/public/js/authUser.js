jQuery(document).on('submit', '#formlg', function (event){
    event.preventDefault();
    jQuery.ajax({
        url: '/login/auth',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function (){
            $('#logIn').val('Ingresando ..').toggleClass('active');

        }
    })
        .done(function (respuesta){
            setTimeout(function () {
                $('#sucsses').text('');

                $('#logIn').val('Ingresar').toggleClass('active');
                if (respuesta.auth) {
                    location.href = '/';
                } else {
                    $('#subir1').addClass('btnEnv');
                    $('#response').text(respuesta.msg).addClass('msg');
                }
            }, 2000)
        })
        .fail(function (error){
                console.log(error.responseText)
                console.error("Algo ha salido mal, prueba de nuevo");
        })
});