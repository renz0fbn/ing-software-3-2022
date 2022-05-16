const loadFile = function (event) {
    const MAXIMO_TAMANIO_BYTES = 1000000;
    const upload = event.target.files[0];
    const file = document.getElementById("file");

    if (upload.size > MAXIMO_TAMANIO_BYTES) {
        const tamanioEnMb = MAXIMO_TAMANIO_BYTES / 1000000;
        alert(`El tamaño máximo es ${tamanioEnMb} MB, el archivo será omitido`);
        file.setAttribute('name','');

    } else {
        file.setAttribute('name','thumbail');
    }



};