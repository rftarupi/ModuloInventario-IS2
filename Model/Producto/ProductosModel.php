<?php
include_once '../DataBase.php';
include_once 'Producto.php';

class ProductosModel {
    public function getProductos() {
        // Obtención de informacion de la Base de Datos mediante consulta sql
        $pdo = Database::connect();
        $sql = "select * from inv_tab_productos order by ID_PROD";
        $resultado = $pdo->query($sql);

        //transformamos los registros en objetos de tipo Producto y guardamos en array
        $listadoProductos = array();
        foreach ($resultado as $res) {
            $producto = new Producto($res['ID_PROD'], $res['NOMBRE_PROD'], $res['DESCRIPCION_PROD'], $res['GRABA_IVA_PROD'], $res['COSTO_PROD'], $res['PVP_PROD'], $res['ESTADO_PROD'], $res['STOCK_PROD']);
            array_push($listadoProductos, $producto);
        }
        // Desconección de la Base de Datos
        Database::disconnect();

        // Retornamos el listado resultante:
        return $listadoProductos;
    }
     // Método para Obtener información de un Producto especificando su Id
    public function getProducto($ID_PROD) {
        //Obtención de informacion de la Base de Datos mediante consulta sql
        $pdo = Database::connect();
        $sql = "select * from inv_tab_productos where ID_PROD=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID_PROD));

        // Guardamos el resultado obtenido en objeto tipo Producto
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $producto = new Producto($res['ID_PROD'], $res['NOMBRE_PROD'], $res['DESCRIPCION_PROD'], $res['GRABA_IVA_PROD'], $res['COSTO_PROD'], $res['PVP_PROD'], $res['ESTADO_PROD'], $res['DIRECCION_USU'], $res['STOCK_PROD']);
        Database::disconnect();

        // Retornamos el Usuario encontrado
        return $producto;
    }
     // Método para insertar un Producto
    public function insertarProducto($ID_PROD, $NOMBRE_PROD, $DESCRIPCION_PROD, $GRABA_IVA_PROD, $COSTO_PROD, $PVP_PROD, $ESTADO_PROD, $DIRECCION_USU, $STOCK_PROD) {
        // Conexión a Base de Datos y creación de consulta sql
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into INV_TAB_PRODUCTOS(ID_PROD, NOMBRE_PROD, DESCRIPCION_PROD, GRABA_IVA_PROD, COSTO_PROD,"
                . "PVP_PROD, ESTADO_PROD, STOCK_PROD) values(?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);

        //Ejecutamos la consulta y pasamos los parametros
        try {
            $consulta->execute(array($ID_PROD, $NOMBRE_PROD, $DESCRIPCION_PROD, $GRABA_IVA_PROD, $COSTO_PROD, 
                                      $PVP_PROD, $ESTADO_PROD, $DIRECCION_USU, $STOCK_PROD));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    
}