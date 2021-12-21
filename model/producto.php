<?php
include_once("db.php");

class producto
{
    public function listarProductos()
    {
        $db = new db();
        $q = "SELECT * FROM producto WHERE ACTIVO =1";

        return $query = $db->conexion->query($q);
    }

    public function crearProducto($nombre, $codigo, $precio, $cantidad)
    {
        $db = new db();
        $q = "INSERT INTO producto (nombre, codigo, precio, cantidad ) VALUES ('" . $nombre . "','" . $codigo . "', $precio, $cantidad)";

        return $query = $db->conexion->query($q);
    }

    public function existeProd($nombre)
    {
        $q="SELECT * FROM producto WHERE nombre = '" . $nombre . "' ";
        $DB = new db();
        $num = $DB->conexion->query($q);
        return mysqli_num_rows($num);
    }

    public function productoPorId($id){
        $db = new db();
        $q = "SELECT * FROM producto WHERE ID_PRODUCTO=".$id." ";
        return $db->conexion->query($q);
    }

    public function editaProducto($nombre, $codigo, $precio, $cantidad, $updt, $id){
        $db = new db();
        $q = "UPDATE producto SET NOMBRE ='".$nombre."', CODIGO= '".$codigo."', PRECIO= $precio, CANTIDAD= $cantidad, UPDATED_AT = '".$updt."' WHERE ID_PRODUCTO = $id ";
        return $db->conexion->query($q);
    }

    public function eliminaProducto($id){
        $db = new db();
        $updt = date("Y-m-d H:m:s");
        $q = "UPDATE producto SET ACTIVO = 0, UPDATED_AT = '".$updt."' WHERE ID_PRODUCTO = $id ";
        return $db->conexion->query($q);
    }
}