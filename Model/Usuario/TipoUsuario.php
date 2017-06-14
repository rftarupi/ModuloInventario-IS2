<?php

/*
 * Esta clase contendrá información del tipo usuario
 */

class TipoUsuario {
    // Atributos de Tipo Usuario
    private $ID_TIPO_USU;
    private $NOMBRE_TIPO_USU;
    
    // Constructor de Tipo Usuario
    public function __construct($ID_TIPO_USU, $NOMBRE_TIPO_USU) {
        $this->ID_TIPO_USU = $ID_TIPO_USU;
        $this->NOMBRE_TIPO_USU = $NOMBRE_TIPO_USU;
    }
    
    // Métodos de encapsulamiento de los atributos
    public function getID_TIPO_USU() {
        return $this->ID_TIPO_USU;
    }

    public function getNOMBRE_TIPO_USU() {
        return $this->NOMBRE_TIPO_USU;
    }

    public function setID_TIPO_USU($ID_TIPO_USU) {
        $this->ID_TIPO_USU = $ID_TIPO_USU;
    }

    public function setNOMBRE_TIPO_USU($NOMBRE_TIPO_USU) {
        $this->NOMBRE_TIPO_USU = $NOMBRE_TIPO_USU;
    }
}
