<?php
class Users extends Controller {

    public function __construct()
    {
        
    }

    public function register(){
        // Verificar POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Procesa el formulario
        }else{
            //Iniciar data
            $data = [
                'name'=> '',
                'email'=> '' ,
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_' => '' ,
                'password_err' => '',
                'confirm_password_err' => ''

            ];
            // Cargar vista
            $this->view('users/register', $data);
        }
    }
    public function login(){
        // Verificar POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Procesa el formulario
        }else{
            //Iniciar data
            $data = [
                'email'=> '' ,
                'password' => '',
                'email_' => '' ,
                'password_err' => ''
            ];
            // Cargar vista
            $this->view('users/login', $data);
        }
    }
}