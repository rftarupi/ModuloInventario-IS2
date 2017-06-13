<?php
/*
    Clase de la Cabecera de Ajuste
*/
class CabeceraAjuste {
       
    // Atributos de la cabecera de ajustes
    private $ID_AJUSTE_PROD;
    private $MOTIVO_AJUSTE_PROD;
    private $FECHA_AJUSTE_PROD;

    
    public function __construct($ID_AJUSTE_PROD, $MOTIVO_AJUSTE_PROD, $FECHA_AJUSTE_PROD) {
        $this->ID_AJUSTE_PROD = $ID_AJUSTE_PROD;
        $this->MOTIVO_AJUSTE_PROD = $MOTIVO_AJUSTE_PROD;
        $this->FECHA_AJUSTE_PROD = $FECHA_AJUSTE_PROD;
    }
 
    public function getMotivoAjuste() {
        return $this->MOTIVO_AJUSTE_PROD;
    }

    public function getFechaAjuste() {
        return $this->FECHA_AJUSTE_PROD;
    }
    public function getCod_CabeceraAjuste() {
        return $this->ID_AJUSTE_PROD;
    }

    public function setCod_CabeceraAjuste($ID_AJUSTE_PROD) {
        $this->ID_AJUSTE_PROD = $ID_AJUSTE_PROD;
    }

     
    public function setMotivoAjuste($MOTIVO_AJUSTE_PROD) {
        $this->MOTIVO_AJUSTE_PROD = $MOTIVO_AJUSTE_PROD;
    }

    public function setFechaAjuste($FECHA_AJUSTE_PROD) {
        $this->FECHA_AJUSTE_PROD = $FECHA_AJUSTE_PROD;
    }
}
