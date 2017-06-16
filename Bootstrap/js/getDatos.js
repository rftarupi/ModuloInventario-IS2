
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

