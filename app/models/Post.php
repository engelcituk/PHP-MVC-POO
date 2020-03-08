<?php

class Post { 
/* como convencion, el modelo es singular y su controlador 
respectivo es en plural
*/
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }
}