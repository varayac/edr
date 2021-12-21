<?php
include_once("db.php");
class usuario
{
    
    public function listarUsuarios()
    {
        $DB = new db();
        $q = "SELECT * FROM usuario u INNER JOIN perfil p USING(ID_PERFIL) WHERE u.ACTIVO = 1";

        return $query = $DB->conexion->query($q);
    }
    
    public function crearUsuario($nombre, $pass, $perf)
    {
        $db = new db();
        $q = "INSERT INTO usuario (nombre, password, id_perfil) VALUES ('" . $nombre . "',md5('" . $pass . "'), $perf)";
        
        return $query = $db->conexion->query($q);
    }
    
    public function existeUsuario($nombre)
    {
        $q="SELECT * FROM usuario WHERE nombre = '" . $nombre . "' ";
        $db = new db();
        //$num = $db->conexion->query($q);
        return mysqli_num_rows($db->conexion->query($q));
    }

    public function login($usuario, $password){
        $db = new db();
        $q = "SELECT * FROM usuario u INNER JOIN perfil p USING(ID_PERFIL) WHERE u.NOMBRE= '".$usuario."' AND u.PASSWORD= '".$password."' AND u.ACTIVO = 1";

        return $db->conexion->query($q);
    }
    
    public function usuarioPorId($id){
        $db = new db();
        $q = "SELECT * FROM usuario u INNER JOIN perfil p USING(ID_PERFIL) WHERE u.ID_USUARIO=".$id." ";
        return $db->conexion->query($q);
    }

    public function editaUsuario($nombre, $perf, $passwd, $updt, $id){
        $db = new db();
        $q = "UPDATE usuario SET NOMBRE ='".$nombre."', ID_PERFIL= $perf, PASSWORD='".$passwd."', UPDATED_AT = '".$updt."' WHERE id_usuario = $id ";
        return $db->conexion->query($q);
    }

    public function eliminaUsuario($id){
        $db = new db();
        $updt = date("Y-m-d H:m:s");
        $q = "UPDATE usuario SET ACTIVO = 0, UPDATED_AT = '".$updt."' WHERE id_usuario = $id ";
        return $db->conexion->query($q);
    }
}