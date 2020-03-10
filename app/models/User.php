<?php
    
class User {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // encontrar usuario por su email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email ');
        //enlazo parametro
        $this->db->bind(':email',$email);
        $row = $this->db->single();

        // revisamos Conteo de filas
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    //registrar usuario
    public function register($data){
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        // enlazamos parametros
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);
        //ejecución
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
}