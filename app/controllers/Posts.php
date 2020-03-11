<?php

class Posts extends Controller {
   
    public function __construct()
    {
        // if(!isset($_SESSION['user_id'])){
        //     redirect('users/login');
        // }
        if (!isLoggedIn()) {
            redirect('users/login');
        }
    }
    public function index(){

        $data =[];
        
        $this->view('posts/index', $data);

    }

}