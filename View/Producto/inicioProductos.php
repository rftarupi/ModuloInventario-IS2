<!DOCTYPE html>

<?php
// Inicio de sesión e inclusión de rutas para acceder a los datos
session_start();
if (isset($_SESSION['USUARIO_ACTIVO'])) {
    include_once '../../Model/Producto/Producto.php';
    include_once '../../Model/Producto/ProductosModel.php';
    $productoModel = new ProductosModel();
    $NOM = $_SESSION['NOMBRE_USUARIO'];
    $TIPO = $_SESSION['TIPO_USUARIO'];

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
            <script src="../../Bootstrap/js/getDatos.js"></script>
            <script src="../../Bootstrap/js/bootstrap-table.js"></script>
            <link href="../../Bootstrap/css/bootstrap-table.css" rel="stylesheet">
            <script src="../../Bootstrap/js/validaciones.js"></script>
            <link href="../../Bootstrap/css/bootstrap.css" rel="stylesheet" />
            <link rel="../../stylesheet" href="Bootstrap/css/bootstrap-theme.css">

            <style type="text/css">
                div{
                    font-family: Calibri Light;
                }
            </style>
            <script LANGUAGE="JavaScript">
                function confirEliminar()
                {
                    var agree = confirm("Esta seguro que desea eliminar el producto");
                    if (agree)
                        return  true;
                    else
                        return false;
                }
            </script>
        </head>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">

                <ul class="nav navbar-nav navbar-right ">
                    <li><a href="#"><span class="glyphicon  glyphicon-user"></span><?php echo $NOM; ?> </a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-edit"></span><?php echo $TIPO; ?> </a></li>
                    <li><a href="../login.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesion </a></li>
                </ul>
            </div>
        </nav>

            <!--CODIGO PARA INSERTAR  UN SLIDER-->
            <div class="container">
                <div class="jumbotron">
                    <div class="active">
                        <div class="row">
                            <div class="col-md-12">
                                <!--aqui insertaremos el slider--> 
                                <div id="carousel1" class="carousel slide" data-ride="carousel">
                                    <!--Indicatodores--> 
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel1" data-slide-to="1" class="active"></li>
                                        <li data-target="#carousel1" data-slide-to="1"></li>
                                        <li data-target="#carousel1" data-slide-to="1"></li>
                                    </ol>
                                    <!--Contenedor de las imagenes--> 
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item">
                                            <img src="../../View/Imagenes/bannerProductos.jpg" height="300" width="1500" alt="Imagen 1">
                                        </div>
                                        <div class="item active">
                                            <img src="../../View/Imagenes/banners.jpg" height="200" width="1500" alt="Imagen 2">
                                        </div>
                                        <div class="item">
                                            <img src="../../View/Imagenes/images.jpg" height="200" width="1500" alt="Imagen 3">
                                        </div>

                                    </div>
                                    <!--Controls--> 
                                    <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Siguiente</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="container-fluid">
                <!--Título de la página-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12" style="border-bottom: 1px solid #c5c5c5">
                            <h1><span class="glyphicon glyphicon-apple"></span>PRODUCTOS</h1></div>
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
                            <div class="panel-heading"><h4><center> <h2>Lista de Productos</h2></center></h4></div>
                            <div class="panel-title">
                                <div class="col-lg-12">
                                    <div class="table-striped">
                                        <!-- Tabla en la que se listaras los productos de la Base de Datos -->
                                        <table class="table table-striped table-bordered table-condensed table-hover" data-toggle="table" data-pagination="true">
                                            <thead>
                                                <tr>
                                                    <th colspan="1">ACCIONES</th>
                                                    <th>ID PRODUCTO</th>
                                                    <th>NOMBRE PRODUCTO</th>
                                                    <th>DESCRIPCION DEL PRODUCTO</th>
                                                    <th>GRABA IVA</th>
                                                    <th>COSTO PRODUCTO</th>
                                                    <th>PVP PRODUCTO</th>
                                                    <th>ESTADO PRODUCTO</th>
                                                </tr>
                                            </thead>



                                            <?php
                                            // Verificamos si existe la variable de sesión que contiene la lista de Productos
                                            if (isset($_SESSION['listadoProductos'])) {
                                                // Deserializamos y mostraremos los atributos de los usuarios usando un ciclo for
                                                $listado = unserialize($_SESSION['listadoProductos']);
                                                foreach ($listado as $pro) {
                                                    $estado = $productoModel->obtenerEstadoProducto($pro->getID_PROD());
                                                    $iva = $productoModel->grabaIva($pro->getID_PROD());
                                                    // Obtenemos datos de tipo usuario de un usuario en específico
//                                                $tipoUsuario = $tiposUsuarioModel->getTipoUsuario($usu->getID_TIPO_USU());
//                                                $estado = $usuariosModel->obtenerEstadoUsuario($usu->getID_USU());
                                                    ?>

                                                    <tr>
                                                        <td><a href="#editPRO" onclick="obtener_datosProductos('<?php echo $pro->getID_PROD(); ?>')" data-toggle="modal"><span class="glyphicon glyphicon-pencil">Editar</span></a></td>
                                                        <!--<td align="center"><a onclick="return confirEliminar();" href='../../Controller/controller.php?opcion1=producto&opcion2=eliminar_producto&ID_PROD=<?php echo $pro->getID_PROD(); ?>'><span class='glyphicon glyphicon-remove'>Eliminar</span></a></td>-->                                    
                                                    <input type="hidden" value="<?php echo $pro->getID_PROD(); ?>" id="ID_PROD<?php echo $pro->getID_PROD(); ?>">
                                                    <input type="hidden" value="<?php echo $pro->getNOMBRE_PROD(); ?>" id="NOMBRE_PROD<?php echo $pro->getID_PROD(); ?>">
                                                    <input type="hidden" value="<?php echo $pro->getDESCRIPCION_PROD(); ?>" id="DESCRIPCION<?php echo $pro->getID_PROD(); ?>">
                                                    <input type="hidden" value="<?php echo $pro->getGRAVA_IVA_PROD(); ?>" id="GRABA_IVA_PROD<?php echo $pro->getID_PROD(); ?>">
                                                    <input type="hidden" value="<?php echo $pro->getCOSTO_PROD(); ?>" id="COSTO_PROD<?php echo $pro->getID_PROD(); ?>">
                                                    <input type="hidden" value="<?php echo $pro->getPVP_PROD(); ?>" id="PVP_PROD<?php echo $pro->getID_PROD(); ?>">
                                                    <input type="hidden" value="<?php echo $pro->getESTADO_PROD(); ?>" id="ESTADO_PROD<?php echo $pro->getID_PROD(); ?>">
                                                    <!--<input type="hidden" value="<?php echo $pro->getSTOCK_PROD(); ?>" id="STOCK_PROD<?php echo $pro->getID_PROD(); ?>">-->
                                                    <td><?php echo $pro->getID_PROD(); ?></td>
                                                    <td><?php echo $pro->getNOMBRE_PROD(); ?></td>
                                                    <td><?php echo $pro->getDESCRIPCION_PROD(); ?></td>
                                                    <td><?php echo $iva; ?></td>
                                                    <td><?php echo $pro->getCOSTO_PROD(); ?></td>
                                                    <td><?php echo $pro->getPVP_PROD(); ?></td>
                                                    <td><?php echo $estado; ?></td>
                                                    <!--<td><?php echo $pro->getSTOCK_PROD(); ?></td>-->
                                                       <!--<td align="center"><a href=""><span class="glyphicon glyphicon-pencil">Editar</span></a></td>-->
                                                    <!--<td align="center"><a href=""><span class="glyphicon glyphicon-remove">Eliminar</span></a></td>-->




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


                <div class="modal fade" id="nuevoPRO">
                    <div class="modal-dialog">
                        <form class="form-horizontal" action="../../Controller/controller.php">
                            <input type="hidden" name="opcion1" value="producto">
                            <input type="hidden" name="opcion2" value="insertar_producto">
                            <div class="modal-content">
                                <!-- Header de la ventana -->
                                <div class="modal-header bg-success">
                                    <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title"><span class="glyphicon glyphicon-apple"></span> Nuevo Producto</h3>
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
                                                    <input type="hidden" name="ID_PROD" id="ID_PROD" value="<?php echo $productoModel->generarCodigoProducto(); ?>">
                                                <!--<input type="text" class="form-control" placeholder="Ingrese ID del producto" required />-->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Nombre Producto</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" onkeypress="return SoloLetras(event)" name="NOMBRE_PROD"  id="NOMBRE_PROD" class="form-control" placeholder="Ingrese Nombres del producto" required minlength="1" maxlength="45" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="control-label"> &nbsp;&nbsp;&nbsp;&nbsp;Descripcion</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text"  pattern="[A-Za-z]{1-9}" name="DESCRIPCION_PROD" id="DESCRIPCION_PROD" class="form-control" placeholder="Ingrese la descripcion" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;Graba Iva</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select class="form-control" id="GRABA_IVA_PROD" name="GRABA_IVA_PROD">

                                                        <option value="S">SI</option>
                                                        <option value="N">NO</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <!--nuevo-->
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;Costo</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" name="COSTO_PROD" onkeypress="return SoloNumeros(event);" id="COSTO_PROD" class="form-control" placeholder="Ingrese el costo del producto" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;PVP</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" onkeypress="return SoloNumeros(event);" name="PVP_PROD" id="PVP_PROD" class="form-control" placeholder="Ingrese PVP" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;Estado</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select class="form-control" id="ESTADO_PROD" name="ESTADO_PROD">

                                                        <option value="A">ACTIVO</option>
                                                        <option value="I">INACTIVO</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <!--                                        <div class="form-group">
                                                                                        <div class="col-md-3 col-md-offset-1">
                                                                                            <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;Stock</label>
                                                                                        </div>
                                                                                        <div class="col-md-7">
                                                                                            <input onkeypress="return SoloNumeros(event);" type="number"  min="1" maxlength="4" minlength="1" max="1000" name="STOCK_PROD" id="STOCK_PROD" class="form-control" placeholder="Stock" required />
                                                                                        </div>
                                                                                    </div>-->
                                            <!--nuevo-->
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer fde la ventana -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!------------------------------------Actualizar producto------------------------------------>

                <div class="modal fade" id="editPRO">
                    <div class="modal-dialog">
                        <form class="form-horizontal" action="../../Controller/controller.php">
                            <input type="hidden" name="opcion1" value="producto">
                            <input type="hidden" name="opcion2" value="actualizar_productos">
                            <div class="modal-content">
                                <!-- Header de la ventana -->
                                <div class="modal-header bg-success">
                                    <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title"><span class="glyphicon glyphicon-apple"></span> Actualizar Producto</h3>
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
                                                    <div id="mod_id_pro2"></div>
                                                    <input type="hidden" name="mod_id_pro1" id="mod_id_pro1" value="">
                                                    <!--<input type="text" class="form-control" placeholder="Ingrese ID del producto" required />-->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Nombre Producto</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="mod_nombre" id="mod_nombre" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="control-label"> &nbsp;&nbsp;&nbsp;&nbsp;Descripcion</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control"  name="mod_descripcion" id="mod_descripcion" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Graba iva o no</label>
                                                </div>
                                                <div class="col-md-7">

                                                    <select class="form-control" id="mod_Iva" name="mod_Iva">

                                                        <option value="S">SI</option>
                                                        <option value="N">NO</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <!--nuevo-->
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;Costo</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input onkeypress="return SoloNumeros(event);" type="text" class="form-control" name="mod_costo" id="mod_costo" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;PVP</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input onkeypress="return SoloNumeros(event);" type="text" class="form-control" name="mod_pvp" id="mod_pvp" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;Estado</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select class="form-control" id="mod_estado" name="mod_estado">

                                                        <option value="A">ACTIVO</option>
                                                        <option value="I">INACTIVO</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <!--                                        <div class="form-group">
                                                                                        <div class="col-md-3 col-md-offset-1">
                                                                                            <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;&nbsp;&nbsp;Stock</label>
                                                                                        </div>
                                                                                        <div class="col-md-7">
                                                                                            <input onkeypress="return SoloNumeros(event);" type="text" class="form-control" name="mod_stock" id="mod_stock" />
                                                                                        </div>
                                                                                    </div>-->
                                            <!--nuevo-->

                                        </div>
                                    </div>
                                </div>


                                <!-- Footer fde la ventana -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-success">Guardar Cambios</button>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </body>
    </html>
    <?php
} else {
    header('Location: ../login.php');
}
?>