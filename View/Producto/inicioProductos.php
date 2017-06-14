<!DOCTYPE html>
<!--
Esta página contiene la vista respectiva de Usuarios en donde se encotrará las acciones del CRUD de Usuarios
-->
<?php
// Inicio de sesión e inclusión de rutas para acceder a los datos
session_start();
include_once '../../Model/Producto//Producto.php';
include_once '../../Model/Producto//ProductosModel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Productos</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">				

        <!--Importación de Bootstrap al proyecto-->
        <script src="../../Bootstrap/js/jquery-2.1.4.js"></script>
        <script src="../../Bootstrap/js/bootstrap.js"></script>
        <link href="../../Bootstrap/css/bootstrap.css" rel="stylesheet" />
        <link rel="../../stylesheet" href="Bootstrap/css/bootstrap-theme.css">
        <style type="text/css">
            div{
                font-family: Calibri Light;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <!--Título de la página-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12" style="border-bottom: 1px solid #c5c5c5">
                        <h1><span class="glyphicon glyphicon-user"></span> PRODUCTOS</h1></div>
                </div>
            </div>

            <!--La clase col nos permite que la pagina sea responsive mediante numero de columnas
                 donde el total de columnas es 12 y
                 donde lg es en tamaño de escritorio, md medianos, sm tablets, xs celulares -->

            <div class="row">
                <div class="col-md-12" style="padding-top: 5px">
                    <!--La class nav nav-pills nos permite hacer menús-->
                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="../../Controller/controller.php?opcion1=producto&opcion2=listar_productos"><h4>MOSTRAR TODOS</h4></a></li>
                        <li role="presentation"><a href="#nuevoPROD" data-toggle="modal"><h4>NUEVO PRODUCTO</h4></a></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h4>Lista de Productos</h4></div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <!-- Tabla en la que se listaras los usuarios de la Base de Datos -->
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                        <th>ID PRODUCTO</th>
                                        <th>NOMBRE PRODUCTO</th>
                                        <th>DESCRIPCION PRODUCTO</th>
                                        <th>GRAVA IVA O NO EL PRODUCTO</th>
                                        <th>COSTO PRODUCTO</th>
                                        <th>PVP PRODUCTO </th>
                                        <th>ESTADO PRODUCTO</th>
                                        <th>STOCK PRODUCTO</th>
                                        <th colspan="2">ACCIONES</th>
                                        </thead>
                                        <?php
                                        // Verificamos si existe la variable de sesión que contiene la lista de productos
                                        if (isset($_SESSION['listadoProductos'])) {
                                            // Deserializamos y mostraremos los atributos de los productos usando un ciclo for
                                            $listado = unserialize($_SESSION['listadoProductos']);
                                            foreach ($listado as $prod) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $prod->getID_PROD(); ?></td>
                                                    <td><?php echo $prod->getNOMBRE_PROD(); ?></td>
                                                    <td><?php echo $prod->getDESCRIPCION_PROD(); ?></td>
                                                    <td><?php echo $prod->getGRABA_IVA_PROD(); ?></td>
                                                    <td><?php echo $prod->getCOSTO_PROD(); ?></td>
                                                    <td><?php echo $prod->getPVP_PROD(); ?></td>
                                                    <td><?php echo $prod->getESTADO_PROD(); ?></td>
                                                    <td><?php echo $prod->getSTOCK_PROD(); ?></td>
                                                   
                                                    <td align="center"><a href=""><span class="glyphicon glyphicon-pencil">Editar</span></a></td>
                                                    <td align="center"><a href=""><span class="glyphicon glyphicon-remove">Eliminar</span></a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Ventana emergente para Nuevo producto-->
            <div class="modal fade" id="nuevoPROD">
                <div class="modal-dialog">
                    <form class="form-horizontal" action="#ventanasEmergentes">
                        <div class="modal-content">
                            <!-- Header de la ventana -->
                            <div class="modal-header bg-success">
                                <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title"><span class="glyphicon glyphicon-user"></span> Nuevo Producto</h3>
                            </div>

                            <!-- Contenido de la ventana -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Nombre Productos</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Ingrese los Productos" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> DESCRIPCION</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Ingrese la descripcion" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label">Graba iva o no</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="S o N" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Costo</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Costo del Producto" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer fde la ventana -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-success">Guardar Cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

