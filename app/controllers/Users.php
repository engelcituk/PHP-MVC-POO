<?php
class Users extends Controller {

    public function __construct()
    {
        $this->userModel = $this->model('User');
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
            }else{
                // revisamos que el email no exista en la BD
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'El email ya existe en la base de datos';
                }
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
                //cifrar la contraseña
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //registrar al usuario
                if($this->userModel->register($data)){
                    flash('register_success','Ya estás registrado y puedes iniciar sesión');
                    redirect('users/login');
                }else{
                    die('Algo malo pasó');
                }

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
            // verificar usuario / correo
            if($this->userModel->findUserByEmail($data['email'])){
                // usuario encontrado
            }else{
                // usuario no encontrado
                $data['email_err'] = 'El usuario no se ha encontrado';
            }
            // asegurarse de que los errores esten vacíos
            if( empty($data['email_err']) && empty($data['password_err']) ){
                //validado
                //verificar y configurar que el usuario se conecte
                $user = $this->userModel->login($data['email'],$data['password']);// traigo los datos del usuario
                //si user trae valor
                if( $user ){
                    // creamos variables de sesión
                    $this->createUserSession( $user );
                }else{
                    $data['password_err'] = 'Contraseña incorrecta';
                    //recargamos la vista
                    $this->view('users/login', $data);
                }
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
    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        redirect('posts');        
    }
    public function logout(){
        //elimino las variables de sesion 
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);

        session_destroy();// destruyo la sesion 

        redirect('users/login'); //redirijo
    }    
}






