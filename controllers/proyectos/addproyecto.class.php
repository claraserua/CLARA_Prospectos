<?php
include "models/proyectos/addproyecto.model.php";
include "libs/resizeimage/class.upload.php";


class addproyecto {

    var $View;
	var $Model;
	var $menu;
	var $nodos;
	var $image;
	var $targetPathumbail;
	var $nodoprincipal;
	

	function __construct() {
		
     $this->passport = new Authentication();
	 $this->menu = new Menu();
	 $this->Model = new addproyectoModel();
	 $this->nodoprincipal = new Niveles("option");
		
	 switch($_GET['method']){
	 	
		case "GuardarProyecto":
			$this->GuardarProyecto();
			break;
			
		default:	
	      $this->View = new View(); 
          $this->loadPage();
		  break;
		}
				 
		 
	}
	
	
	
	 function loadPage(){
	
		$this->View->template = TEMPLATE.'FRMPRINCIPAL.TPL';	
		$this->View->loadTemplate();
        $this->loadHeader();		
		$this->loadMenu();
		
		if($this->passport->privilegios->hasPrivilege('P20')){
		$this->loadContent();
		}else{
		$this->error();
		}
		$this->loadFooter();
		$this->View->viewPage();
		
	 }
	 
	 
	   function loadHeader(){

	  $section = TEMPLATE.'sections/header.tpl';
	  $section = $this->View->loadSection($section);
	 $nombre = $_SESSION['session']['titulo'].' '.__toHtml($_SESSION['session']['nombre']).' '.__toHtml($_SESSION['session']['apellidos']);
	  $imagen = 'thum_40x40_'.$_SESSION['session']['imagen'];
	  $section = $this->View->replace('/\#AVATAR\#/ms' ,$imagen,$section);
	  $section = $this->View->replace('/\#USUARIO\#/ms' ,$nombre,$section);
	  $this->View->replace_content('/\#HEADER\#/ms' ,$section);
	  
	 }
	 
	 
	 function loadFooter(){
	 	
      $section = TEMPLATE.'sections/footer.tpl';
	  $section = $this->View->loadSection($section);
	  $this->View->replace_content('/\#FOOTER\#/ms' ,$section);
		
	 }
	 
	 
	
	 function loadMenu(){
	
	 $menu =  $this->menu->menu; 
	 $this->View->replace_content('/\#MENU\#/ms' ,$menu);
	 
	 
	 }
	 
	

	function error(){
		
		$contenido = $this->View->Template(TEMPLATE.'modules/error.tpl');
		$this->View->replace_content('/\#CONTENT\#/ms' ,$contenido);
	}


  
	 function loadContent(){
	 	
		$row=NULL;
		
		if(isset($_GET['IDProyecto'])){			
			$row = $this->Model->getProyecto($_GET['IDProyecto']);	
			$estado = $row['ESTADO'];		
			$idproyecto = $row['PK1'];		
		}else{			
			$idproyecto =  strtoupper(substr(uniqid('PJ'), 0, 15));			
			$estado='E';		
					
		}
		$contenido = $this->View->Template(TEMPLATE.'modules/proyecto/ADDPROYECTO.TPL');
		
		$contenido =  $this->View->replace('/\#IDPROYECTO\#/ms' ,$idproyecto,$contenido);	
		$contenido =  $this->View->replace('/\#ESTADO\#/ms' ,$estado,$contenido);	
		$contenido =  $this->View->replace('/\#PROYECTO\#/ms' ,__toHtml($row['PROYECTO'], ENT_QUOTES, "ISO-8859-1"),$contenido);
	$contenido =  $this->View->replace('/\#DESCRIPCION\#/ms' ,__toHtml($row['DESCRIPCION'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		if(isset($row['DISPONIBLE'])){
			if($row['DISPONIBLE']==0){		
	            $contenido =  $this->View->replace('/\#NODISPONIBLE\#/ms' ,'checked="checked"',$contenido);
		      }
			else{
				$contenido =  $this->View->replace('/\#DISPONIBLE\#/ms' ,'checked="checked"',$contenido);
			    }
			
		}else{
			$contenido =  $this->View->replace('/\#DISPONIBLE\#/ms' ,'checked="checked"',$contenido);
			
		}
				
				
		$contenido =  $this->View->replace('/\#FECHAINICIO\#/ms' ,$row['FECHA_I'],$contenido);
		$contenido =  $this->View->replace('/\#FECHATERMINO\#/ms' ,$row['FECHA_T'],$contenido);
		
		
			
		$contenido =  $this->View->replace('/\#NODOSPRINCIPAL\#/ms' ,$this->nodoprincipal->nodos,$contenido);
		
		$roles = $this->getRoles($idproyecto);
		$contenido =  $this->View->replace('/\#ROLES\#/ms' ,$roles,$contenido);	
		
		$this->View->replace_content('/\#CONTENT\#/ms' ,$contenido);
		 }
	 

         function GuardarProyecto(){
		
		    $this->Model->idProyecto = $_POST['idProyecto'];
			$this->Model->nomProyecto = $_POST['nomProyecto'];
			$this->Model->descripcion = $_POST['descripcion'];
			$this->Model->disponible = $_POST['disponible'];
			$this->Model->fechai = $_POST['finicio'];
			$this->Model->fechat = $_POST['ftermino'];			
			$this->Model->jerarquia = $_POST['jerarquia'];	
			$this->Model->rol = $_POST['rol'];			
			
			$this->Model->GuardarProyecto($_POST['estado']);
			
		
		 
	
          }
		  
	function getRoles($idproyecto){
		
	$usuario =  $_SESSION['session']['user'];    	
	$sql = "SELECT ROL FROM PROYECTOS_ASIGNACIONES WHERE PK_USUARIO = '$usuario' AND PK_PROYECTO = '$idproyecto' ";      
	$row = database::getRow($sql);	
	$idRol = $row['ROL'];
		
		$panelcontent = "";			
		$this->Model->obtenerRoles();
		$numRoles = sizeof($this->Model->roles); 
	if($numRoles != 0){ 	       
	   foreach($this->Model->roles as $row){
			    
 	
			$panelcontent .='<option value="'.$row['PK1'].'"';
			
			if($idRol == $row['PK1']){
			$panelcontent .= 'selected="selected"';
		    }		
			
			$panelcontent .='>'.__toHtml($row['ROLE'], ENT_QUOTES, "ISO-8859-1").'</option>';
		 }		
				   
      }
			
	 else{
		$panelcontent .='<option ><option>';
		 }				
		
		return $panelcontent;
		
	   }	 
	 
	  
		  
		  
		
	
		function getPlanE(){
	
	$row = $this->Model->getPlanE($_GET['IDPlanEstrategico']);
	
	return $row;
			
	}
	
	  
	  
	
	
	
	

	
}

?>