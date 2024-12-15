INSTRUCCIONES DE DESPLIEGUE

- Configuración del entorno Web

Descargar el proyecto desde https://github.com/Luislo888/prueba_tecnica_scandinavian_travel en nuestro servidor web.

En en este caso está desarrollado con Apache 2.4, PHP 7.4 y MySQL Sever 8.0 (MariaDB)

En PHP tendremos que tener correctamente configurados los certificados, añadiendo las instrucciones en nuestro php.ini y alojando dicho archivo en la siguientes ruta:

openssl.cafile="C:/Apache24/cacert.pem"
curl.cainfo="C:/Apache24/cacert.pem"

En Apache para poder ejecutar PHP deberemos tener en nuestro httpd las siguientes instrucciones:

AddHandler application/x-httpd-php .php
LoadModule php7_module "C:/php/php7apache2_4.dll"
PHPiniDir "C:/php"


- Configuración del proyecto

Dentro del proyecto encontraremos archivos de configuración que tendremos que modificar para que se aducúen a nuestro entorno:

/config/apiConfig.php
ACCESS_KEY: Nuestra ACCESS_KEY
SECRET_KEY: Nuestra SECRET_KEY

Si lo deseamos también podemos modificar los siguientes campos:
"country" => 
"currency" =>
"payment_method_types_include" =>

/dbConfig.php

Introduciremos los datos de conexión a la base de datos. 

HOST = Ruta de nuestro servidor de Base de Datos
DB = Nombre de la base de datos (en este caso el script de creación se llama "Shop")
USER = Usuario para acceder al servidor de Base de Datos
PASS = Contraseña para acceder al servidor de Base de Datos

Dentro del proyecto en Root, tenemos el archivo database.sql que nos creará la Base de Datos.

/pathConfig.php

SERVERNAME = Nuestra ruta desde donde hacemos de servidor web
SERVERPORT = El puerto por el que hacemos de servidor web
PROJECTPATH = La ruta donde se alojan los proyectos web