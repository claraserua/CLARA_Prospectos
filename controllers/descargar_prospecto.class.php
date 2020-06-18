<?php
include "controllers/principal.class.php";

class descargar_prospecto{
		
 var $claseReporte; 
 
	function __construct() {
			 
	   $this->claseReporte = new principal();
       $this->loadPage();		
						 
	}	
	
		
  function loadPage(){	 	
	 	// create excel document
	 	//$fechaActual= date("dmY");
	 	
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=Excel_prospectos.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		$this->claseReporte->Exportar();
			
  }
	
		  
	  
}




?>