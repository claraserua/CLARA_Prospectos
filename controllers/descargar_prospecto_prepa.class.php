<?php
include "controllers/preparatorias.class.php";

class descargar_prospecto_prepa{
		
 var $claseReporte; 
 
	function __construct() {
			 
	   $this->claseReporte = new preparatorias();
       $this->loadPage();		
						 
	}	
	
		
  function loadPage(){	 	
	 	// create excel document
	 	//$fechaActual= date("dmY");
	 	
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=Excel_prospectos_prepa.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		$this->claseReporte->Exportar();
			
  }
	
		  
	  
}




?>