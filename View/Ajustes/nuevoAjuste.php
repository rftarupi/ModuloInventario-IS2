<!DOCTYPE html>
<?php
session_start();
include_once '../../Model/Ajustes/CabeceraAjuste.php';
include_once '../../Model/Ajustes/AjustesModel.php';
include_once '../../Model/Producto/Producto.php';
include_once '../../Model/Producto/ProductosModel.php';
$ajustesModel = new AjustesModel();
$productosModel = new ProductosModel();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>NUEVO AJUSTE</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">				

        <!--Importación de Bootstrap al proyecto-->
        <script src="../../Bootstrap/js/jquery-2.1.4.js"></script>
        <script src="../../Bootstrap/js/bootstrap.js"></script>
        <script src="../../Bootstrap/js/bootstrap-table.js"></script>
        <script src="../../Bootstrap/js/getDatos.js"></script>
        <link href="../../Bootstrap/css/bootstrap.css" rel="stylesheet" />
        <link href="../../Bootstrap/css/bootstrap-table.css" rel="stylesheet">
        <link rel="../../stylesheet" href="Bootstrap/css/bootstrap-theme.css">
        <script src="../../Bootstrap/js/validaciones.js"></script>

        <style type="text/css">
            div{
                font-family: Calibri Light;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12" style="border-bottom: 1px solid #c5c5c5">
                        <h1><span class="glyphicon glyphicon-cog"></span> NUEVO AJUSTE DE PRODUCTOS</h1></div>
                </div>
            </div>

            <!--Cabecera ajuste-->
            <div class="panel panel-default">
                <div class="panel-heading">INFORMACIÓN DEL AJUSTE</div>
                <div class="panel-body">
                    <input type="hidden" name="opcion1" value="ajuste">
                    <input type="hidden" name="opcion2" value="insertar_ajuste">            
                    <div class="input-group">
                        <span class="input-group-addon">Código </span>
                        <input type="text" class="form-control" name="ID_AJUSTE_PROD" disabled value="<?php echo $ajustesModel->generarCodigoAjuste(); ?>">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon">Motivo </span>
                        <input type="text" class="form-control" name="MOTIVO_AJUSTE_PROD" size="150" maxlength="150" placeholder="Ingrese el motivo del ajuste" required >
                    </div>
                </div>
            </div>
            <!--Fin Cabecera ajuste-->


            <!--Detalle ajuste-->
            <div class="panel panel-default">
                <div class="panel-heading">DETALLES DEL AJUSTE</div>
                <div class="panel-body">

                    <!--Formulario para adicionar un detalle del ajuste-->
                    <form action="../../Controller/controller.php">
                        <input type="hidden" name="opcion1" value="ajuste">
                        <input type="hidden" name="opcion2" value="insertar_detalle_ajuste">
                        PRODUCTO:<select name="idProducto">
                            <?php
                            $listaProductos = $productosModel->getProductos();
                            foreach ($listaProductos as $prod) {
                                echo "<option value='" . $prod->getID_PROD() . "'>" . $prod->getNOMBRE_PROD() . "</option>";
                            }
                            ?>
                        </select><br><br>
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <tr> 

                                    <th>PRODUCTO</th>
                                    <th>PRECIO</th>
                                    <th>GRAVA IVA</th>
                                    <th>STOCK</th>
                            </thead>
                            <tbody>
                                <tr class="info">
                                    <td>a</td>
                                    <td>a</td>
                                    <td>a</td> 
                                    <td>a</td>
                                </tr>

                            </tbody>
                        </table>

                        <!--Ingreso o salida y nuevo stock-->
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="A">Nuevo Stock</label><br>
                                <label class="radio-inline"><input type="radio" name="optradio">INGRESO</label>
                                <label class="radio-inline"><input type="radio" name="optradio">SALIDA</label>
                            </div>
                            <div class="col-sm-2">
                                <br><input type="text" class="form-control" name="cantidad" size="150" maxlength="1000" minlength="1" placeholder="Ingrese cantidad" required onkeypress="return SoloNumeros(event)" />
                            </div>
                            <div class="col-sm-2">
                                <br><input type="submit" value="Agregar" id="btnGuardar" class="btn btn-success"> 
                            </div>
                            <div class="col-sm-6"></div>
                        </div>
                        <!--Fin de Ingreso o salida y nuevo stock-->
                    </form>
                    <!--Fin del Formulario para adicionar un detalle del ajuste-->
                      <br><br>
                    
                    <!--Tabla de detalles del ajuste-->  
                    <table class="table table-striped table-bordered table-condensed table-hover" data-toggle="table" data-pagination="true">
                        <thead>
                            <tr> 
                                <!--<th colspan="2">ACCIONES</th>-->
                                <th>ACCIONES</th>
                                <th>CODIGO DETALLE</th>
                                <th>PRODUCTO</th>
                                <th>CANTIDAD</th>
                                <th>TIPO MOVIMIENTO</th>
                                <th>PRECIO</th>
                                <th>IVA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td> 
                            </tr>
                            <tr class="success">
                                <td>Eliminar</td>
                                <td>a</td> 
                                <td>a</td>
                                <td>a</td>
                                <td>a</td> 
                                <td>a</td>
                                <td><span class=" glyphicon glyphicon-print"></span></td> 
                            </tr>
                        </tbody>
                    </table>
                    <!--Fin de la Tabla de detalles del ajuste-->
                    
                    <div class="col-sm-9"></div>    
                    <div class="col-sm-3">
                          <input type="submit" value="GUARDAR AJUSTE" id="btnGuardar" class="btn btn-success"> 
                          <input type="submit" value="CANCELAR" id="btnGuardar" class="btn btn-danger"> 
                    </div>         
                </div>
            </div>
            <!--Fin Detalle ajuste-->
        </div>
    </body>
</html>
