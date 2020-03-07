
<?php
// carga de archivo de configuracion 
require_once 'config/config.php';

// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';

// carga automática de nuestros archivos de la carpeta libraries-> bibliotecas base
spl_autoload_register( function($className){
    require_once 'libraries/'. $className .'.php';
});