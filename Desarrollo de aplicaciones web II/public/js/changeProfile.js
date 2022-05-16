const loadFile = function (event) {
    const MAXIMO_TAMANIO_BYTES = 1000000;
    const upload = event.target.files[0];
    
    if (upload.size > MAXIMO_TAMANIO_BYTES) {
		const tamanioEnMb = MAXIMO_TAMANIO_BYTES / 1000000;
		alert(`El tamaño máximo es ${tamanioEnMb} MB`);
		// Limpiar
	} else {
        let image = document.getElementById("output");
        image.src = URL.createObjectURL(event.target.files[0]);
    
        let boton = document.getElementById("uploadProfile");
        boton.classList.remove('d-none')
	}



};