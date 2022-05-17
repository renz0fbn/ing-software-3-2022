/* Previsualizar la imagen, comprobar tamaño y 
determinar si se puede subir o no */

const loadFile = function (event) {
    const MAXIMO_TAMANIO_BYTES = 1000000;                         // 1 MB
    const upload = event.target.files[0];                        // Obtener el archivo
    
    if (upload.size > MAXIMO_TAMANIO_BYTES)                     // Comprobar tamaño
    {
	const tamanioEnMb = MAXIMO_TAMANIO_BYTES / 1000000;
	alert(`El tamaño máximo es ${tamanioEnMb} MB`);         // Mostrar error
        boton.classList.add('d-none');
    } 
    else {                                                         
        let image = document.getElementById("output");           // Permitir al usuario subir el archivo
        image.src = URL.createObjectURL(event.target.files[0]);
    
        let boton = document.getElementById("uploadProfile");
        boton.classList.remove('d-none')
	}

};