<?php

class Paginas extends Controller {

    public function __construct()
    {
        // echo 'paginas cargadas<br>';
    } 
    public function index(){
        $this->view('hola');
    }
    public function about($id){
        echo $id;
    }
}