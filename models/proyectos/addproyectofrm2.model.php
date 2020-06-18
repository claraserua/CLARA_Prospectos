<?php

class addProyectoFrm2Model {
	

	private $idProyecto;
	private $nomProyecto;
	private $descripcion;
    private $contPlanE;	
	private $estaEnplanO;
	private $estaPpto;
	
	private $fechai;
	private $fechat;
   //var $usuario;
	
	
	
	var $campos;
	

	
	
	function __construct() {
		
	}
	
	function GuardarProyectoModel($idProyecto, $nomProyecto , $descripcion="", $contPlanE, $estaEnplanO, $estaPpto) {   
		
	  $this->idProyecto = $idProyecto;
	  $this->nomProyecto = $nomProyecto;
	  $this->descripcion = $descripcion;
      $this->contPlanE = $contPlanE;	
	  $this->estaEnplanO = $estaEnplanO;
	  $this->estaPpto = $estaPpto;
		
		
		
		
	}	
	

    function GuardarProyecto(){
		
		//$JERARQUIA = $this->jerarquia;
		
		$this->campos = array('PK1'=>$this->idProyecto,
	                         'NOMPROYECTO'=>$this->nomProyecto,
							 'DESCRIPCION'=>$this->descripcion,
							 'CONTPLANE'=>$this->contPlanE,
							 'ESTAENPLANO'=>$this->estaEnplanO,
							 'ESTAPPTO'=>$this->estaPpto,
							 
							 'FECHA_I'=>$this->fechai,
							 'FECHA_T'=>$this->fechat,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );
	
		database::insertRecords("PJ_PROYECTOS",$this->campos);
		
		
		
		
		//Agregarmos la alerta
		
		/*$this->campos = array('OBJETIVO'=>"Se ha agregado un nuevo plan estrategico..",
							 'TIPO'=>"ALERT",
							 'VISTO'=>'0',
							 'URL'=>"?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=&filter=".$JERARQUIA."",
							 'PK_JERARQUIA'=>$this->jerarquia,
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 );
	
		database::insertRecords("PL_NOTIFICACIONES",$this->campos);*/
		
		
	}
	
	
	
}

?>