<?php

class Paginas extends Controller {

    public function __construct()
    {
        $this->postModel= $this->model('Post');

    }

    public function index(){

        $posts = $this->postModel->getPosts();

        $data =[
            'titulo'=>'Bienvenido',
            'posts' =>$posts
        ];
        $this->view('paginas/index', $data);

    }

    public function about(){

        $this->view('paginas/about');        
    }
}