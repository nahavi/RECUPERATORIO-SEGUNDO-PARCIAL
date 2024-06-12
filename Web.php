<?php
//De un contrato realizado via web se guarda el porcentaje de descuento y tiene un cálculo de costo diferente.

class Web extends Contrato{

    private $porcDescuento;

    public function __construct($fechaInicio, $fechaVencimiento, $objPlan,$costo,$seRennueva,$objCliente,)
    {
        parent::__construct($fechaInicio, $fechaVencimiento, $objPlan,$costo,$seRennueva,$objCliente);

        $this->porcDescuento=1.10;
    }


    public function getPorcDescuento(){
        return $this->porcDescuento;
    }
    public function setPorcDescuento($porcdesc){
        $this->porcDescuento=$porcdesc;
    }

    public function __toString()
    {
        $cadena=parent::__toString();

        $cadena.= "Porcentaje de Descuento: ".$this->getPorcDescuento()."\n";

        return $cadena;
    }


    public function calcularImporte(){
        $descuentoweb=$this->getPorcDescuento();
        $importe=(parent::calcularImporte()) * $descuentoweb;
        $this->setCosto($importe);
        return $importe;
    }


}