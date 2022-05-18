# Desarrollo de aplicaciones Web II

## Trabajo del curso - TR1

## Pre-requisitos
(click para ir a la página de descarga)

- [Vagrant](https://www.vagrantup.com/downloads)
- [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
- [Git](https://git-scm.com/downloads)
- Descarga [SenatiNews](https://github.com/renz0fbn/ing-software-3-2022/releases/download/POO/senatiNews.zip) y descomprímelo en tu carpeta de preferencia

# Set-Up Project

## Crear maquina virtual

### Instalar Laravel Homestead
Full guia [aqui](https://laravel.com/docs/9.x/homestead)

Clonar el siguiente repositorio:

```
git clone https://github.com/laravel/homestead.git ~/Homestead
```

Despues de clonar el repositorio, pasar a la rama ``` release ``` que contiene la ultima version estable de Homestead

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
Luego agregar una nueva maquina a Vagrant:

```
vagrant box add laravel/homestead
```
Selecionar la opcion 3 (virtualBox), luego ir a la carpeta del proyecto ``` senatiNews ``` y copiar el archivo ``` Homestead.yaml ```. Edita la linea 13 del archivo con la ubicación de la carpeta ``` senatiNews ```.

Finalmente ejecuta dentro de la carpeta ``` ~/Homestead ``` 

```
vagrant up
```
para encender la maquina, puedes usar ese comando, siempre y cuando estes en ``` ~/Homestead ``` , o puedes encenderlo atravez del gui interface de virtualBox.

RECUERDA ENCENDER LA MAQUINA PARA QUE TODO FUNCIONE

## Crear tablas y relaciones en la base de datos

Dentro de la carpeta ``` senatiNews ``` existe el archivo ``` DataBaseBuilder.sql ```, conectate a la base de datos y ejecuta el codigo. Este creará todas las tablas necesarias para proyecto.

### Conectarse a la base de datos

- Host:       192.168.56.56
- User:       homestead
- Password:   secret
- Database:   senatiNews

Puedes conectarte mediante la aplicacion que gustes.
## Agregar página a mi host
Ubicación del archivo host, segun tu sistema operativo [aquí](https://www.swhosting.com/es/comunidad/manual/modificar-fichero-hosts-en-windows-mac-y-linux) .

agregar al final:

```
192.168.56.56       senati.news
``` 
Listo, pagina agregada con exito

## Instalar dependencias con composer

Entra a la maquina virtual con ``` vagrant ssh ``` o atravez de virtual box (recomendado).

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

Al ingresar a la pagina web ``` senati.news ``` , aparecerá un error con una dependencia, ir al archivo que se menciona y cambiar ``` auto_detect_line_endings ``` por ``` auto_detect_line ```. Eso deberia solucionar el problema.

FELICIDADES TODO ESTA LISTO

Ingresa a ``` senati.news ``` con tu navegador favorito y disfruta. 

