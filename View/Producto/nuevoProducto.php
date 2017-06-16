<!DOCTYPE html>
<?php
require_once '../../Model/Producto/Producto.php';
require_once '../../Model/Producto/ProductosModel.php';
session_start();
$productoModel = new ProductosModel();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Producto</title>
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
                <h3>Nuevo Producto</h3>
            </div>
           
            <p>
            <form action="../../Controller/controller.php">
                <input type="hidden" name="opcion1" value="producto">
                <input type="hidden" name="opcion2" value="insertar_producto">
                ID PRODUCTO:  <?php echo $productoModel->generarCodigoProducto(); ?>
                <input type="hidden" name="ID_PROD" value="<?php echo $productoModel->generarCodigoProducto(); ?>"><br><br>
                NOMBRE PRODUCTO:   <input type="text" name="NOMBRE_PROD" required="true" required=""><br><br>
                DESCRIPCION DEL PRODUCTO:   <input type="text" name="DESCRIPCION_PROD" required="true" required=""><br><br>
                GRABA_IVA_O_NO:   <input type="text" name="GRABA_IVA_PROD" required="true" required=""><br><br>
                COSTO PRODUCTO:   <input type="text" name="COSTO_PROD" required="true" required=""><br><br>
                PVP PRODUCTO:   <input type="text" name="PVP_PROD" required="true" required=""><br><br>
                ESTADO PRODUCTO:   <input type="text" name="ESTADO_PROD" required="true" required=""><br><br>
                STOCK PRODUCTO:   <input type="text" name="STOCK_PROD" required="true" required=""><br><br>
               
                <input type="submit" value="Finalizar">
            </form>
        </p>
</div>
</body>
</html>
