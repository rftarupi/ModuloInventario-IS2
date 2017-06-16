
function obtener_datos(id){
	var cod= $("#ID_AJUSTE_PROD"+id).val();
	var motivo= $("#MOTIVO_AJUSTE_PROD"+id).val();
	var fecha= $("#FECHA_AJUSTE_PROD"+id).val();

	$("#mod_id").val(cod);
	$("#mod_cod").text(id).css("font-weight","Bold");
	
        $("#mod_motivo").val(motivo);
        
	$("#mod_f").text(fecha);
        $("#mod_fecha").val(fecha);
}

function obtener_datosProductos(id){
	var cod= $("#ID_PROD"+id).val();
	var nombre= $("#NOMBRE_PROD"+id).val();
        var descripcion= $("#DESCRIPCION"+id).val();
        var Iva= $("#GRABA_IVA_PROD"+id).val();
        var costo= $("#COSTO_PROD"+id).val();
        var pvp= $("#PVP_PROD"+id).val();
        var estado= $("#ESTADO_PROD"+id).val();
	var stock= $("#STOCK_PROD"+id).val();

	$("#mod_id_pro1").val(cod);
        $("#mod_id_pro2").text(id).css("font-weight","Bold");
        
	$("#mod_nombre").val(nombre);
        $("#mod_descripcion").val(descripcion);
        $("#mod_Iva").val(Iva);
        $("#mod_costo").val(costo);
        $("#mod_pvp").val(pvp);
        $("#mod_estado").val(estado);
        $("#mod_stock").val(stock);
}

