<?php
/*
 
Adquirir un plan implica un contrato. Los contratos tienen la fecha de inicio, la fecha de vencimiento, el plan, 
un estado (al día, moroso, suspendido), un costo, si se renueva o no y una referencia al cliente que adquirió el contrato.
*/
class Contrato
{

     //ATRIBUTOS
     private $fechaInicio;
     private $fechaVencimiento;
     private $objPlan;
     private $estado;  //al día, moroso, suspendido
     private $costo;
     private $seRennueva;
     private $objCliente;

     //CONSTRUCTOR
     public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $costo, $seRennueva, $objCliente)
     {

          $this->fechaInicio = $fechaInicio;
          $this->fechaVencimiento = $fechaVencimiento;
          $this->objPlan = $objPlan;
          $this->estado = 'AL DIA';
          $this->costo = $costo;
          $this->seRennueva = $seRennueva;
          $this->objCliente = $objCliente;
     }


     public function getFechaInicio()
     {
          return $this->fechaInicio;
     }

     public function setFechaInicio($fechaInicio)
     {
          $this->fechaInicio = $fechaInicio;
     }

     public function getFechaVencimiento()
     {
          return $this->fechaVencimiento;
     }

     public function setFechaVencimiento($fechaVencimiento)
     {
          $this->fechaVencimiento = $fechaVencimiento;
     }


     public function getObjPlan()
     {
          return $this->objPlan;
     }

     public function setObjPlan($objPlan)
     {
          $this->objPlan = $objPlan;
     }

     public function getEstado()
     {
          return $this->estado;
     }

     public function setEstado($estado)
     {
          $this->estado = $estado;
     }

     public function getCosto()
     {
          return $this->costo;
     }

     public function setCosto($costo)
     {
          $this->costo = $costo;
     }

     public function getSeRennueva()
     {
          return $this->seRennueva;
     }

     public function setSeRennueva($seRennueva)
     {
          $this->seRennueva = $seRennueva;
     }


     public function getObjCliente()
     {
          return $this->objCliente;
     }

     public function setObjCliente($objCliente)
     {
          $this->objCliente = $objCliente;
     }

     public function __toString()
     {
          //string $cadena
          $cadena = "Fecha inicio: " . $this->getFechaInicio() . "\n";
          $cadena = "Fecha Vencimiento: " . $this->getFechaVencimiento() . "\n";
          $cadena = $cadena . "Plan: " . $this->getObjPlan() . "\n";
          $cadena = $cadena . "Estado: " . $this->getEstado() . "\n";
          $cadena = $cadena . "Costo: " . $this->getCosto() . "\n";
          $cadena = $cadena . "Se renueva: " . $this->getSeRennueva() . "\n";
          $cadena = $cadena . "Cliente: " . $this->getObjCliente() . "\n";


          return $cadena;
     }


     /* 1.En la clase contrato implementar el método  diasContratoVencido   ():  teniendo en cuenta la fecha actual y la fecha de fin del 
     contrato, calcular la cantidad de días que el contrato lleva vencido o 0 en caso contrario. (Puede utilizar la Clase DateTime de PHP y 
     la función Diff que calcula la cantidad de días entre fechas)*/

     public function diasContratoVencido()
     {
          //$finicio=$this->getFechaInicio();
          $fvencimiento = $this->getFechaVencimiento();
          $factual = date("y/m/d");

          $date1 = new DateTime($fvencimiento);
          $date2 = new DateTime($factual);
          $diff = $date1->diff($date2);

          return $diff->days . ' days ';
     }



     /*2.En la clase contrato implementar el método  actualizarEstadoContrato   ():  que actualiza el estado del contrato según corresponda. 
     (Utilizar el método diasContratoVencido )*/

     public function actualizarEstadoContrato()
     {

          $estado = "Al DIA";

          $estadoVencimiento = $this->diasContratoVencido();
          if ($estadoVencimiento > 0 && $estadoVencimiento < 10) {
               $estado = "MOROSO";
               $this->setEstado($estado);
          } elseif ($estadoVencimiento > 9) {
               $estado = "SUSPENDIDO";
               $this->setEstado($estado);
          } else {
               $estado = " AL DIA";
               $this->setEstado($estado);
          }
          return $estado;
     }
     //5.Implementar y redefinir el método  calcularImporte   () que retorna el importe final correspondiente al importe del contrato.

     /*Cuando un cliente paga su contrato hay que analizar el estado del mismo. Si el contrato esta al día, se renovará por un mes mas 
     abonando el importe pactado. Si el contrato está en estado moroso, se cobrará una multa que sera un incremento del  10% del valor 
     pactado por la cantidad de días en mora, además su estado se actualizará al valor al día y se renovará. 
     Finalmente si el estado del contrato es suspendido se cobrará la misma multa de un contrato moroso pero no se permitirá su renovación.*/

     public function calcularImporte()
     {
          $estadoVencimiento = $this->diasContratoVencido();
          $importe=$this->getCosto();
          $seRennueva="";
          $estado="";

          if($estadoVencimiento == "AL DIA"){

               $seRennueva="SI";
               $this->setSeRennueva($seRennueva);
               $fechaVencimiento="mas 30 dias";//corregir
               $this->setFechaVencimiento($fechaVencimiento);
               $this->setCosto($importe);
          }elseif($estadoVencimiento == "MOROSO"){
               $multa=1.10;
               $importe=$importe * $multa * $estadoVencimiento;
               $this->setCosto($importe);
               $seRennueva="SI";
               $this->setSeRennueva($seRennueva);
               $estado=" AL DIA";
               $this->setEstado($estado);
          }else{
               $multa=1.10;
               $importe=$importe * $multa * $estadoVencimiento;
               $this->setCosto($importe);
               $seRennueva="NO";
               $this->setSeRennueva($seRennueva);
               $estado="SUSPENDIDO";
               $this->setEstado($estado);
          }
          return $importe;
     }
}
