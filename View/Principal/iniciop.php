<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start();
if (isset($_SESSION['USUARIO_ACTIVO'])) {
    include_once '../../Model/Ajustes/CabeceraAjuste.php';
    include_once '../../Model/Ajustes/AjustesModel.php';
    $ajustesModel = new AjustesModel();
    $NOM = $_SESSION['NOMBRE_USUARIO'];
    $TIPO = $_SESSION['TIPO_USUARIO'];
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Sistema del Modelo Inventario</title>
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">				
            <script src="../../Bootstrap/js/jquery-2.1.4.js"></script>
            <script src="../../Bootstrap/js/bootstrap.js"></script>
            <script src="../../Bootstrap/js/bootstrap-table.js"></script>
            <script src="../../Bootstrap/js/getDatos.js"></script>
            <link href="../../Bootstrap/css/bootstrap.css" rel="stylesheet">
            <link href="../../Bootstrap/css/bootstrap-table.css" rel="stylesheet">
            <link rel="../../stylesheet" href="Bootstrap/css/bootstrap-theme.css">
            <script src="../../Bootstrap/js/validaciones.js"></script>
        </head>

        <body background ="../../View/Imagenes/azul.png" width="800">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">

                    <ul class="nav navbar-nav navbar-right ">
                        <li><a href=""><span class="glyphicon  glyphicon-user"></span><?php echo $NOM; ?> </a></li>
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
                                            <img src="../../View/Imagenes/banner-inventario.jpg" height="200" width="1500" alt="Imagen 1">
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
                        <!--                        <div class="btn-group" > <button type="button" class="btn btn-primary dropdown-toggle"
                                                                                         data-toggle="dropdown">Ajustes <span class="caret"></span></button>
                        
                                                    <ul class="dropdown-menu"><li><a class="btn btn- btn-info alert-info  " href="../../View/Ajustes/inicioAjuste.php?">Inicio Ajustes</a> </li>   
                                                                <li><a class="btn btn-info alert-info" href="../../View/Ajustes/nuevoAjuste.php?">Nuevo Ajuste </a> </li>  </ul>   
                                                            &nbsp;&nbsp;
                                                        </div>-->
                        <a class="btn btn-primary active" href="../../View/Producto/inicioProductos.php?">Productos</a>&nbsp;&nbsp;
                        <a class="btn btn-primary active" href="../../View/Usuario/inicioUsuarios.php?">Usuarios</a>&nbsp;&nbsp;            
                    </ul>
                </div>   

            </div>

        </center>
       
      
    </body>
    </html>
    <?php
} else {
    header('Location: ../login.php');
}
?>