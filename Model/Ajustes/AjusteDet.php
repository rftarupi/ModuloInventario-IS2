<?php

class AjusteDet {
    private $ID_DETALLE_AJUSTE_PROD;
    private $ID_PROD;
    private $ID_AJUSTE_PROD;
    private $ID_USU;
    private $CAMBIO_STOCK_PROD;
    private $TIPOMOV_DETAJUSTE_PROD;
    
    public function __construct($ID_DETALLE_AJUSTE_PROD, $ID_PROD, $ID_AJUSTE_PROD, $ID_USU, $CAMBIO_STOCK_PROD, $TIPOMOV_DETAJUSTE_PROD) {
        $this->ID_DETALLE_AJUSTE_PROD = $ID_DETALLE_AJUSTE_PROD;
        $this->ID_PROD = $ID_PROD;
        $this->ID_AJUSTE_PROD = $ID_AJUSTE_PROD;
        $this->ID_USU = $ID_USU;
        $this->CAMBIO_STOCK_PROD = $CAMBIO_STOCK_PROD;
        $this->TIPOMOV_DETAJUSTE_PROD = $TIPOMOV_DETAJUSTE_PROD;
    }

    public function getID_DETALLE_AJUSTE_PROD() {
        return $this->ID_DETALLE_AJUSTE_PROD;
    }

    public function getID_PROD() {
        return $this->ID_PROD;
    }

    public function getID_AJUSTE_PROD() {
        return $this->ID_AJUSTE_PROD;
    }

    public function getID_USU() {
        return $this->ID_USU;
    }

    public function getCAMBIO_STOCK_PROD() {
        return $this->CAMBIO_STOCK_PROD;
    }

    public function getTIPOMOV_DETAJUSTE_PROD() {
        return $this->TIPOMOV_DETAJUSTE_PROD;
    }

    public function setID_DETALLE_AJUSTE_PROD($ID_DETALLE_AJUSTE_PROD) {
        $this->ID_DETALLE_AJUSTE_PROD = $ID_DETALLE_AJUSTE_PROD;
    }

    public function setID_PROD($ID_PROD) {
        $this->ID_PROD = $ID_PROD;
    }

    public function setID_AJUSTE_PROD($ID_AJUSTE_PROD) {
        $this->ID_AJUSTE_PROD = $ID_AJUSTE_PROD;
    }

    public function setID_USU($ID_USU) {
        $this->ID_USU = $ID_USU;
    }

    public function setCAMBIO_STOCK_PROD($CAMBIO_STOCK_PROD) {
        $this->CAMBIO_STOCK_PROD = $CAMBIO_STOCK_PROD;
    }

    public function setTIPOMOV_DETAJUSTE_PROD($TIPOMOV_DETAJUSTE_PROD) {
        $this->TIPOMOV_DETAJUSTE_PROD = $TIPOMOV_DETAJUSTE_PROD;
    }
}
