<?php
include "controllers/eventos.class.php";

class descargar_prospecto_posgrado{
		
 var $claseReporte; 
 
	function __construct() {
			 
	   $this->claseReporte = new eventos();
       $this->loadPage();		
						 
	}	
	
		
  function loadPage(){	 	
	 	// create excel document
	 	//$fechaActual= date("dmY");
	 	
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=Excel_prospectos_posgrado.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		$this->claseReporte->Exportar();
			
  }
	
		  
	  
}




?>