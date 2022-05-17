/* Jquery petición AJAX comunicarse con 
el controlador php para validar el usuario */

jQuery(document).on('submit', '#formlg', function (event){
    event.preventDefault();
    jQuery.ajax({
        // Donde, como, qué, el tipo de petición
        url: '/login/auth',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function (){
            // Mostrar animación de carga
            $('#logIn').val('Ingresando ..').toggleClass('active');

        }
    })
        .done(function (respuesta){
            // Si todo esta bien, mostrar la animación por 2 segundos y redireccionar a la pagina principal
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
            // Si hay un error, mostrar la animación por 2 segundos y mostrar el error
                console.log(error.responseText)
                console.error("Algo ha salido mal, prueba de nuevo");
        })
});