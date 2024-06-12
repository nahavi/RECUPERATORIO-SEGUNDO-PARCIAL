<?php
/*El importe final de un contrato realizado en la empresa se calcula sobre el importe del plan mas los 
importes parciales de cada uno de los canales que lo forman*/

class Oficina extends Contrato{

   

    public function __construct($fechaInicio, $fechaVencimiento, $objPlan,$costo,$seRennueva,$objCliente)
    {
        parent::__construct($fechaInicio, $fechaVencimiento, $objPlan,$costo,$seRennueva,$objCliente);

       
    }

    public function getFechaInicio()
    {
         return parent:: getFechaInicio();
    }

    public function setFechaInicio($fechaInicio)
    {
        parent:: setFechaInicio($fechaInicio);
    }
    public function getFechaVencimiento()
    {
        parent::getFechaVencimiento();
    }

    public function setFechaVencimiento($fechaVencimiento)
    {
        parent::setFechaVencimiento($fechaVencimiento);
    }


    public function getObjPlan()
    {
        parent:: getObjPlan();
    }

    public function setObjPlan($objPlan)
    {
        parent::setObjPlan($objPlan);
    }

    public function getEstado()
    {
        parent::getEstado();
    }

    public function setEstado($estado)
    {
        parent::setEstado($estado);
    }

    public function getCosto()
    {
        parent:: getCosto();
    }

    public function setCosto($costo)
    {
        parent::setCosto($costo);
    }

    public function getSeRennueva()
    {
        parent::getSeRennueva();
    }

    public function setSeRennueva($seRennueva)
    {
        parent:: setSeRennueva($seRennueva);
    }


    public function getObjCliente()
    {
        parent::getObjCliente();
    }

   

    public function __toString()
    {
        $cadena=parent::__toString();

       

        return $cadena;
    }
    /*El importe final de un contrato realizado en la empresa se calcula sobre el importe del plan mas los importes
    parciales de cada uno de los canales que lo forman. */
    public function calcularImporte(){
        $importeTotalCanales=0;
        $objPlan=$this->getObjPlan();
        $coleccionCanales=$objPlan->getColCanales();
        
        foreach($coleccionCanales as $unCanal){
            $importeunCanal=$unCanal->$this->getImporte();
            $importeTotalCanales=$importeTotalCanales + $importeunCanal;
        }
        $importe=(parent::calcularImporte()) + $importeTotalCanales;
        $this->setCosto($importe);
        return $importe;
    }


}