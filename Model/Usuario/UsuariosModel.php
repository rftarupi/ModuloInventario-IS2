<?php
include_once 'DataBase.php';
include_once 'Usuario.php';

// Esta clase contiene los métodos del CRUD de Usuarios
class UsuariosModel {

    public function getUsuarios() {
        // Obtención de informacion de la Base de Datos mediante consulta sql
        $pdo = Database::connect();
        $sql = "select * from inv_tab_usuarios order by ID_USU";
        $resultado = $pdo->query($sql);

        //transformamos los registros en objetos de tipo Usuario y guardamos en array
        $listadoUsuarios = array();
        foreach ($resultado as $res) {
            $usuario = new Usuario($res['ID_USU'], $res['ID_TIPO_USU'], $res['CEDULA_RUC_PASS_USU'], $res['NOMBRES_USU'], $res['APELLIDOS_USU'], $res['FECH_NAC_USU'], $res['CIUDAD_NAC_USU'], $res['DIRECCION_USU'], $res['FONO_USU'], $res['E_MAIL_USU'], $res['ESTADO_USU'], $res['CLAVE_USU']);
            array_push($listadoUsuarios, $usuario);
        }

        // Desconección de la Base de Datos
        Database::disconnect();

        // Retornamos el listado resultante:
        return $listadoUsuarios;
    }

    // Método para Obtener información de un usuario especificando su Id
    public function getUsuario($ID_USU) {
        //Obtención de informacion de la Base de Datos mediante consulta sql
        $pdo = Database::connect();
        $sql = "select * from inv_tab_usuarios where ID_USU=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID_USU));

        // Guardamos el resultado obtenido en objeto tipo Usuario
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $usuario = new Usuario($res['ID_USU'], $res['ID_TIPO_USU'], $res['CEDULA_RUC_PASS_USU'], $res['NOMBRES_USU'], $res['APELLIDOS_USU'], $res['FECH_NAC_USU'], $res['CIUDAD_NAC_USU'], $res['DIRECCION_USU'], $res['FONO_USU'], $res['E_MAIL_USU'], $res['ESTADO_USU'], $res['CLAVE_USU']);
        Database::disconnect();

        // Retornamos el Usuario encontrado
        return $usuario;
    }

    // Método para insertar un Usuario
    public function insertarUsuario($ID_USU, $ID_TIPO_USU, $CEDULA_RUC_PASS_USU, $NOMBRES_USU, $APELLIDOS_USU, $FECH_NAC_USU, $CIUDAD_NAC_USU, $DIRECCION_USU, $FONO_USU, $E_MAIL_USU, $ESTADO_USU, $CLAVE_USU) {
        // Conexión a Base de Datos y creación de consulta sql
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into inv_tab_usuarios(ID_USU, ID_TIPO_USU, CEDULA_RUC_PASS_USU, NOMBRES_USU, APELLIDOS_USU,"
                . "FECH_NAC_USU, CIUDAD_NAC_USU, DIRECCION_USU, FONO_USU, E_MAIL_USU, ESTADO_USU, CLAVE_USU) values(?,?,?,?,?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);

        //Ejecutamos la consulta y pasamos los parametros
        try {
            $consulta->execute(array($ID_USU, $ID_TIPO_USU, $CEDULA_RUC_PASS_USU, $NOMBRES_USU, $APELLIDOS_USU,
                $FECH_NAC_USU, $CIUDAD_NAC_USU, $DIRECCION_USU, $FONO_USU, $E_MAIL_USU, $ESTADO_USU, $CLAVE_USU));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    // Método para eliminar Usuario
    public function eliminarUsuario($ID_USU) {
        // Conexión a BD y ejecución de consulta sql
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from inv_tab_usuarios where ID_USU=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID_USU));
        Database::disconnect();
    }

    // Método para actualizar parámetros de Usuario
    public function actualizarUsuario($ID_USU, $ID_TIPO_USU, $CEDULA_RUC_PASS_USU, $NOMBRES_USU, $APELLIDOS_USU, $FECH_NAC_USU, $CIUDAD_NAC_USU, $DIRECCION_USU, $FONO_USU, $E_MAIL_USU, $ESTADO_USU, $CLAVE_USU) {
        // Conexión a BD y creación de consulta sql
        $pdo = Database::connect();
        $sql = "update inv_tab_usuarios set ID_TIPO_USU=?, CEDULA_RUC_PASS_USU=?, NOMBRES_USU=?, APELLIDOS_USU=?, FECH_NAC_USU=?, CIUDAD_NAC_USU=?,"
                . "DIRECCION_USU=?, FONO_USU=?, E_MAIL_USU=?, ESTADO_USU=?, CLAVE_USU=? where ID_USU=?";
        $consulta = $pdo->prepare($sql);

        //Ejecutamos la consulta y pasamos los parametros
        try {
            $consulta->execute(array($ID_TIPO_USU, $CEDULA_RUC_PASS_USU, $NOMBRES_USU, $APELLIDOS_USU,
                $FECH_NAC_USU, $CIUDAD_NAC_USU, $DIRECCION_USU, $FONO_USU, $E_MAIL_USU, $ESTADO_USU, $CLAVE_USU, $ID_USU));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    // Método para obtener el significado de la nomenclatura de Estado de Usuario
    public function obtenerEstadoUsuario($ID_USU){
        $usuariosModel = new UsuariosModel();
        $usuario = $usuariosModel->getUsuario($ID_USU);
        $estado=NULL;
        switch ($usuario->getESTADO_USU()){
            case "A": $estado = "Activo";
                break;
            case "I": $estado = "Inactivo";
                break;
        }
        return $estado;
    }
    
    // METODO PARA GENERAR AUTOMATICAMENTE EL CODIGO DE UN USUARIO -- USUA-0001
     public function generarCodigoUsuario() {
        $pdo = Database::connect();
        $sql = "select max(ID_USU) as cod from INV_TAB_USUARIOS";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $nuevoCod = '';
        if ($res['cod'] == NULL) {
            $nuevoCod = 'USUA-0001';
        } else {  
            $rest=  ((substr($res['cod'], -4))+1).''; // Separacion de la parte numerica USUA-0023  --> 23
            // Ciclo que completa el codigo segun lo retornado para completar los 9 caracteres 
            // USUA-00 --> 67, USUA-0 --> 786
            if($rest >1 && $rest <=9){
                $nuevoCod = 'USUA-000'.$rest;
            }else{
                if($rest >=10 && $rest <=99){
                    $nuevoCod = 'USUA-00'.$rest;
                }else{
                    if($rest >=100 && $rest <=999){
                    $nuevoCod = 'USUA-0'.$rest;
                    }else{
                       $nuevoCod = 'USUA-'.$rest; 
                    }                    
                } 
            }
        }
        Database::disconnect();
        return $nuevoCod; // RETORNO DEL NUEVO CODIGO DE USUARIO
    }
    
    //$rest = substr("abcdef", -1);    // devuelve "f"
    //$rest = substr("abcdef", -2);    // devuelve "ef"
    //$rest = substr("abcdef", -3, 1); // devuelve "d"
    
    // M E T O D O S   C R U D   D E   U S U A R I O S
    
}
