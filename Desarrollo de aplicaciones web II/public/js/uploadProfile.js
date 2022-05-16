jQuery(document).on('submit', '#uploadProfile', function (event){
    event.preventDefault();
    jQuery.ajax({
        url: 'save/profilePicture',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function (){
            console.log("hola")
        }
    })
        .done(function (respuesta){
            console.log(respuesta);
        })
        .fail(function (error){
            console.log(error)
        })
});