<?php

// Esta clase contiene los métodos del CRUD de Tipo Usuarios

class TiposUsuarioModel {
    // Obtención de todos los tipos de usuario en array
    public function getTiposUsuario() {
        // Obtención de informacion de la Base de Datos mediante consulta sql
        $pdo = Database::connect();
        $sql = "select * from inv_tab_tipo_usuario order by ID_TIPO_USU";
        $resultado = $pdo->query($sql);

        //transformamos los registros en objetos de tipo TipoUsuario y guardamos en array
        $listadoTiposUsuario = array();
        foreach ($resultado as $res) {
            $tipoUsuario = new TipoUsuario($res['ID_TIPO_USU'], $res['NOMBRE_TIPO_USU']);
            array_push($listadoTiposUsuario, $tipoUsuario);
        }

        // Desconección de la Base de Datos
        Database::disconnect();

        // Retornamos el listado resultante:
        return $listadoTiposUsuario;
    }
    
    // Método para Obtener información de un Tipo de usuario especificando su Id
    public function getTipoUsuario($ID_TIPO_USU) {
        //Obtención de informacion de la Base de Datos mediante consulta sql
        $pdo = Database::connect();
        $sql = "select * from inv_tab_tipo_usuario where ID_TIPO_USU=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID_TIPO_USU));

        // Guardamos el resultado obtenido en objeto tipo TipoUsuario
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $tipoUsuario = new TipoUsuario($res['ID_TIPO_USU'], $res['NOMBRE_TIPO_USU']);
        Database::disconnect();

        // Retornamos el Tipo de Usuario encontrado
        return $tipoUsuario;
    }
    
    // Método para insertar un Tipo de Usuario
    public function insertarTipoUsuario($ID_TIPO_USU, $NOMBRE_TIPO_USU) {
        // Conexión a Base de Datos y creación de consulta sql
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into inv_tab_tipo_usuario(ID_TIPO_USU, NOMBRE_TIPO_USU) values(?,?)";
        $consulta = $pdo->prepare($sql);

        //Ejecutamos la consulta y pasamos los parametros
        try {
            $consulta->execute(array($ID_TIPO_USU, $NOMBRE_TIPO_USU));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    // Método para eliminar Tipo Usuario
    public function eliminarTipoUsuario($ID_TIPO_USU) {
        // Conexión a BD y ejecución de consulta sql
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from inv_tab_tipo_usuario where ID_TIPO_USU=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID_TIPO_USU));
        Database::disconnect();
    }

    // Método para actualizar parámetros de Tipo Usuario
    public function actualizarTipoUsuario($ID_TIPO_USU, $NOMBRE_TIPO_USU) {
        // Conexión a BD y creación de consulta sql
        $pdo = Database::connect();
        $sql = "update inv_tab_tipo_usuario set NOMBRE_TIPO_USU=?, Where ID_TIPO_USU=?";
        $consulta = $pdo->prepare($sql);

        //Ejecutamos la consulta y pasamos los parametros
        try {
            $consulta->execute(array($NOMBRE_TIPO_USU, $ID_TIPO_USU));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
}
