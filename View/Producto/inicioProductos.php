<!DOCTYPE html>
<!--
Esta página contiene la vista respectiva de Usuarios en donde se encotrará las acciones del CRUD de Usuarios
-->
<?php
// Inicio de sesión e inclusión de rutas para acceder a los datos
session_start();
include_once '../../Model/Producto/Producto.php';
include_once '../../Model/Producto/ProductosModel.php';
$productoModel = new ProductosModel();


// Creamos la variable para el llamado de los métodos de la tabla Tipo Usuario y Usuario
//$tiposUsuarioModel = new TiposUsuarioModel();
//$usuariosModel = new UsuariosModel(); 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Producto</title>
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
                        <li role="presentation"><a href="#nuevoPRO" data-toggle="modal"><h4>NUEVO PRODUCTO</h4></a></li>
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
                                    <!-- Tabla en la que se listaras los productos de la Base de Datos -->
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                        <th>ID PRODUCTO</th>
                                        <th>NOMBRE PRODUCTO</th>
                                        <th>DESCRIPCION DEL PRODUCTO</th>
                                        <th>GRABA_IVA_O_NO</th>
                                        <th>COSTO PRODUCTO</th>
                                        <th>PVP PRODUCTO</th>
                                        <th>ESTADO PRODUCTO</th>
                                        <th>STOCK PRODUCTO</th>
                                        
                                        <th colspan="2">ACCIONES</th>
                                        </thead>
                                        <?php
                                        // Verificamos si existe la variable de sesión que contiene la lista de Productos
                                        if (isset($_SESSION['listadoProductos'])) {
                                            // Deserializamos y mostraremos los atributos de los usuarios usando un ciclo for
                                            $listado = unserialize($_SESSION['listadoProductos']);
                                            foreach ($listado as $pro) {
                                                // Obtenemos datos de tipo usuario de un usuario en específico
//                                                $tipoUsuario = $tiposUsuarioModel->getTipoUsuario($usu->getID_TIPO_USU());
//                                                $estado = $usuariosModel->obtenerEstadoUsuario($usu->getID_USU());
                                                ?>
                                                <tr>
                                                    <td><?php echo $pro->getID_PROD(); ?></td>
                                                    <td><?php echo $pro->getNOMBRE_PROD(); ?></td>
                                                    <td><?php echo $pro->getDESCRIPCION_PROD(); ?></td>
                                                    <td><?php echo $pro->getGRAVA_IVA_PROD(); ?></td>
                                                    <td><?php echo $pro->getCOSTO_PROD(); ?></td>
                                                    <td><?php echo $pro->getPVP_PROD(); ?></td>
                                                    <td><?php echo $pro->getESTADO_PROD(); ?></td>
                                                    <td><?php echo $pro->getSTOCK_PROD(); ?></td>
                                                  <?php echo "<a href='../../Controller/controller.php?opcion1=producto&opcion2=listar_productos&ID_PROD=".$pro->getID_PROD()."'>Editaaar</a>";?>
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
            <div class="modal fade" id="nuevoPRO">
                <div class="modal-dialog">
                    <form class="form-horizontal" action="../../Controller/controller.php">
                        <input type="hidden" name="opcion1" value="producto">
                        <input type="hidden" name="opcion2" value="insertar_productos">
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
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> ID PRODUCTO</label>
                                            </div>
                                            <div class="col-md-7">
                                                <?php echo $productoModel->generarCodigoProducto(); ?>
                                                <input type="hidden" name="ID_PROD" value="<?php echo $productoModel->generarCodigoProducto(); ?>">
                                                <!--<input type="text" class="form-control" placeholder="Ingrese ID del producto" required />-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Nombre Producto</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Ingrese Nombres del producto" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"> &nbsp;&nbsp;&nbsp;&nbsp;Descripcion</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Ingrese la descripcion" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Graba iva o no</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="S o N" required />
                                            </div>
                                        </div>
                                        <!--nuevo-->
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;Costo</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Ingrese el costo del producto" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;PVP</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Ingrese PVP" required />
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;Estado</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="A o I" required />
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;Stock</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Stock" required />
                                            </div>
                                        </div>
                                        <!--nuevo-->
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
            <!--Ventana emergente para Editar Producto-->
            <div class="modal fade" id="editPRO">
                <div class="modal-dialog">
                    <!--<form class="form-horizontal" action="#ventanasEmergentes">-->
                    <form class="form-horizontal" action="../../Controller/controller.php">
                        <input type="hidden" name="opcion1" value="producto">
                        <input type="hidden" name="opcion2" value="insertar_productos">
                        <div class="modal-content">
                            <!-- Header de la ventana -->
                            <div class="modal-header bg-success">
                                <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title"><span class="glyphicon glyphicon-cog"></span> Nuevo Producto</h3>
                            </div>

                            <!-- Contenido de la ventana -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> ID Producto</label>
                                            </div>
                                            <div class="col-md-7">
                                                <?php echo $productoModel->generarCodigoProducto(); ?>
                                                <input type="hidden" name="ID_PROD" value="<?php echo $productoModel->generarCodigoProducto(); ?>">
                                                <!--<input type="text" class="form-control" placeholder="Ingrese sus Apellidos" required />-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> NOMBRE PRODUCTO </label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="NOMBRE_PROD" placeholder="Ingrese el nombre del producto" required />
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> DESCRIPCION DEL PRODUCTO </label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="DESCRIPCION_PROD" placeholder="Ingrese la descripcion" required />
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> GRABA_IVA_O_NO </label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="GRABA_IVA_PROD" placeholder="S o N" required />
                                            </div>
                                             <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> COSTO PRODUCTO </label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="COSTO_PROD" placeholder="Costo" required />
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> PVP PRODUCTO </label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="PVP_PROD" placeholder="PVP" required />
                                            </div>
                                             <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> ESTADO PRODUCTO </label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="ESTADO_PROD" placeholder="Estado" required />
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> STOCK PRODUCTO </label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="STOCK_PROD" placeholder="Stock" required />
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>

                            <!-- Footer de la ventana -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-success">Guardar Producto</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            
        </div>
    </body>
</html>