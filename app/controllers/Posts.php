<?php

class Posts extends Controller {
   
    public function __construct()
    {       
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }
    public function index(){
        //obtengo los posts

        $posts = $this->postModel->getPosts();

        $data =[
            'posts'=>$posts
        ];
        
        $this->view('posts/index', $data);

    }

    public function add(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //sanitizamos los datos que vienen por POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id'=> $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];

            //Validamos el titulo
            if (empty($data['title'])) {
                $data['title_err'] = 'Por favor ingrese el título del post';
            }

            //Validamos el cuerpo de la publicación
            if (empty($data['body'])) {
                $data['body_err'] = 'Por favor ingrese el contenido del post';
            }
            // asegurarse de que no haya errores
            if (empty($data['title_err']) && empty($data['body_err']) ) {
                //validado
                if($this->postModel->addPost($data)){
                    flash('post_mensaje','Publicación realizada');
                    redirect('posts');
                }else{
                    die('algo pasó mal');
                }                          
            } else {
                // carga la vista register con el arreglo de errores y se imprimirian en el formulario
                $this->view('posts/add', $data);
            }

        }else {
            $data = [
                'title' => '',
                'body' => ''
            ];

            $this->view('posts/add', $data);
        }        
    }

    public function show($id){
        $post = $this->postModel->getPostById($id); 
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user'=> $user
        ];

        $this->view('posts/show', $data);        
    }
   
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //sanitizamos los datos que vienen por POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id'=> $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];

            //Validamos el titulo
            if (empty($data['title'])) {
                $data['title_err'] = 'Por favor ingrese el título del post';
            }

            //Validamos el cuerpo de la publicación
            if (empty($data['body'])) {
                $data['body_err'] = 'Por favor ingrese el contenido del post';
            }
            // asegurarse de que no haya errores
            if (empty($data['title_err']) && empty($data['body_err'])) {
                //validado
                if ($this->postModel->updatePost($data)) {
                    flash('post_mensaje', 'Publicación actualizada');
                    redirect('posts');
                } else {
                    die('algo pasó mal');
                }
            } else {
                // carga la vista register con el arreglo de errores y se imprimirian en el formulario
                $this->view('posts/edit', $data);
            }
        } else {
            //obtener publicacion existente en el modelo
            $post = $this->postModel->getPostById($id);
            // reviso si eres el dueño
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }
            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body
            ];

            $this->view('posts/edit', $data);
        }
    }
    public function delete($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //obtener publicacion existente en el modelo
            $post = $this->postModel->getPostById($id);
            // reviso si eres el dueño
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }
            // elimino el post
            if($this->postModel->deletePost($id)){
                flash('post_mensaje', 'Publicación eliminada');
                redirect('posts');
            }else{
                die('algo pasó mal');
            }
        }else{
            redirect('posts');
        }
    }
}

