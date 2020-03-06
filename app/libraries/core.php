<?php

/**
 * clase principal de la aplicación
 * Crea URL y cargar del controllador nucleo
 * Formateo de la URL /controllador/metodo/parametros
 */
 class Core {
     protected $controladorActual = 'Paginas';
     protected $metodoActual = 'index';
     protected $parametros = [];

     public function __construct(){
         $url = $this->getUrl() ? $this->getUrl() : 'Paginas';// operador ternario
         // busca en los controladores el primer valor de nuestro array url
         if(file_exists('../app/controllers/'. ucwords($url[0]).'.php')){
             // sí existe, establezco ese controlador en la propiedad $controladorActual
             $this->controladorActual = ucwords($url[0]);
             unset($url[0]); // elimino la variable con el indice 1
         }

         // Requiero el controllador
         require_once '../app/controllers/'.$this->controladorActual.'.php';

         // instancio la clase controlador
         $this->controladorActual = new $this->controladorActual;
     }
     public function getUrl(){         
         if(isset($_GET['url'])){
             $url = rtrim($_GET['url'],'/'); // elimino los diagonales al final
             $url = filter_var($url, FILTER_SANITIZE_URL);// sanitizo la url
             $url = explode('/', $url); // divide la cadena en partes (creando un array)
             return $url; // regreso url en un array
         }
     }

 }
