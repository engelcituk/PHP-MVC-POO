<?php

/**
 * Clase base de datos PDO
 * Conectar a la base de datos
 * Crear sentencias preparadas
 * Bind values (valores enlazados)
 * Retorno de resultados
 */

 class Database {

     private $host = DB_HOST;
     private $user = DB_USER;
     private $pass = DB_PASS;
     private $dbname = DB_NAME;

     private $dbh; // database handler
     private $stmt; // sentencia
     private $error;

     public function __construct()
     {
         // seteamos Nombre del Origen de Datos (DSN)
         $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
         $options = array(
             PDO::ATTR_PERSISTENT => true,
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
         );

         // creamos una instancia de pdo
         try {
             $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
         } catch(PDOException $e) {
             $this->error = $e->getMessage();
             echo $this->error;
         }
     }

 }