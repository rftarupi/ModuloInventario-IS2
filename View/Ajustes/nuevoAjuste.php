<!DOCTYPE html>
<?php
require_once '../../Model/Ajustes/CabeceraAjuste.php';
require_once '../../Model/Ajustes/AjustesModel.php';
session_start();
$ajustesModel = new AjustesModel();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Ajuste</title>
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
                <h3>Nuevo Ajuste</h3>
            </div>
           
            <p>
            <form action="../../Controller/controller.php">
                <input type="hidden" name="opcion1" value="ajuste">
                <input type="hidden" name="opcion2" value="insertar_ajuste">
                Código:  <?php echo $ajustesModel->generarCodigoAjuste(); ?>
                 <input type="hidden" name="ID_AJUSTE_PROD" value="<?php echo $ajustesModel->generarCodigoAjuste(); ?>"><br><br>
                Motivo:  <input type="text" name="MOTIVO_AJUSTE_PROD" onkeypress="return SoloLetras(event);" size="20" maxlength="20" required><br><br>
                Fecha:   <input type="date" name="FECHA_AJUSTE_PROD" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>"><br><br>
               
                <input type="submit" value="Finalizar">
            </form>
        </p>
</div>
</body>
</html>
