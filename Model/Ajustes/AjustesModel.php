<?php

include_once '/../DataBase.php';
include_once 'CabeceraAjuste.php';
include_once 'AjusteDet.php';
include_once '/../Producto/Producto.php';
include_once '/../Producto/ProductosModel.php';

class AjustesModel {

// M E T O D O S  D E   C A B E C E R A   D E   A J U S T E
    //METODO PARA OBTENER LA LISTA DE LOS AJUSTES
    public function getCabAjustes() {
        $pdo = Database::connect();
        $sql = "select * from INV_TAB_AJUSTES_PRODUCTOS order by ID_AJUSTE_PROD";
        $resultado = $pdo->query($sql);
        $listadoCabAjustes = array();
        foreach ($resultado as $res) {
            $Cab_ajuste = new CabeceraAjuste($res['ID_AJUSTE_PROD'], $res['MOTIVO_AJUSTE_PROD'], $res['FECHA_AJUSTE_PROD'], $res['FECHA_IMPRESION_AJUS_PROD'], $res['ESTADO_IMP_AJUSTE_PROD']);
            array_push($listadoCabAjustes, $Cab_ajuste);
        }
        Database::disconnect();
        return $listadoCabAjustes;
    }

    // METODO PARA OBTENER UN AJUSTE ESPECIFICO POR MEDIO DEL PARAMETRO CODIGO DE AJUSTE
    public function getCabAjuste($ID_AJUSTE_PROD) {
        $pdo = Database::connect();
        $sql = "select * from INV_TAB_AJUSTES_PRODUCTOS where ID_AJUSTE_PROD=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID_AJUSTE_PROD));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $Cab_ajuste = new CabeceraAjuste($res['ID_AJUSTE_PROD'], $res['MOTIVO_AJUSTE_PROD'], $res['FECHA_AJUSTE_PROD'], $res['FECHA_IMPRESION_AJUS_PROD'], $res['ESTADO_IMP_AJUSTE_PROD']);
        Database::disconnect();
        return $Cab_ajuste;
    }

    // METODO PARA INSERTAR UN AJUSTE (CABECERA)
    public function insertarCabAjuste($ID_AJUSTE_PROD, $MOTIVO_AJUSTE_PROD) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into INV_TAB_AJUSTES_PRODUCTOS(ID_AJUSTE_PROD,MOTIVO_AJUSTE_PROD) values(?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($ID_AJUSTE_PROD, $MOTIVO_AJUSTE_PROD));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    // METODO PARA ELIMINAR UN AJUSTE (CABECERA) 
    // //-- AL ELIMINAR ESTA CABECERA SE ELIMINARIAN LOS DETALLES DE AJUSTES DE ESTA CABECERA   
    public function eliminarCabAjuste($ID_AJUSTE_PROD) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from INV_TAB_AJUSTES_PRODUCTOS where ID_AJUSTE_PROD=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID_AJUSTE_PROD));
        Database::disconnect();
    }

    // METODO PARA ACTUALIZAR UN AJUSTE (CABECERA)
    public function actualizarCabAjuste($ID_AJUSTE_PROD, $MOTIVO_AJUSTE_PROD) {
        $pdo = Database::connect();
        $sql = "update INV_TAB_AJUSTES_PRODUCTOS set MOTIVO_AJUSTE_PROD=?, FECHA_AJUSTE_PROD=CURRENT_TIMESTAMP  where ID_AJUSTE_PROD=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($MOTIVO_AJUSTE_PROD, $ID_AJUSTE_PROD));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    // METODO PARA GENERAR AUTOMATICAMENTE EL CODIGO DE AJUSTE (CABECERA) -- AJUS-0001
    public function generarCodigoAjuste() {
        $pdo = Database::connect();
        $sql = "select max(ID_AJUSTE_PROD) as cod from INV_TAB_AJUSTES_PRODUCTOS";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $nuevoCod = '';
        if ($res['cod'] == NULL) {
            $nuevoCod = 'AJUS-0001';
        } else {
            $rest = ((substr($res['cod'], -4)) + 1) . ''; // Separacion de la parte numerica AJUS-0023  --> 23
            // Ciclo que completa el codigo segun lo retornado para completar los 9 caracteres 
            // AJUS-00 --> 67, AJUS-0 --> 786
            if ($rest > 1 && $rest <= 9) {
                $nuevoCod = 'AJUS-000' . $rest;
            } else {
                if ($rest >= 10 && $rest <= 99) {
                    $nuevoCod = 'AJUS-00' . $rest;
                } else {
                    if ($rest >= 100 && $rest <= 999) {
                        $nuevoCod = 'AJUS-0' . $rest;
                    } else {
                        $nuevoCod = 'AJUS-' . $rest;
                    }
                }
            }
        }
        Database::disconnect();
        return $nuevoCod; // RETORNO DEL NUEVO CODIGO DE AJUSTE
    }

    public function generarCodigoDetalleAjusteBD() {
        $pdo = Database::connect();
        $sql = "select max(ID_DETALLE_AJUSTE_PROD) as cod from INV_TAB_DETRALLE_AJUSTE_PROD";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $nuevoCod = '';
        if ($res['cod'] == NULL) {
            $nuevoCod = 'DAJU-0001';
        } else {
            $rest = ((substr($res['cod'], -4)) + 1) . ''; // Separacion de la parte numerica DAJU-0023  --> 23
            // Ciclo que completa el codigo segun lo retornado para completar los 9 caracteres 
            // DAJU-00 --> 67, DAJU-0 --> 786
            if ($rest > 1 && $rest <= 9) {
                $nuevoCod = 'DAJU-000' . $rest;
            } else {
                if ($rest >= 10 && $rest <= 99) {
                    $nuevoCod = 'DAJU-00' . $rest;
                } else {
                    if ($rest >= 100 && $rest <= 999) {
                        $nuevoCod = 'DAJU-0' . $rest;
                    } else {
                        $nuevoCod = 'DAJU-' . $rest;
                    }
                }
            }
        }
        Database::disconnect();
        return $nuevoCod; // RETORNO DEL NUEVO CODIGO DE AJUSTE
    }

    public function generarCodigoDetalleAjusteArray($ultimaFilaArray) {
        $ultimoCodigo = $ultimaFilaArray->getID_DETALLE_AJUSTE_PROD();
        $rest = ((substr($ultimoCodigo, -4)) + 1) . ''; // Separacion de la parte numerica DAJU-0023  --> 23
        // Ciclo que completa el codigo segun lo retornado para completar los 9 caracteres 
        // DAJU-00 --> 67, DAJU-0 --> 786
        if ($rest > 1 && $rest <= 9) {
            $nuevoCod = 'DAJU-000' . $rest;
        } else {
            if ($rest >= 10 && $rest <= 99) {
                $nuevoCod = 'DAJU-00' . $rest;
            } else {
                if ($rest >= 100 && $rest <= 999) {
                    $nuevoCod = 'DAJU-0' . $rest;
                } else {
                    $nuevoCod = 'DAJU-' . $rest;
                }
            }
        }
        return $nuevoCod; // RETORNO DEL NUEVO CODIGO DE AJUSTE
    }

    //$rest = substr("abcdef", -1);    // devuelve "f"
    //$rest = substr("abcdef", -2);    // devuelve "ef"
    //$rest = substr("abcdef", -3, 1); // devuelve "d"
    // M E T O D O S   C R U D   D E   D E T A L L E S   D E   A J U S T E
    public function adicionarDetalle($listaAjusteDet, $ID_PROD, $tipoMovimiento, $cantidad) {
        if ($cantidad <= 0) {
            throw new Exception("La cantidad debe ser mayor a cero.");
        }
        //buscamos el producto:
        $productoModel = new ProductosModel();
        $producto = $productoModel->getProducto($ID_PROD);

        //Creamos un nuevo detalle AjusteDet:
        $ajusteDet = new AjusteDet();
        $id_detalle_ajuste = null;
        if ($listaAjusteDet!=NULL) {
            $id_detalle_ajuste = $this->generarCodigoDetalleAjusteArray(array_pop($listaAjusteDet));
        }  else {
            $id_detalle_ajuste="DAJU-0001";
        }
        $ajusteDet->setID_DETALLE_AJUSTE_PROD($id_detalle_ajuste);
        $ajusteDet->setID_PROD($ID_PROD);
        $ajusteDet->setNOMBRE_PROD($producto->getNOMBRE_PROD());
        $ajusteDet->setID_USU($ID_USU);
        $ajusteDet->setCAMBIO_STOCK_PROD($cantidad);
        $ajusteDet->setTIPOMOV_DETAJUSTE_PROD($tipoMovimiento);
        
        //adicionamos el nuevo detalle al array en memoria:
        array_push($listaAjusteDet, $ajusteDet);
        return $listaAjusteDet;
    }

//    
//    public function eliminarDetalle($listaFacturaDet,$idProducto){
//        //buscamos el producto:
//        $cont=0;
//        foreach ($listaFacturaDet as $det) {
//            if($det->getIdProducto()==$idProducto){
//                unset($listaFacturaDet[$cont]);
//                //reindexamos el array para eliminar el lugar vacio:
//                $listaFacturaDet=  array_values($listaFacturaDet);
//                break;
//            }
//            $cont++;
//        }
//        return $listaFacturaDet;
//    }
}
