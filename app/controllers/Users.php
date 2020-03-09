<?php
class Users extends Controller {

    public function __construct()
    {
        
    }

    public function register(){
        // Verificar POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Procesa el formulario
        
            //sanitizamos los datos que vienen por POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name'=> trim($_POST['name']),
                'email'=> trim($_POST['email']) ,
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '' ,
                'password_err' => '',
                'confirm_password_err' => ''

            ];
            
            //Validamos el nombre completo
            if(empty($data['name'])){
                $data['name_err'] = 'Por favor ingrese el nombre completo';
            }

            //Validamos el email
            if(empty($data['email'])){
                $data['email_err'] = 'Por favor ingrese un email';
            }

            //Validamos la contraseña
            if(empty($data['password'])){
                $data['password_err'] = 'Por favor ingrese la contraseña';
            }elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'La contraseña debe tener por lo menos 6 caracteres';
            }

            //Validamos el confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Por favor ingrese la contraseña de confirmación';
            }else{
                if( $data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Las contraseñas no son iguales, no coindicen';
                }
            }
            // asegurarse de que los errores esten vacíos
            if( empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                //validado
                die('Existoso');
            }else{
                // carga la vista register con el arreglo de errores y se imprimirian en el formulario
                $this->view('users/register', $data);
            }
        }else{
            
            //Iniciar data
            $data = [
                'name'=> '',
                'email'=> '' ,
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '' ,
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

            //sanitizamos los datos que vienen por POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email'=> trim($_POST['email']) ,
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '' 
            ];
            //Validamos el email
            if(empty($data['email'])){
                $data['email_err'] = 'Por favor ingrese su email';
            }
            //Validamos la contraseña
            if(empty($data['password'])){
                $data['password_err'] = 'Por favor ingrese la contraseña';
            }
            // asegurarse de que los errores esten vacíos
            if( empty($data['email_err']) && empty($data['password_err']) ){
                //validado
                die('Existoso');
            }else{
                // carga la vista login con el arreglo de errores y se imprimirían en el formulario
                $this->view('users/login', $data);
            }
            
        }else{
            //Iniciar data
            $data = [
                'email'=> '' ,
                'password' => '',
                'email_err' => '' ,
                'password_err' => ''
            ];
            // Cargar vista
            $this->view('users/login', $data);
        }
    }
}