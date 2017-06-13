<?php

// Clase Producto

class Producto {
    private $ID_PROD;
    private $NOMBRE_PROD;
    private $DESCRIPCION_PROD;
    private $GRAVA_IVA_PROD;
    private $COSTO_PROD;
    private $PVP_PROD;
    private $ESTADO_PROD;
    private $STOCK_PROD;
    
    // Constructor de la Clase Producto  
    public function __construct($ID_PROD, $NOMBRE_PROD, $DESCRIPCION_PROD, $GRAVA_IVA_PROD, $COSTO_PROD, $PVP_PROD, $ESTADO_PROD, $STOCK_PROD) {
        $this->ID_PROD = $ID_PROD;
        $this->NOMBRE_PROD = $NOMBRE_PROD;
        $this->DESCRIPCION_PROD = $DESCRIPCION_PROD;
        $this->GRAVA_IVA_PROD = $GRAVA_IVA_PROD;
        $this->COSTO_PROD = $COSTO_PROD;
        $this->PVP_PROD = $PVP_PROD;
        $this->ESTADO_PROD = $ESTADO_PROD;
        $this->STOCK_PROD = $STOCK_PROD;
    }

    //Métodos para la obtención (get) y modificación (set) de los atributos de Usuarios
    public function getID_PROD() {
        return $this->ID_PROD;
    }

    public function getNOMBRE_PROD() {
        return $this->NOMBRE_PROD;
    }

    public function getDESCRIPCION_PROD() {
        return $this->DESCRIPCION_PROD;
    }

    public function getGRAVA_IVA_PROD() {
        return $this->GRAVA_IVA_PROD;
    }

    public function getCOSTO_PROD() {
        return $this->COSTO_PROD;
    }

    public function getPVP_PROD() {
        return $this->PVP_PROD;
    }

    public function getESTADO_PROD() {
        return $this->ESTADO_PROD;
    }

    public function getSTOCK_PROD() {
        return $this->STOCK_PROD;
    }

    public function setID_PROD($ID_PROD) {
        $this->ID_PROD = $ID_PROD;
    }

    public function setNOMBRE_PROD($NOMBRE_PROD) {
        $this->NOMBRE_PROD = $NOMBRE_PROD;
    }

    public function setDESCRIPCION_PROD($DESCRIPCION_PROD) {
        $this->DESCRIPCION_PROD = $DESCRIPCION_PROD;
    }

    public function setGRAVA_IVA_PROD($GRAVA_IVA_PROD) {
        $this->GRAVA_IVA_PROD = $GRAVA_IVA_PROD;
    }

    public function setCOSTO_PROD($COSTO_PROD) {
        $this->COSTO_PROD = $COSTO_PROD;
    }

    public function setPVP_PROD($PVP_PROD) {
        $this->PVP_PROD = $PVP_PROD;
    }

    public function setESTADO_PROD($ESTADO_PROD) {
        $this->ESTADO_PROD = $ESTADO_PROD;
    }

    public function setSTOCK_PROD($STOCK_PROD) {
        $this->STOCK_PROD = $STOCK_PROD;
    }
}
