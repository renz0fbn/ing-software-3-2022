
jQuery(document).on('submit', '#formlg', function (event){
    event.preventDefault();
    jQuery.ajax({
        url: '/singin/validate',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function (){
            $('#singIn').val('Creando ...').toggleClass('active');

        }
    })
        .done(function (respuesta){
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
            setTimeout(function (){
                console.log(resp.responseText)
                $('#singIn').val('Crear').toggleClass('active');
                console.error("Algo ha salido mal, prueba de nuevo");
            }, 2000);

        })
});