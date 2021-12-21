<?php
include_once("db.php");
class compra
{

    public function listaCompras()
    {
        $DB = new db();
        $q = "SELECT f.numero, p.nombre, p.rut, f.total  from detalle_compra dc inner join  producto pro using(id_producto) inner join factura f using(id_factura) inner join proveedor p using(id_proveedor) where f.tipo = 'fact_compra'";

        return $query = $DB->conexion->query($q);
    }

    public function crearCompra($numero, $id_proveedor,$total)
    {
        $tipo = 'fact_venta';
        $db = new db();
        $q = "INSERT INTO factura (numero, id_cliente,tipo, total) values ($numero,$id_proveedor,'".$tipo."', $total)";

        return $query = $db->conexion->query($q);
    }
}