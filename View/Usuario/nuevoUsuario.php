<!DOCTYPE html>
<?php      
require_once '../../Model/Usuario/Usuario.php';
require_once '../../Model/Usuario/UsuariosModel.php';

require_once '../../Model/Usuario/TipoUsuario.php';
require_once '../../Model/Usuario/TiposUsuarioModel.php';


session_start();
$usuariosModel = new UsuariosModel();   
$tiposUsuarioModel = new TiposUsuarioModel();
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title> Nuevo Usuario </title>
       
        <script src="../../Bootstrap/js/jquery-2.1.4.js"></script>
        <script src="../../Bootstrap/js/bootstrap.js"></script>
        <script src="../../Bootstrap/js/bootstrap-table.js"></script>
        <script src="../../Bootstrap/js/validaciones.js"></script>
        <link href="../../Bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../../Bootstrap/css/bootstrap-table.css" rel="stylesheet">
        
    </head>
    <body>
        
        <div class="container">
        
            <div class="row">
                <h3>Nuevo Usuario</h3>
            </div>
           
            <p>
                
            <form action="../../Controller/controller.php">
                
                <input type="hidden" name="opcion1" value="usuario">
                <input type="hidden" name="opcion2" value="insertar_usuario">
                
                Id Usuario:
                <?php 
                   //------------------------------------------//
                   echo $usuariosModel->generarCodigoUsuario();
                ?>
                Tipo de Usuario:
                <?php
                   //------------------------------------------//
                   echo $tiposUsuarioModel->generarCodigoTipoUsuario(); 
                ?>
              
                <input>
                    
                    <input>
                    <input>
                
                
            </form>
                
            </p>
            
            
        <?php
        
       
        
        
        
        ?>
            
        </div>
    </body>
</html>
