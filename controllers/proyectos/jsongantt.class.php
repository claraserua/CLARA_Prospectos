<?php

include "models/proyectos/jsongantt.model.php";


class jsongantt {

    var $View;
	var $Model;
	var $menu;
	private $image;
	private $adjunto;
	private $targetPathumbail;
	private $tipo;
	private $num;
	private $nomRImage;
	var $nodoprincipal;
	var $script;
	var $script2;
	

	function __construct() {
		
		
     $this->passport = new Authentication();
	  
	 $this->Model = new jsonganttModel();
     
		
	 switch($_GET['method']){
	 		
		 case "getGatt":
	        $this->getGatt();
			break;	
													
		default:	
	     
          $this->getGatt();
		  break;
		}
				 
		 
	}
	

		  
		 function getGatt(){
		  
		
			$this->Model->getEtapas($_POST['idProyecto']);
			
			//$this->Model->etapas;
			
			//echo '{"data":'.json_encode($this->Model->etapas).'}';
			
			
			//$pasos = array('name' => "Planned", 'start' => "new Date(2010,00,01)", 'end' => " new Date(2012,00,03)");
			$arr = array('id' => 1, 'name' => "Feature 1", 'series' => '[{ name: "Planned", start: new Date(2010,00,01), end: new Date(2012,00,03) },{ name: "Actual", start: new Date(2010,00,02), end: new Date(2012,00,05), color: "#f0f0f0" }]');
			
			
			//echo json_encode($arr);
			
			
		/*	echo '{
		id: 1, name: "Feature 1", series: [
			{ name: "Planned", start: new Date(2010,00,01), end: new Date(2012,00,03) },
			{ name: "Actual", start: new Date(2010,00,02), end: new Date(2012,00,05), color: "#f0f0f0" }
		]
	}';*/
			
			/*$numrecursos = sizeof($this->Model->etapas);
		    
		
		    if($numrecursos != 0){
			
		    foreach($this->Model->etapas as $row){
			     
			       $content .='<option value="'.$row['PK1'].'"';				
			
			       $content .='>'.__toHtml($row['ETAPA'], ENT_QUOTES, "ISO-8859-1").'</option>';
			}	
			      
			
			
			}else{
				
				$content = '<option value="0">No existen resultados</option>' ;
			}
			
			echo $content;*/
		  	
		  }
		  
	

}

?>