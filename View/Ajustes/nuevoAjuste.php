<!DOCTYPE html>
<?php
require_once '../model/CabeceraAjuste.php';
require_once '../model/AjustesModel.php';
session_start();
$ajustesModel = new AjustesModel();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Ajuste</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <script src="js/validaciones.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            
            <div class="row">
                <h3>Nuevo Ajuste</h3>
            </div>
           
            <p>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion1" value="crear_cabecera_ajuste">
                Codigo:  <input type="txt" name="cod_CabeceraAjuste" value="<?php echo $ajustesModel->generarCodigoAjuste(); ?>"><br><br>
                Motivo:  <input type="text" name="motivoAjuste" onkeypress="return SoloLetras(event);" size="20" maxlength="20" required><br><br>
                Fecha:   <input type="date" name="fechaAjuste" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>"><br><br>
               
                <input type="submit" value="Finalizar">
            </form>
        </p>
</div>
</body>
</html>
