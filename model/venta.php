<?php
include_once("db.php");
class venta
{

    public function listaVentas()
    {
        $DB = new db();
        $q = "SELECT f.numero, cli.nombre, cli.rut, f.total  from detalle_venta dv inner join  producto pro using(id_producto) inner join factura f using(id_factura) inner join cliente cli using(id_cliente) where f.tipo = 'fact_venta'";

        return $query = $DB->conexion->query($q);
    }

    public function crearVenta($numero, $id_cliente,$total)
    {
        $tipo = 'fact_venta';
        $db = new db();
        $q = "INSERT INTO factura (numero, id_cliente,tipo, total) values ($numero,$id_cliente,'".$tipo."', $total)";

        return $query = $db->conexion->query($q);
    }
}