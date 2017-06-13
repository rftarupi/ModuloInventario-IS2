<?php
include_once '../DataBase.php';
include_once 'Producto.php';

class ProductosModel {
    public function getProducto() {
        // Obtención de informacion de la Base de Datos mediante consulta sql
        $pdo = Database::connect();
        $sql = "select * from inv_tab_productos order by ID_PROD";
        $resultado = $pdo->query($sql);

        //transformamos los registros en objetos de tipo Producto y guardamos en array
        $listadoProductos = array();
        foreach ($resultado as $res) {
            $producto = new Producto($res['ID_PROD'], $res['NOMBRE_PROD'], $res['DESCRIPCION_PROD'], $res['NOMBRES_USU'], $res['APELLIDOS_USU'], $res['FECH_NAC_USU'], $res['CIUDAD_NAC_USU'], $res['DIRECCION_USU'], $res['FONO_USU'], $res['E_MAIL_USU'], $res['ESTADO_USU']);
            array_push($listadoUsuarios, $usuario);
        }
    }
}