<?php
//3.Completar la implementación de las clases: EmpresaCable,Canal, Cliente y la jerarquía correspondiente a los Contratos.
/*4.Para cada una de las clases: Implementar el método constructor, __toString y los métodos de acceso de cada una de las 
variables instancias definidas en la clase.*/

class EmpresaCable{

    private $colPlanes;
    private $colContratos;

    public function __construct($colplan, $colcontr)
    {
        $this->colPlanes=$colplan;
        $this->colContratos=$colcontr;
    }

    public function getColPlanes(){
        return $this->colPlanes;
    }
    public function getColContratos(){
        return $this->colContratos;
    }

    public function setColPlanes($colplan){
        $this->colPlanes=$colplan;
    }
    public function setColContratos($colcontr){
        $this->colContratos=$colcontr;
    }

    public function __toString()
    {
        return "Lista de Planes: ".$this->getColPlanes()."\n".
                "Lista de Contratos: ".$this->getColContratos()."\n";
    }
    /*◦ incorporarPlan($objPlan): que incorpora a la colección de planes un nuevo plan siempre y cuando no haya un plan con los mismos 
    canales y los mismos MG (en caso de que el plan incluyera).*/

        public function incorporarPlan($objPlan){

            $coleccionPlanes= $this->getColPlanes();
            $encontrado=false;
            $i=0;

            while($i < count($coleccionPlanes) && !$encontrado)}
                
            }         
        }

    /*◦ incorporarContrato  ($objPlan,$objCliente,$fechaDesde,$fechaVenc,$esViaWeb) : método que recibe por parámetro el plan, una referencia 
    al cliente, la fecha de inicio y de vencimiento del mismo y si se trata de un contrato realizado en la empresa o via web (si el valor del 
    parámetro es True se trata de un contrato realizado via web). */

    public function incorporarContrato($objPlan,$objCliente,$fechaDesde,$fechaVenc,$esViaWeb){

       
     

    }


    /*◦ retornarImporteContratos  ($codigoPlan) :  método que recibe por parámetro el código de un plan y retorna la suma de los importes de los 
    contratos realizados usando ese plan.
        ◦	 pagarContrato  ($objContrato) : método recibe como parámetro un contrato, actualiza su estado */
    





}

?>