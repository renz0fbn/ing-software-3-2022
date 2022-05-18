<h1 align="center">Desarrollo de aplicaciones Web II</h1>

## Trabajo del curso - TR1

<details><summary> <h2>ShowCase (Click para abrir !)</h2></summary><br>

![1](https://github.com/renz0fbn/ing-software-3-2022/blob/main/Desarrollo%20de%20aplicaciones%20web%20II/preview/preview1.png?raw=true)
![2](https://github.com/renz0fbn/ing-software-3-2022/blob/main/Desarrollo%20de%20aplicaciones%20web%20II/preview/preview2.png?raw=true)
![3](https://github.com/renz0fbn/ing-software-3-2022/blob/main/Desarrollo%20de%20aplicaciones%20web%20II/preview/preview3.png?raw=true)
![4](https://github.com/renz0fbn/ing-software-3-2022/blob/main/Desarrollo%20de%20aplicaciones%20web%20II/preview/preview4.png?raw=true)
![5](https://github.com/renz0fbn/ing-software-3-2022/blob/main/Desarrollo%20de%20aplicaciones%20web%20II/preview/preview5.png?raw=true)
![6](https://github.com/renz0fbn/ing-software-3-2022/blob/main/Desarrollo%20de%20aplicaciones%20web%20II/preview/preview6.png?raw=true)
![7](https://github.com/renz0fbn/ing-software-3-2022/blob/main/Desarrollo%20de%20aplicaciones%20web%20II/preview/preview7.png?raw=true)

(Los datos de noticias y usuarios, NO vienen incluidos)
</details>

## Pre-requisitos
(click para ir a la página de descarga)

- [Vagrant](https://www.vagrantup.com/downloads)
- [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
- [Git](https://git-scm.com/downloads)
- Descarga [SenatiNews](https://github.com/renz0fbn/ing-software-3-2022/releases/download/POO/senatiNews.zip) y descomprímelo en tu carpeta de preferencia

# Set-Up Project

## Crear máquina virtual

### Instalar Laravel Homestead
Full guía [aquí](https://laravel.com/docs/9.x/homestead)

Clonar el siguiente repositorio:

```
git clone https://github.com/laravel/homestead.git ~/Homestead
```

Después de clonar el repositorio, pasar a la rama ``` release ``` que contiene la última versión estable de Homestead

```
cd ~/Homestead
 
git checkout release
```
Una vez terminado, crear el archivo de configuración, para ello ejecuta:
```
# macOS / Linux...
bash init.sh
 
# Windows...
init.bat
```
Luego agregar una nueva máquina a Vagrant:

```
vagrant box add laravel/homestead
```
Selecionar la opcion 3 (virtualBox), luego ir a la carpeta del proyecto ``` senatiNews ``` y copiar el archivo ``` Homestead.yaml ```. Edita la línea 13 del archivo con la ubicación de la carpeta ``` senatiNews ```.

Finalmente, ejecuta dentro de la carpeta ``` ~/Homestead ``` 

```
vagrant up
```
Para encender la máquina, puedes usar ese comando, siempre y cuando estés en ``` ~/Homestead ```, o puedes encenderlo a través del gui interface de VirtualBox.

RECUERDA ENCENDER LA MÁQUINA PARA QUE TODO FUNCIONE

## Crear tablas y relaciones en la base de datos

Dentro de la carpeta ``` senatiNews ``` existe el archivo ``` DataBaseBuilder.sql ```, conéctate a la base de datos y ejecuta el código. Este creará todas las tablas necesarias para proyecto.

### Conectarse a la base de datos

- Host:       192.168.56.56
- User:       homestead
- Password:   secret
- Database:   senatiNews

Puedes conectarte mediante la aplicación que gustes.
## Agregar página a mi host
Ubicación del archivo host, según tu sistema operativo [aquí](https://www.swhosting.com/es/comunidad/manual/modificar-fichero-hosts-en-windows-mac-y-linux).

Dentro de tu archivo host agregar al final:

```
192.168.56.56       senati.news
``` 
Listo, página agregada con éxito

## Instalar dependencias con composer

Entra a la máquina virtual con ``` vagrant ssh ``` o a través de virtual box (recomendado).

- User: vagrant
- Password: vagrant

Entra al proyecto con:

```
cd code/senatiNews
``` 
Luego ejecuta:

```
composer install
``` 
para instalar todas las dependencias

### Solucionar error con vlucas

Al ingresar a la página web ``` senati.news ```, aparecerá un error con una dependencia, ir al archivo que se menciona y cambiar ``` auto_detect_line_endings ``` por ``` auto_detect_line ```. Eso debería solucionar el problema.

FELICIDADES, TODO ESTÁ LISTO

Ingresa a ``` senati.news ``` con tu navegador favorito y disfruta. 

