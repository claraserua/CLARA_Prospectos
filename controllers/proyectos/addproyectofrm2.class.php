<?php
include "models/proyectos/addproyectofrm2.model.php";

class addproyectofrm2 {

    var $View;
	var $Model;
	var $menu;
		

	function __construct() {
		
     $this->passport = new Authentication();
	 $this->menu = new Menu();	 
	 $this->Model = new addProyectoFrm2Model();
		
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
	 	
		
		$contenido = $this->View->Template(TEMPLATE.'modules/proyecto/ADDPROYECTO2.TPL');
		
		//$idProyecto =  strtoupper(substr(uniqid('PJ'), 0, 15));
		//$contenido =  $this->View->replace('/\#IDPROYECTO\#/ms' ,$idProyecto,$contenido);			
			
		
		 $urlmenu = '?execute=proyectos/addproyecto&method=default&Menu=F1&SubMenu=SF11';
	   
	   $contenido = $this->View->replace('/\#MENUURL\#/ms' ,$urlmenu,$contenido);
		
		$this->View->replace_content('/\#CONTENT\#/ms' ,$contenido);
		 }
	 

  public  function GuardarProyecto(){
		 	
			
			
		//$this->Model->GuardarProyectoModel($_POST['idProyecto'],$_POST['nomProyecto'],$_POST['descripcion'],
		//$_POST['contPlanE'],$_POST['estaEnplanO'],$_POST['finicio'],$_POST['ftermino']);
		
		//$this->Model->GuardarProyecto();	
		
		
		     /*$this->Model->idplan = $_POST['idProyecto'];
			$this->Model->titulo = $_POST['nomProyecto'];
			$this->Model->descripcion = $_POST['descripcion'];
			$this->Model->disponible = $_POST['contPlanE'];
			$this->Model->disponible = $_POST['estaEnplanO'];
			
			$this->Model->fechai = $_POST['finicio'];
			$this->Model->fechat = $_POST['ftermino'];*/
			
			//$this->Model->jerarquia = $_POST['jerarquia'];
			
			 
			
			
			//$this->Model->GuardarPlan();
			
		
		 
	
          }
		  
		  
		
	
	
	
	  
	  
	
	
	
	

	
}

?>