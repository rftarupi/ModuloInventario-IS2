<?php
include_once '/../DataBase.php';
include_once 'Producto.php';

class ProductosModel {
    public function getProductos() {
        // Obtención de informacion de la Base de Datos mediante consulta sql
        $pdo = Database::connect();
        $sql = "select * from INV_TAB_PRODUCTOS order by ID_PROD";
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
        $sql = "select * from INV_TAB_PRODUCTOS where ID_PROD=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID_PROD));

        // Guardamos el resultado obtenido en objeto tipo Producto
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $producto = new Producto($res['ID_PROD'], $res['NOMBRE_PROD'], $res['DESCRIPCION_PROD'], $res['GRABA_IVA_PROD'], $res['COSTO_PROD'], $res['PVP_PROD'], $res['ESTADO_PROD'], $res['STOCK_PROD']);
        Database::disconnect();

        // Retornamos el Usuario encontrado
        return $producto;
    }
     // Método para insertar un Producto
    public function insertarProducto($ID_PROD, $NOMBRE_PROD, $DESCRIPCION_PROD, $GRABA_IVA_PROD, $COSTO_PROD, $PVP_PROD, $ESTADO_PROD, $STOCK_PROD) {
        // Conexión a Base de Datos y creación de consulta sql
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into INV_TAB_PRODUCTOS(ID_PROD, NOMBRE_PROD, DESCRIPCION_PROD, GRABA_IVA_PROD, COSTO_PROD,PVP_PROD, ESTADO_PROD, STOCK_PROD) values(?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);

        //Ejecutamos la consulta y pasamos los parametros
        try {
            $consulta->execute(array($ID_PROD, $NOMBRE_PROD, $DESCRIPCION_PROD, $GRABA_IVA_PROD, $COSTO_PROD, 
                                      $PVP_PROD, $ESTADO_PROD, $STOCK_PROD));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    // Método para eliminar Producto
    public function eliminarProducto($ID_PROD) {
        // Conexión a BD y ejecución de consulta sql
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from INV_TAB_PRODUCTOS where ID_PROD=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID_PROD));
        Database::disconnect();
    }
     // Método para actualizar parámetros de Producto
    public function actualizarProducto($ID_PROD, $NOMBRE_PROD, $DESCRIPCION_PROD, $GRABA_IVA_PROD, $COSTO_PROD, 
                                      $PVP_PROD, $ESTADO_PROD, $STOCK_PROD) {
        // Conexión a BD y creación de consulta sql
        $pdo = Database::connect();
        $sql = "update INV_TAB_PRODUCTOS set  NOMBRE_PROD=?, DESCRIPCION_PROD=?, GRABA_IVA_PROD=?, COSTO_PROD=?, PVP_PROD=?, ESTADO_PROD=?, STOCK_PROD=? where ID_PROD=?";
        $consulta = $pdo->prepare($sql);

        //Ejecutamos la consulta y pasamos los parametros
        try {
            $consulta->execute(array($NOMBRE_PROD, $DESCRIPCION_PROD, $GRABA_IVA_PROD, $COSTO_PROD, 
                                      $PVP_PROD, $ESTADO_PROD, $STOCK_PROD,$ID_PROD));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    //activo y inactivo
    public function obtenerEstadoProducto($ID_PRO){
        $productoModel = new ProductosModel();
        $producto = $productoModel->getProducto($ID_PRO);
        $estado=NULL;
        switch ($producto->getESTADO_PROD()){
            case "A": $estado = "Activo";
                break;
            case "I": $estado = "Inactivo";
                break;
        }
        return $estado;
    }
    
    //Iva si o no 
    
    public function grabaIva($ID_PROD){
        $productoModel = new ProductosModel();
        $producto = $productoModel->getProducto($ID_PROD);
        $iva=NULL;
        switch ($producto->getGRAVA_IVA_PROD()){
            case "S": $iva = "Si";
                break;
            case "N": $iva = "No";
                break;
        }
        return $iva;
    }

public function generarCodigoProducto() {
        $pdo = Database::connect();
        $sql = "select max(ID_PROD) as cod from INV_TAB_PRODUCTOS";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $nuevoCod = '';
        if ($res['cod'] == NULL) {
            $nuevoCod = 'PROD-0001';
        } else {  
            $rest=  ((substr($res['cod'], -4))+1).''; // Separacion de la parte numerica AJUS-0023  --> 23
            // Ciclo que completa el codigo segun lo retornado para completar los 9 caracteres 
            // AJUS-00 --> 67, AJUS-0 --> 786
            if($rest >1 && $rest <=9){
                $nuevoCod = 'PROD-000'.$rest;
            }else{
                if($rest >=10 && $rest <=99){
                    $nuevoCod = 'PROD-00'.$rest;
                }else{
                    if($rest >=100 && $rest <=999){
                    $nuevoCod = 'PROD-0'.$rest;
                    }else{
                       $nuevoCod = 'PROD-'.$rest; 
                    }                    
                } 
            }
        }
        Database::disconnect();
        return $nuevoCod; // RETORNO DEL NUEVO CODIGO DE AJUSTE
    }
    
    
}