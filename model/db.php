<?php

class db{
    public $conexion;
    private $host = '192.168.0.25';
    private $user_db = 'root';
    private $pass_db = 'admin11';
    private $db = 'tuoficina';

public function __construct()
    {
    $this->conexion = new mysqli(
        $this->host,
        $this->user_db,
        $this->pass_db,
        $this->db
    );

        if($this->conexion->error){
            die("Error en la conexion MySql".$this->conexion->error);
        }
    }

    public function cerrar(){
        $this->conexion->close();
    }

}