<?php
/*
    Clase de la Cabecera de Ajuste
*/
class CabeceraAjuste {
       
    // Atributos de la cabecera de ajustes
    private $ID_AJUSTE_PROD;
    private $MOTIVO_AJUSTE_PROD;
    private $FECHA_AJUSTE_PROD;
    private $FECHA_IMP_AJUSTE_PROD;
    private $ESTADO_IMP_AJUSTE_PROD; 

            public function __construct($ID_AJUSTE_PROD, $MOTIVO_AJUSTE_PROD, $FECHA_AJUSTE_PROD,$FECHA_IMP_AJUSTE_PROD,$ESTADO_IMP_AJUSTE_PROD) {
        $this->ID_AJUSTE_PROD = $ID_AJUSTE_PROD;
        $this->MOTIVO_AJUSTE_PROD = $MOTIVO_AJUSTE_PROD;
        $this->FECHA_AJUSTE_PROD = $FECHA_AJUSTE_PROD;
        $this->ESTADO_IMP_AJUSTE_PROD= $FECHA_IMP_AJUSTE_PROD;
        $this->FECHA_IMP_AJUSTE_PROD=$ESTADO_IMP_AJUSTE_PROD;
    }
    public function getID_AJUSTE_PROD() {
        return $this->ID_AJUSTE_PROD;
    }

    public function getMOTIVO_AJUSTE_PROD() {
        return $this->MOTIVO_AJUSTE_PROD;
    }

    public function getFECHA_AJUSTE_PROD() {
        return $this->FECHA_AJUSTE_PROD;
    }
    
     public function getFECHA_IMP_AJUSTE_PROD() {
        return $this->FECHA_IMP_AJUSTE_PROD;
    }
    
    public function getESTADO_IMP_AJUSTE_PROD() {
        return $this->ESTADO_IMP_AJUSTE_PROD;
    }

    public function setID_AJUSTE_PROD($ID_AJUSTE_PROD) {
        $this->ID_AJUSTE_PROD = $ID_AJUSTE_PROD;
    }

    public function setMOTIVO_AJUSTE_PROD($MOTIVO_AJUSTE_PROD) {
        $this->MOTIVO_AJUSTE_PROD = $MOTIVO_AJUSTE_PROD;
    }

    public function setFECHA_AJUSTE_PROD($FECHA_AJUSTE_PROD) {
        $this->FECHA_AJUSTE_PROD = $FECHA_AJUSTE_PROD;
    }
    
     public function setFECHA_IMP_AJUSTE_PROD($FECHA_IMP_AJUSTE_PROD) {
        $this->FECHA_IMPRESION_AJUS_PROD = $FECHA_IMP_AJUSTE_PROD;
    }

    public function setESTADO_IMP_AJUSTE_PROD($ESTADO_IMP_AJUSTE_PROD) {
        $this->ESTADO_IMP_AJUSTE_PROD = $ESTADO_IMP_AJUSTE_PROD;
    }
}
