
# Instalación y uso

1. Se requiere PHP en su version 7 en adelante. Recomendable tener tu entorno de prueba XAMPP en Windows o MAMP en Mac.
2. Poner en htdocs la carpeta del proyecto, (un nombre sin espacios).
3. En la estrucutura de directorios se cuenta con 3 archivos **.htaccess** de estos se tiene que cambiarle algo a uno de estos.
4. En la carpeta **public** se modifica en el **.htaccess** la linea ***/poomvc/public/*** por el nombre que le hayas puesto a tu directorio en htdocs. Como ejemplo, ***poomvc*** es la carpeta que contiene el proyecto, su **.htaccess**:

~~~
<IfModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On
    RewriteBase /poomvc/public/
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
~~~

5. Sí en htdocs le pones de nombre **mvc** a la carpeta del proyecto, **RewriteBase** queda como  ***RewriteBase /mvc/public/***, en resumen el código queda de la siguiente forma:

~~~
<IfModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On
    RewriteBase /mvc/public/
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
~~~

6. Dentro del directorio **app/config** hay un archivo llamado **config.php** con un contenido que tiene unas contantes:

~~~
    <?php 

    //parametros Base de datos
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('DB_NAME', 'mvcposts');

    // Raíz de la aplicación
    define('APPROOT', dirname(dirname (__FILE__)));
    // Url raíz
    define('URLROOT', 'http://localhost:8888/poomvc');
    //nombre del sitio
    define('SITENAME', 'MvcPosts');
    // version de nuestro aplicacion/framework
    define('APPVERSION', 'V1.0.0');
~~~

7. De esas constantes modificas su valor la constante **URLROOT**, por el nombre que tu le hayas puesto a la carpeta en **htdocs**. Donde **URLROOT** quedaría como **http://localhost/mvc** o **http://localhost:3030/mvc** si tu entorno de prueba de servidor requiere un puerto en especifico. De igual manera las constantes de base de datos cambiarlas por las propias, en una prueba en windows mis constantes quedan así como se muestra:

~~~
    <?php 

    //parametros Base de datos
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'mvcposts');

    // Raíz de la aplicación
    define('APPROOT', dirname(dirname (__FILE__)));
    // Url raíz
    define('URLROOT', 'http://localhost/mvc');
    //nombre del sitio
    define('SITENAME', 'MvcPosts');
    // version de nuestro aplicacion/framework
    define('APPVERSION', 'V1.0.0');
~~~
