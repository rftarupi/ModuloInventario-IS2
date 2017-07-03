<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['USUARIO_ACTIVO'])) {
    include_once '../../Model/Ajustes/CabeceraAjuste.php';
    include_once '../../Model/Ajustes/AjustesModel.php';
    include_once '../../Model/Ajustes/AjusteDet.php';
    include_once '../../Model/Producto/Producto.php';
    include_once '../../Model/Producto/ProductosModel.php';
    $ajustesModel = new AjustesModel();
    $productosModel = new ProductosModel();
    $NOM = $_SESSION['NOMBRE_USUARIO'];
    $TIPO = $_SESSION['TIPO_USUARIO'];
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

            <!--Función que permite obtener datos sin recargar pagina-->
            <script language="javascript">
                function ObtenerDatosProducto(ID_PROD) {
                    var ID_PROD = ID_PROD;
                    /// Invocamos a nuestro script PHP
                    $.ajax({
                        data: ID_PROD,
                        url: '../../controller/controller.php?opcion1=ajuste&opcion2=recargarDatosProducto&ID_PROD=' + ID_PROD,
                        type: 'post',
                        success: function (response) {
                            $("#TblProd").html(response);
                        }
                    });
                }
            </script>
        </head>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">

                <ul class="nav navbar-nav navbar-right ">
                    <li><a href=""><span class="glyphicon  glyphicon-user"></span><?php echo $NOM; ?> </a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-edit"></span><?php echo $TIPO; ?> </a></li>
                    <li><a href="../login.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesion </a></li>
                </ul>
            </div>
        </nav>

        <center>
            <div class="masthead"><img src="../../View/Imagenes/banner-inventario.jpg" height="200" width="1340">
            </div>
        </center>

        <center>
            <div class=" danger">
                <h3>Sistema del Modelo Inventario</h3>
            </div>
            <div class="container">

                <div class="alert alert-success">
                    <ul class="nav nav-pills">
                        <a class="btn btn-primary active" href="../../View/Ajustes/inicioAjuste.php?">Ajustes</a>&nbsp;&nbsp;
                        <a class="btn btn-primary active" href="../../View/Producto/inicioProductos.php?">Productos</a>&nbsp;&nbsp;
                        <a class="btn btn-primary active" href="../../View/Usuario/inicioUsuarios.php?">Usuarios</a>&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger alert-danger  " href="../Principal/iniciop.php">Inicio</a>                        
                    </ul>
                </div>           
            </div>

        </center>
        <body background ="../../View/Imagenes/fondo3.jpg" width="800">

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
                        <form action="../../Controller/controller.php">
                            <input type="hidden" name="opcion1" value="ajuste">
                            <input type="hidden" name="opcion2" value="insertar_ajuste_detalles">            
                            <div class="input-group">
                                <span class="input-group-addon">Código </span>
                                <input type="text" class="form-control" name="ID_AJUSTE_PROD" value="<?php echo $ajustesModel->generarCodigoAjuste(); ?>">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">Motivo </span>
                                <input type="text" class="form-control" name="MOTIVO_AJUSTE_PROD" size="150" maxlength="150" placeholder="Ingrese el motivo del ajuste" required >
                            </div><br>
                            <?php
                            if (isset($_SESSION['ErrorDetalleAjuste'])) {
                                echo "<div class='alert alert-danger'>" . $_SESSION['ErrorDetalleAjuste'] . "</div>";
                            }
                            ?>
                            <div class="form-group">
                                <input type="submit" value="GUARDAR AJUSTE" id="btnGuardar" class="btn btn-success"> 
                                <input type="button" value="CANCELAR" id="btnGuardar" class="btn btn-danger"> 
                            </div> 
                        </form>
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
                            <div class="form-inline">
                                <div class="form-group">
                                    <label>PRODUCTO:</label>
                                    <select name="ID_PROD" id="CboIDProducto" class="form-control" onchange="ObtenerDatosProducto($('#CboIDProducto').val());
                                                return false;" required>
                                        <option value="" disabled selected>Seleccione un Producto</option>
                                        <?php
                                        $listaProductos = $productosModel->getProductos();
                                        foreach ($listaProductos as $prod) {
                                            echo "<option value='" . $prod->getID_PROD() . "'>" . $prod->getNOMBRE_PROD() . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <table class="table table-striped table-bordered table-condensed table-hover" id="TblProd">
                                <thead>
                                    <tr> 
                                        <th>PRODUCTO</th>
                                        <th>PRECIO</th>
                                        <th>GRAVA IVA</th>
                                        <th>STOCK</th>
                                </thead>
                            </table>


                            <!--Mensaje de error en caso de stock no valido-->
                            <?php
                            if (isset($_SESSION['ErrorStock'])) {
                                echo "<div class='alert alert-danger'>" . $_SESSION['ErrorStock'] . "</div>";
                            }
                            ?>

                            <!--Ingreso o salida y nuevo stock-->
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="A">Tipo de Movimiento</label><br>
                                    <label class="radio-inline"><input type="radio" name="optradio" value="I" checked>INGRESO</label>
                                    <label class="radio-inline"><input type="radio" name="optradio" value="S">SALIDA</label>
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
                                    <?php
                                    //verificamos si existe en sesion el listado de clientes:
                                    if (isset($_SESSION['listaAjusteDet'])) {
                                        $listado = unserialize($_SESSION['listaAjusteDet']);
                                        foreach ($listado as $ajusteDet) {
                                            echo "<tr class='success'>";
                                            echo "<td><a href='../../controller/controller.php?opcion1=ajuste&opcion2=eliminar_detalle&ID_DETALLE_AJUSTE_PROD=" . $ajusteDet->getID_DETALLE_AJUSTE_PROD() . "'>Eliminar</a></td>";
                                            echo "<td>" . $ajusteDet->getID_DETALLE_AJUSTE_PROD() . "</td>";
                                            echo "<td>" . $ajusteDet->getNOMBRE_PROD() . "</td>";
                                            echo "<td>" . $ajusteDet->getCAMBIO_STOCK_PROD() . "</td>";
                                            echo "<td>" . $ajusteDet->getTIPOMOV_DETAJUSTE_PROD() . "</td>";
                                            echo "<td>".$ajusteDet->getPVP_PROD()."</td>";
                                            echo "<td>...</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "No se han cargado datos.";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                        <!--Fin de la Tabla de detalles del ajuste-->

                        <!--                    <div class="col-sm-3 col-sm-offset-9">
                                                <input type="submit" value="GUARDAR AJUSTE" id="btnGuardar" class="btn btn-success"> 
                                                <input type="submit" value="CANCELAR" id="btnGuardar" class="btn btn-danger"> 
                                            </div>         -->
                    </div>
                </div>
                <!--Fin Detalle ajuste-->
            </div>
        </body>
    </html>
    <?php
} else {
    header('Location: ../login.php');
}
?>
