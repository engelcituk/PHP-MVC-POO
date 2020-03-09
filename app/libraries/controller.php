<?php
/**
 * Controlador base
 * Carga de modelos y vistas
 */
 class Controller {
     //cargar modelo
     public function model($model){
         // requerir el archivo del modelo
         require_once '../app/models/'.$model.'.php';
         // se instancia el modelo
         return new $model();   

     }
     //metodo para cargar la vista
     public function view($view, $data=[]){
        // verificamos que el archivo de la vista exista dentro de la carpeta vistas
        if(file_exists('../app/views/'. $view. '.php')){
            //requerimos la vista
            require_once '../app/views/'. $view. '.php';
        }else{
            // si la vista no existe
            die('La vista no existe');
        }
    }
 }
