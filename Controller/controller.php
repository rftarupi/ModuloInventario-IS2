<?php

require_once '../model/Usuario/UsuariosModel.php';
require_once '../model/Ajustes/AjustesModel.php';
require_once '../Model/Producto/ProductosModel.php';

session_start();
$usuariosModel = new UsuariosModel();
$ajustesModel = new AjustesModel();
$productoModel = new ProductosModel();

// Recibimos la opcion desde la vista:
// 
$opcion1 = $_REQUEST['opcion1'];
$opcion2 = $_REQUEST['opcion2'];

unset($_SESSION['ErrorBaseDatos']);

switch ($opcion1) {
    // I N I C I O   D E   S E S I O N
    case "uniciar_sesion":
        
        break;
    
    // U S U A R I O 
    case "usuario":
        switch ($opcion2) {
            case "listar":
                // Obtenemos el array que contiene el listado de Usuarios
                $listadoUsuarios = $usuariosModel->getUsuarios();

                // Guardamos los datos en una variable de sesion serializada
                $_SESSION['listadoUsuarios'] = serialize($listadoUsuarios);

                // Redireccionamos a la pagina principal para visualizar
                header('Location: ../View/Usuario/inicioUsuarios.php');
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
                $CLAVE_USU = $_REQUEST['CLAVE_USU'];

                // Enviamos parámetros a método de ingresar Usuario
                try {
                    $usuariosModel->insertarUsuario($ID_USU, $ID_TIPO_USU, $CEDULA_RUC_PASS_USU, $NOMBRES_USU, $APELLIDOS_USU, $FECH_NAC_USU, $CIUDAD_NAC_USU, $DIRECCION_USU, $FONO_USU, $E_MAIL_USU, $ESTADO_USU, $CLAVE_USU);
                } catch (Exception $e) {
                    $_SESSION['ErrorBaseDatos'] = $e->getMessage();
                }
                
               // Actualizamos y volvemos a serializar en variable de sesión la lista de Usuarios
                $listadoUsuarios = $usuariosModel->getUsuarios();
                $_SESSION['listadoUsuarios'] = serialize($listadoUsuarios);

                // Redireccionamos a la pagina principal para visualizar
                header('Location: ../View/Usuario/inicioUsuarios.php');
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
                header('Location: ../View/Usuario/inicioUsuarios.php');
                break;

            case "editar":
                // Obtenemos Id del Usuario a editar desde formulario
                $ID_USU = $_REQUEST['ID_USU'];

                // Buscamos y obtenemos información del Usuario
                $usuario = $usuariosModel->getUsuario($ID_USU);

                // Guardamos datos del usuario en variable de sesión serializada
                $_SESSION['usuario'] = serialize($usuario);

                // Redireccionamos a vista para editar información
                header('Location: ../View/Usuario/editarUsuario.php');
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
                $CLAVE_USU = $_REQUEST['CLAVE_USU'];

                //actualizamos la información del Usuario
                try {
                    $usuariosModel->actualizarUsuario($ID_USU, $ID_TIPO_USU, $CEDULA_RUC_PASS_USU, $NOMBRES_USU, $APELLIDOS_USU, $FECH_NAC_USU, $CIUDAD_NAC_USU, $DIRECCION_USU, $FONO_USU, $E_MAIL_USU, $ESTADO_USU, $CLAVE_USU);
                } catch (Exception $e) {
                    $_SESSION['ErrorBaseDatos'] = $e->getMessage();
                }

                // Actualizamos y volvemos a serializar en variable de sesión la lista de Usuarios
                $listadoUsuarios = $usuariosModel->getUsuarios();
                $_SESSION['listadoUsuarios'] = serialize($listadoUsuarios);

                // Redireccionamos a la pagina principal para visualizar
                header('Location: ../View/Usuario/inicioUsuarios.php');
                break;

            default:
                header('Location: ../View/Usuario/inicioUsuarios.php');
                break;
        }
        break;
    
     // A J U S T E S
    case "ajuste":
        switch ($opcion2) {
            case "listar_ajustes":              
                $listadoAjustes = $ajustesModel->getCabAjustes();    
                $_SESSION['listadoAjustes'] = serialize($listadoAjustes);  
                header('Location: ../View/Ajustes/inicioAjuste.php'); 
                break;
            case "insertar_ajuste":
                $ID_AJUSTE_PROD = $_REQUEST['ID_AJUSTE_PROD'];
                $MOTIVO_AJUSTE_PROD = $_REQUEST['MOTIVO_AJUSTE_PROD'];

                try {
                    $ajustesModel->insertarCabAjuste($ID_AJUSTE_PROD, $MOTIVO_AJUSTE_PROD);     
                } catch (Exception $e) {
                    $_SESSION['ErrorBaseDatos'] = $e->getMessage();
                }
                
               $listadoAjustes = $ajustesModel->getCabAjustes(); 
               $_SESSION['listadoAjustes'] = serialize($listadoAjustes);

               header('Location: ../View/Ajustes/inicioAjuste.php');
                break;
            
             case "eliminar_ajuste":
                $ID_AJUSTE_PROD = $_REQUEST['ID_AJUSTE_PROD'];
                $ajustesModel->eliminarCabAjuste($ID_AJUSTE_PROD);
                $listadoAjustes = $ajustesModel->getCabAjustes(); 
                $_SESSION['listadoAjustes'] = serialize($listadoAjustes);
                header('Location: ../View/Ajustes/inicioAjuste.php');
                break;

            case "editar_ajuste":
                $ID_AJUSTE_PROD = $_REQUEST['ID_AJUSTE_PROD'];
                $ajuste = $ajustesModel->getCabAjuste($ID_AJUSTE_PROD);
                $_SESSION['ajuste'] = serialize($ajuste);
                header('Location: ../View/Ajustes/inicioAjuste#edit.phpAJU');
                break;

            case "guardar_ajuste":
                $ID_AJUSTE_PROD = $_REQUEST['mod_id'];
                $MOTIVO_AJUSTE_PROD = $_REQUEST['mod_motivo'];
                $FECHA_AJUSTE_PROD = $_REQUEST['mod_fecha'];
                try {
                    $ajustesModel->actualizarCabAjuste($ID_AJUSTE_PROD, $MOTIVO_AJUSTE_PROD, $FECHA_AJUSTE_PROD);                
                } catch (Exception $e) {
                    $_SESSION['ErrorBaseDatos'] = $e->getMessage();
                }
                $listadoAjustes = $ajustesModel->getCabAjustes(); 
                $_SESSION['listadoAjustes'] = serialize($listadoAjustes);
                header('Location: ../View/Ajustes/inicioAjuste.php');
                break;
        }
        break;
        
    // P R O D U C T O S
    case "producto": 
        switch ($opcion2) {
            case "listar_productos":
                // Obtenemos el array que contiene el listado de Usuarios
                $listadoProductos = $productoModel->getProductos();

                // Guardamos los datos en una variable de sesion serializada
                $_SESSION['listadoProductos'] = serialize($listadoProductos);

                // Redireccionamos a la pagina principal para visualizar
                header('Location: ../View/Producto/inicioProductos.php');
                break;

            case "insertar_producto":
                // Obtenemos parámetros enviados desde formulario de creación de producto
                $ID_PROD = $_REQUEST['ID_PROD'];
                $NOMBRE_PROD = $_REQUEST['NOMBRE_PROD'];
                $DESCRIPCION_PROD = $_REQUEST['DESCRIPCION_PROD'];
                $GRABA_IVA_PROD = $_REQUEST['GRABA_IVA_PROD'];
                $COSTO_PROD = $_REQUEST['COSTO_PROD'];
                $PVP_PROD = $_REQUEST['PVP_PROD'];
                $ESTADO_PROD = $_REQUEST['ESTADO_PROD'];
                $STOCK_PROD = $_REQUEST['STOCK_PROD'];
                

                // Enviamos parámetros a método de ingresar producto
                try {
                    $productoModel->insertarProducto($ID_PROD, $NOMBRE_PROD, $DESCRIPCION_PROD, $GRABA_IVA_PROD, $COSTO_PROD, $PVP_PROD,$ESTADO_PROD, $STOCK_PROD);
                } catch (Exception $e) {
                    $_SESSION['ErrorBaseDatos'] = $e->getMessage();
                }
                 // Actualizamos y volvemos a serializar en variable de sesión la lista de Usuarios
                $listadoProductos = $productoModel->getProductos();
                $_SESSION['listadoProductos'] = serialize($listadoProductos);

                // Redireccionamos a la pagina principal para visualizar
                header('Location: ../View/Producto/inicioProductos.php');
                break;

            case "eliminar_producto":
                // Obtenemos Id del Usuario a eliminar desde formulario
                $ID_PROD = $_REQUEST['ID_PROD'];

                // Eliminamos Usuario con método eliminarUsuario
                $productoModel->eliminarProducto($ID_PROD);

                // Actualizamos y volvemos a serializar en variable de sesión la lista de Usuarios
                $listadoProductos = $productoModel->getProductos();
                $_SESSION['listadoProductos'] = serialize($listadoProductos);

                // Redireccionamos a la pagina principal para visualizar
                header('Location: ../View/Producto/inicioProductos.php');
                break;

//            case "editar_producto":
//                // Obtenemos Id del Usuario a editar desde formulario
//                $ID_PROD = $_REQUEST['ID_PROD'];
//
//                // Buscamos y obtenemos información del Producto
//                $producto = $productoModel->getProducto($ID_PROD);
//
//                // Guardamos datos del usuario en variable de sesión serializada
//                $_SESSION['producto'] = serialize($producto);
//
//                // Redireccionamos a vista para editar información
//                header('Location: ../View/Producto/editarProducto.php');
//                break;

            case "actualizar_productos":
                //obtenemos los parametros del formulario
                $ID_PROD = $_REQUEST['mod_id_pro1'];
                $NOMBRE_PROD = $_REQUEST['mod_nombre'];
                $DESCRIPCION_PROD = $_REQUEST['mod_descripcion'];
                $GRABA_IVA_PROD = $_REQUEST['mod_Iva'];
                $COSTO_PROD = $_REQUEST['mod_costo'];
                $PVP_PROD = $_REQUEST['mod_pvp'];
                $ESTADO_PROD = $_REQUEST['mod_estado'];
                $STOCK_PROD = $_REQUEST['mod_stock'];
                
                //actualizamos la información del producto
                try {
                    $productoModel->actualizarProducto($ID_PROD, $NOMBRE_PROD, $DESCRIPCION_PROD, $GRABA_IVA_PROD, $COSTO_PROD, $PVP_PROD, $ESTADO_PROD, $STOCK_PROD);
                } catch (Exception $e) {
                    $_SESSION['ErrorBaseDatos'] = $e->getMessage();
                }

                // Actualizamos y volvemos a serializar en variable de sesión la lista de Producto
                $listadoProductos = $productoModel->getProductos();
                $_SESSION['listadoProductos'] = serialize($listadoProductos);

                // Redireccionamos a la pagina principal para visualizar
                header('Location: ../View/Producto/inicioProductos.php');
                break;

            default:
                header('Location: ../View/Producto/inicioProductos.php');
                break;
        }
        break;
        

    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina principal:
        header('Location: ../View/index.php');
        break;
}