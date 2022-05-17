/* Comprobar si un archivo se puede subir o no*/

const loadFile = function (event) {
    const MAXIMO_TAMANIO_BYTES = 1000000;
    const upload = event.target.files[0];
    const file = document.getElementById("file");

    if (upload.size > MAXIMO_TAMANIO_BYTES) {              // Comprobar tamaño
        const tamanioEnMb = MAXIMO_TAMANIO_BYTES / 1000000;
        alert(`El tamaño máximo es ${tamanioEnMb} MB, el archivo será omitido`);
        file.setAttribute('name','');                       // Omitir el archivo

    } else {
        file.setAttribute('name','thumbail');               // Admitir el archivo
    }

};