<!DOCTYPE html>
<!--
Esta página contiene la vista respectiva de Usuarios en donde se encotrará las acciones del CRUD de Usuarios
-->
<?php
// Inicio de sesión e inclusión de rutas para acceder a los datos
session_start();
include_once '../../Model/Usuario/Usuario.php';
include_once '../../Model/Usuario/UsuariosModel.php';
include_once '../../Model/Usuario/TipoUsuario.php';
include_once '../../Model/Usuario/TiposUsuarioModel.php';

// Creamos la variable para el llamado de los métodos de la tabla Tipo Usuario y Usuario
$tiposUsuarioModel = new TiposUsuarioModel();
$usuariosModel = new UsuariosModel(); 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuarios</title>
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
                        <h1><span class="glyphicon glyphicon-user"></span> USUARIOS</h1></div>
                </div>
            </div>

            <!--La clase col nos permite que la pagina sea responsive mediante numero de columnas
                 donde el total de columnas es 12 y
                 donde lg es en tamaño de escritorio, md medianos, sm tablets, xs celulares -->

            <div class="row">
                <div class="col-md-12" style="padding-top: 5px">
                    <!--La class nav nav-pills nos permite hacer menús-->
                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="../../Controller/controller.php?opcion1=usuario&opcion2=listar"><h4>MOSTRAR TODOS</h4></a></li>
                        <li role="presentation"><a href="#nuevoUSU" data-toggle="modal"><h4>NUEVO USUARIO</h4></a></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h4>Lista de Usuarios</h4></div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <!-- Tabla en la que se listaras los usuarios de la Base de Datos -->
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                        <th>ID USUARIO</th>
                                        <th>TIPO USUARIO</th>
                                        <th>CEDULA - RUC</th>
                                        <th>NOMBRES</th>
                                        <th>APELLIDOS</th>
                                        <th>FECHA NACIMIENTO</th>
                                        <th>CIUDAD NACIMIENTO</th>
                                        <th>DIRECCION</th>
                                        <th>TELEFONO</th>
                                        <th>E-MAIL</th>
                                        <th>ESTADO</th>
                                        <th colspan="2">ACCIONES</th>
                                        </thead>
                                        <?php
                                        // Verificamos si existe la variable de sesión que contiene la lista de Usuarios
                                        if (isset($_SESSION['listadoUsuarios'])) {
                                            // Deserializamos y mostraremos los atributos de los usuarios usando un ciclo for
                                            $listado = unserialize($_SESSION['listadoUsuarios']);
                                            foreach ($listado as $usu) {
                                                // Obtenemos datos de tipo usuario de un usuario en específico
                                                $tipoUsuario = $tiposUsuarioModel->getTipoUsuario($usu->getID_TIPO_USU());
                                                $estado = $usuariosModel->obtenerEstadoUsuario($usu->getID_USU());
                                                ?>
                                                <tr>
                                                    <td><?php echo $usu->getID_USU(); ?></td>
                                                    <td><?php echo $tipoUsuario->getNOMBRE_TIPO_USU(); ?></td>
                                                    <td><?php echo $usu->getCEDULA_RUC_PASS_USU(); ?></td>
                                                    <td><?php echo $usu->getNOMBRES_USU(); ?></td>
                                                    <td><?php echo $usu->getAPELLIDOS_USU(); ?></td>
                                                    <td><?php echo $usu->getFECH_NAC_USU(); ?></td>
                                                    <td><?php echo $usu->getCIUDAD_NAC_USU(); ?></td>
                                                    <td><?php echo $usu->getDIRECCION_USU(); ?></td>
                                                    <td><?php echo $usu->getFONO_USU(); ?></td>
                                                    <td><?php echo $usu->getE_MAIL_USU(); ?></td>
                                                    <td><?php echo $estado; ?></td>
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

            <!--Ventana emergente para la creacion de un Nuevo usuario-->
            <div class="modal fade" id="nuevoUSU">
                <div class="modal-dialog">
                    <form class="form-horizontal" action="#ventanasEmergentes">
                        <div class="modal-content">
                            <!-- Header de la ventana -->
                            <div class="modal-header bg-success">
                                <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title"><span class="glyphicon glyphicon-user"></span> Nuevo Usuario</h3>
                            </div>

                            <!-- Contenido de la ventana -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Apellidos</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Ingrese sus Apellidos" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Nombres</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Ingrese sus Nombres" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;E-mail</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="email" class="form-control" placeholder="Ingrese sus Correo" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Contraseña</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="password" class="form-control" placeholder="Contraseña" required />
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