<?php

// Clase Usuario

class Usuario {

    // Definición de atributos de Usuarios
    private $ID_USU;
    private $ID_TIPO_USU;
    private $CEDULA_RUC_PASS_USU;
    private $NOMBRES_USU;
    private $APELLIDOS_USU;
    private $FECH_NAC_USU;
    private $CIUDAD_NAC_USU;
    private $DIRECCION_USU;
    private $FONO_USU;
    private $E_MAIL_USU;
    private $ESTADO_USU;
    private $CLAVE_USU;

    // Constructor de la Clase Usuario    
    function __construct($ID_USU, $ID_TIPO_USU, $CEDULA_RUC_PASS_USU, $NOMBRES_USU, $APELLIDOS_USU, $FECH_NAC_USU, $CIUDAD_NAC_USU, $DIRECCION_USU, $FONO_USU, $E_MAIL_USU, $ESTADO_USU, $CLAVE_USU) {
        $this->ID_USU = $ID_USU;
        $this->ID_TIPO_USU = $ID_TIPO_USU;
        $this->CEDULA_RUC_PASS_USU = $CEDULA_RUC_PASS_USU;
        $this->NOMBRES_USU = $NOMBRES_USU;
        $this->APELLIDOS_USU = $APELLIDOS_USU;
        $this->FECH_NAC_USU = $FECH_NAC_USU;
        $this->CIUDAD_NAC_USU = $CIUDAD_NAC_USU;
        $this->DIRECCION_USU = $DIRECCION_USU;
        $this->FONO_USU = $FONO_USU;
        $this->E_MAIL_USU = $E_MAIL_USU;
        $this->ESTADO_USU = $ESTADO_USU;
        $this->CLAVE_USU = $CLAVE_USU;
    }

    //Métodos para la obtención (get) y modificación (set) de los atributos de Usuarios
    public function getID_USU() {
        return $this->ID_USU;
    }

    public function getID_TIPO_USU() {
        return $this->ID_TIPO_USU;
    }

    public function getCEDULA_RUC_PASS_USU() {
        return $this->CEDULA_RUC_PASS_USU;
    }

    public function getNOMBRES_USU() {
        return $this->NOMBRES_USU;
    }

    public function getAPELLIDOS_USU() {
        return $this->APELLIDOS_USU;
    }

    public function getFECH_NAC_USU() {
        return $this->FECH_NAC_USU;
    }

    public function getCIUDAD_NAC_USU() {
        return $this->CIUDAD_NAC_USU;
    }

    public function getDIRECCION_USU() {
        return $this->DIRECCION_USU;
    }

    public function getFONO_USU() {
        return $this->FONO_USU;
    }

    public function getE_MAIL_USU() {
        return $this->E_MAIL_USU;
    }

    public function getESTADO_USU() {
        return $this->ESTADO_USU;
    }
    
    public function getCLAVE_USU() {
        return $this->CLAVE_USU;
    }

    public function setID_USU($ID_USU) {
        $this->ID_USU = $ID_USU;
    }

    public function setID_TIPO_USU($ID_TIPO_USU) {
        $this->ID_TIPO_USU = $ID_TIPO_USU;
    }

    public function setCEDULA_RUC_PASS_USU($CEDULA_RUC_PASS_USU) {
        $this->CEDULA_RUC_PASS_USU = $CEDULA_RUC_PASS_USU;
    }

    public function setNOMBRES_USU($NOMBRES_USU) {
        $this->NOMBRES_USU = $NOMBRES_USU;
    }

    public function setAPELLIDOS_USU($APELLIDOS_USU) {
        $this->APELLIDOS_USU = $APELLIDOS_USU;
    }

    public function setFECH_NAC_USU($FECH_NAC_USU) {
        $this->FECH_NAC_USU = $FECH_NAC_USU;
    }

    public function setCIUDAD_NAC_USU($CIUDAD_NAC_USU) {
        $this->CIUDAD_NAC_USU = $CIUDAD_NAC_USU;
    }

    public function setDIRECCION_USU($DIRECCION_USU) {
        $this->DIRECCION_USU = $DIRECCION_USU;
    }

    public function setFONO_USU($FONO_USU) {
        $this->FONO_USU = $FONO_USU;
    }

    public function setE_MAIL_USU($E_MAIL_USU) {
        $this->E_MAIL_USU = $E_MAIL_USU;
    }
    
    public function setESTADO_USU($ESTADO_USU) {
        $this->ESTADO_USU = $ESTADO_USU;
    }

    public function setCLAVE_USU($CLAVE_USU) {
        $this->CLAVE_USU = $CLAVE_USU;
    }
}
