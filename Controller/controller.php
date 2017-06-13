<?php

require_once '../model/UsuariosModel.php';

session_start();
$usuariosModel = new UsuariosModel();

// Recibimos la opcion desde la vista:
// 
$opcion1 = $_REQUEST['opcion1'];
$opcion2 = $_REQUEST['opcion2'];

unset($_SESSION['ErrorBaseDatos']);

switch ($opcion1) {
    case "usuario":
        switch ($opcion2) {
            case "listar":
                // Obtenemos el array que contiene el listado de Usuarios
                $listadoUsuarios = $usuariosModel->getUsuarios();

                // Guardamos los datos en una variable de sesion serializada
                $_SESSION['listadoUsuarios'] = serialize($listadoUsuarios);

                // Redireccionamos a la pagina principal para visualizar
                header('Location: ../View/Usuario/Usuarios.php');
                break;

            case "insertar":
                // Obtenemos parámetros enviados desde formulario de creación de Usuario
                $ID_USU = $_REQUEST['ID_USU'];
                $ID_TIPO_USU = $_REQUEST['ID_TIPO_USU'];
                $CEDULA_RUC_PASS_USU = $_REQUEST['CEDULA_RUC_PASS_USU'];
                $NOMBRES_USU = $_REQUEST['NOMBRES_USU'];
                $APELLIDOS_USU = $_REQUEST['APELLIDOS_USU'];
                $FECH_NAC_USU = $_REQUEST['FECH_NAC_USU'];
                $CIUDAD_NAC_USU = $_REQUEST['CIUDAD_NAC_USU'];
                $DIRECCION_USU = $_REQUEST['DIRECCION_USU'];
                $FONO_USU = $_REQUEST['FONO_USU'];
                $E_MAIL_USU = $_REQUEST['E_MAIL_USU'];
                $ESTADO_USU = $_REQUEST['ESTADO_USU'];

                // Enviamos parámetros a método de ingresar Usuario
                try {
                    $usuariosModel->insertarUsuario($ID_USU, $ID_TIPO_USU, $CEDULA_RUC_PASS_USU, $NOMBRES_USU, $APELLIDOS_USU, $FECH_NAC_USU, $CIUDAD_NAC_USU, $DIRECCION_USU, $FONO_USU, $E_MAIL_USU, $ESTADO_USU);
                } catch (Exception $e) {
                    $_SESSION['ErrorBaseDatos'] = $e->getMessage();
                }

                // Actualizamos y volvemos a serializar en variable de sesión la lista de Usuarios
                $listadoUsuarios = $usuariosModel->getUsuarios();
                $_SESSION['listadoUsuarios'] = serialize($listadoUsuarios);

                // Redireccionamos a la pagina principal para visualizar
                header('Location: ../View/Usuario/Usuarios.php');
                break;

            case "eliminar":
                // Obtenemos Id del Usuario a eliminar desde formulario
                $ID_USU = $_REQUEST['ID_USU'];

                // Eliminamos Usuario con método eliminarUsuario
                $usuariosModel->eliminarUsuario($ID_USU);

                // Actualizamos y volvemos a serializar en variable de sesión la lista de Usuarios
                $listadoUsuarios = $usuariosModel->getUsuarios();
                $_SESSION['listadoUsuarios'] = serialize($listadoUsuarios);

                // Redireccionamos a la pagina principal para visualizar
                header('Location: ../View/Usuario/Usuarios.php');
                break;

            case "editar":
                // Obtenemos Id del Usuario a editar desde formulario
                $ID_USU = $_REQUEST['ID_USU'];

                // Buscamos y obtenemos información del Usuario
                $usuario = $usuariosModel->getUsuario($ID_USU);

                // Guardamos datos del usuario en variable de sesión serializada
                $_SESSION['usuario'] = serialize($usuario);

                // Redireccionamos a vista para editar información
                header('Location: ../View/editarUsuario.php');
                break;

            case "guardar":
                //obtenemos los parametros del formulario
                $ID_USU = $_REQUEST['ID_USU'];
                $ID_TIPO_USU = $_REQUEST['ID_TIPO_USU'];
                $CEDULA_RUC_PASS_USU = $_REQUEST['CEDULA_RUC_PASS_USU'];
                $NOMBRES_USU = $_REQUEST['NOMBRES_USU'];
                $APELLIDOS_USU = $_REQUEST['APELLIDOS_USU'];
                $FECH_NAC_USU = $_REQUEST['FECH_NAC_USU'];
                $CIUDAD_NAC_USU = $_REQUEST['CIUDAD_NAC_USU'];
                $DIRECCION_USU = $_REQUEST['DIRECCION_USU'];
                $FONO_USU = $_REQUEST['FONO_USU'];
                $E_MAIL_USU = $_REQUEST['E_MAIL_USU'];
                $ESTADO_USU = $_REQUEST['ESTADO_USU'];

                //actualizamos la información del Usuario
                try {
                    $usuariosModel->actualizarUsuario($ID_USU, $ID_TIPO_USU, $CEDULA_RUC_PASS_USU, $NOMBRES_USU, $APELLIDOS_USU, $FECH_NAC_USU, $CIUDAD_NAC_USU, $DIRECCION_USU, $FONO_USU, $E_MAIL_USU, $ESTADO_USU);
                } catch (Exception $e) {
                    $_SESSION['ErrorBaseDatos'] = $e->getMessage();
                }

                // Actualizamos y volvemos a serializar en variable de sesión la lista de Usuarios
                $listadoUsuarios = $usuariosModel->getUsuarios();
                $_SESSION['listadoUsuarios'] = serialize($listadoUsuarios);

                // Redireccionamos a la pagina principal para visualizar
                header('Location: ../View/Usuario/Usuarios.php');
                break;

            default:
                header('Location: ../View/Usuario/Usuarios.php');
                break;
        }
        break;

    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina principal:
        header('Location: ../View/index.php');
}