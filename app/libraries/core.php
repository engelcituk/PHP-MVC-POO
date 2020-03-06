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
         $this->getUrl();
     }
     public function getUrl(){
         echo $_GET['url'];
     }

 }
