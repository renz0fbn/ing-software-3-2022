/* Jquery petición Ajax para comunicarse con un controlador
php y saber si se puede crear un usuario */


jQuery(document).on('submit', '#formlg', function (event){
    event.preventDefault();
    jQuery.ajax({       // Donde, tipo de petición, tipo de dato, datos
        url: '/singin/validate',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function (){                             // Mostrar gif de carga
            $('#singIn').val('Creando ...').toggleClass('active');

        }
    })
        .done(function (respuesta){
            // Despues de 3 segundos, ocultar gif de carga y redireccionar a /
            setTimeout(function (){
                $('#singIn').val('Crear').toggleClass('active');
                if(respuesta.validate){
                    location.href = '/login?new=1';
                }
                else{
                    $('#subir1').addClass('btnEnv');
                    $('#response').text(respuesta.msg).addClass('msg');
                }
            }, 3000)

        })
        .fail(function (resp){
            // Despues de 2 segundo, ocultar gif de carga y mostrar mensaje de error
            setTimeout(function (){
                console.log(resp.responseText)
                $('#singIn').val('Crear').toggleClass('active');
                console.error("Algo ha salido mal, prueba de nuevo");
            }, 2000);

        })
});