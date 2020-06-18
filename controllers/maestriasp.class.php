<?php
include "models/maestriasp.model.php";
//require 'niveles2.php';
class maestriasp {	

    var $View;
	var $Model;
	var $menu;
	var $nodos;
	var $campus;
	

	function __construct() {
	 $this->menu = new Menu("F1","SF43");
	$this->nodos = new Niveles("filtro");
	// $this->nodos = new Niveles("filtro");
	 $this->campus = new Niveles("select");
	 $this->Model = new maestriaspModel();
	 $this->passport = new Authentication();
	 //$this->alertas = new Alertas();
	 
	 
	 
	 if(isset($_GET['method'])){	
	 
     switch($_GET['method']){
	 	
	 	
	 	case "EnviarCorreoProsp":
			$this->EnviarCorreoProsp();
			break;	
			
		case "Exportar":
			$this->Exportar();
			break;	
	 	
	 	case "Guardar":
				$this->Guardar();
				break;  
				
	 	case "BuscarProspecto":
				$this->BuscarProspecto();
				break; 
				
		case "Editar":
				$this->Editar();
				break;	
				
		case "Eliminar":
			$this->Eliminar();
			break;		
	 			
	 	
		case "Buscar":
			$this->Buscar();
			break;
			
		case "getUsuario":
			$this->getUsuario();
			break;
			

		
		case "ObtenerUsuarios":
			$this->ObtenerUsuarios();
			break;
		
		
		case "Salir":
			$this->Model->Salir();
			$this->View = new View(); 
            $this->loadPage();
			break;
		
		
		case "Omitir":
			$this->Model->Omitir();
			break;
		
			
		default:	
	      $this->View = new View(); 
          $this->loadPage();
		  break;
		}	
		
		
	  }else{
	  	
	  	if(isset($_GET['usuarios'])){}
	  	else{
		  $this->View = new View(); 
          $this->loadPage();			
		}
	  	
	  	 
	  	
	  	
	  }
						 
		 
	}
	
	
	
	function loadPage(){
	
		$this->View->template = TEMPLATE.'/modules/noticias/NOTICIAS.TPL';
		$this->View->loadTemplate();
		$this->loadHeader();
		$this->loadNodos();
		$this->loadMenu();
		if($this->passport->privilegios->hasPrivilege('P04')){
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
	  
	 // $section = $this->View->replace('/<!--\#NUMNOTIFICACIONES\#-->/ms' ,$this->alertas->getNumAlertas(),$section);
	//  $section = $this->View->replace('/<!--\#NOTIFICACIONES\#-->/ms' ,$this->alertas->getAlertas(),$section);
	  
	  $this->View->replace_content('/\#HEADER\#/ms' ,$section);
	  
	 }
	 
	 
	 function loadFooter(){
	 	
      $section = TEMPLATE.'sections/footer.tpl';
	  $section = $this->View->loadSection($section);
	  $this->View->replace_content('/\#FOOTER\#/ms' ,$section);
		
	 }
	 
	 
	 function loadNodos(){
	$campus = $this->campus->nodos;
	$nodos =  $this->nodos->nodos;	 
	$this->View->replace_content('/\#NODOS\#/ms' ,$nodos);
	$this->View->replace_content('/\#CAMPUS\#/ms' ,$campus);
	 
	 
	 }
	
	 function  loadMenu(){
	
	  $menu =  $this->menu->menu; 
	 $this->View->replace_content('/\#MENU\#/ms' ,$menu);
	 
	 
	 }
	 
	
	function error(){
		
		$contenido = $this->View->Template(TEMPLATE.'modules/error.tpl');
		$this->View->replace_content('/\#CONTENT\#/ms' ,$contenido);
	}
    
	
	 function loadContent(){
	 	
		 
	 $section = TEMPLATE.'modules/noticias/GRDMAESTRIASP.TPL';
	 $section = $this->View->loadSection($section);
	 
	 
						 $botones =' <div class="btn-group">
														
													  <a  class="btn"><i class="icon-hand-left"></i> Control</a>
													  <a  data-toggle="dropdown" class="btn dropdown-toggle" ><span class="caret"></span></a>
													  <ul class="dropdown-menu">
														<li><a href="?execute=roles/editroles&method=default&Menu=F3&SubMenu=SF32&Rol="><i class="icon-pencil"></i> Exportar</a></li>
														
														<li><a  onClick="javascript:EliminarProspecto();return false;"><i class="icon-trash"></i> Borrar</a></li>
														
													  </ul>
													</div>';
	 
	 
	 $section =  $this->View->replace('/\#BTNES\#/ms' ,$botones,$section);
	  
	 
	 
	 
	// if($this->passport->privilegios->hasPrivilege('P20')){
	// $urlbtnaddplan ='<button type="button" disabled onclick="AsignarPlanEstrategico(false);" class="btn btn-small btn-warning"><i class="icon-book icon-white"></i>&nbsp;Agregar prospecto</button>';
	/* }else{
	 	$urlbtnaddplan ='';
	 }*/
	  
	  
	  $section =  $this->View->replace('/\#BTNAGREGARPLANE\#/ms' ,'',$section);
	  
	  
	  
	  
	  
	  
	 
	 
	  $this->View->replace_content('/\#CONTENT\#/ms' ,$section);
		 
		 }
		 
		 
		 
		function Exportar(){
		
		
		$usuarios  = explode(",",$_GET['usuarios']);	 	
		$this->Model->usuarios = $usuarios;			
	
		$recurso='<div class=""  style="border-collapse: collapse;" ><table>';
			
		$numrecursos = sizeof($this->Model->usuarios);
	//	$total = $this->Model->totalnum;
		
		if($numrecursos != 0){
			
			 $recurso.='<tr>';		 	  
		 	 
		 	  $recurso.='<th style="border:1px #999999 solid; background:#FF4712; color:#FFF;">Campus</th>';
		 	  $recurso.='<th style="border:1px #999999 solid; background:#FF4712; color:#FFF;">Programa</th>';
		 	  $recurso.='<th style="border:1px #999999 solid; background:#FF4712; color:#FFF;">Nombre</th>';
		 	  $recurso.='<th style="border:1px #999999 solid; background:#FF4712; color:#FFF;">Apellidos</th>';
		 	  $recurso.='<th style="border:1px #999999 solid; background:#FF4712; color:#FFF;">Correo</th>';
		 	  $recurso.='<th style="border:1px #999999 solid; background:#FF4712; color:#FFF;">Telefono</th>';
		 	  $recurso.='<th style="border:1px #999999 solid; background:#FF4712; color:#FFF;">Ciudad</th>';
			  $recurso.='<th style="border:1px #999999 solid; background:#FF4712; color:#FFF;">Fecha</th>';
			  $recurso.='<th style="border:1px #999999 solid; background:#FF4712; color:#FFF;">URL</th>';
		 	  
		 	
		 	  $recurso.='</tr>';
			
			
		foreach($this->Model->usuarios as $idprospecto){	
			
						
					$row = $this->Model->BuscarProspecto($idprospecto);						
		
		
$recurso .= '<tr>
			
				<td style="border:1px #999999 solid; font-size:12px;">'.$row['PK_CAMPUS'].'</td>
				<td style="border:1px #999999 solid; font-size:12px;">'.__toHtml($this->Model->BuscarPrograma($row['PK_PROGRAMA']), ENT_QUOTES, "ISO-8859-1").'</h3></td>
				<td style="border:1px #999999 solid; font-size:12px;">'.__toHtml($row['NOMBRE'], ENT_QUOTES, "ISO-8859-1").'</td>
				<td style="border:1px #999999 solid; font-size:12px;">'.__toHtml($row['APELLIDOS']).'</td>
				<td style="border:1px #999999 solid; font-size:12px;">'.$row['CORREO'].'</td>
				<td style="border:1px #999999 solid; font-size:12px;">'.$row['TELEFONO'].'</td>
				<td style="border:1px #999999 solid; font-size:12px;">'.$row['CIUDAD'].'</td>
                <td style="border:1px #999999 solid; font-size:12px;">'.$row['FECHA_R'].'</td>
                <td style="border:1px #999999 solid; font-size:12px;">'.$row['URL'].'</td>';				
			
					
$recurso .='</tr>';
							
							
			}	
		
	
	  
	   
		}else{		
		
		$recurso .= '<tr> <td colspan="9"><div class="empty_results">NO EXISTEN RESULTADOS</div></td></tr>';		
		
		
		}
		
		$recurso .= '</div></table>';
		
		echo $recurso;	
	}
	
	function Buscar(){
		
		$this->Model->buscarUsuarios();
		$recurso = $this->getPaginadoHeader();
		$recurso .= "#%#";
	
		$numrecursos = sizeof($this->Model->usuarios);
		$total = $this->Model->totalnum;
		
		if($numrecursos != 0){
			
		foreach($this->Model->usuarios as $row){	
			
					
						
						
			
						
						/*	
						$fechar = date("d-m-Y",strtotime($row['FECHA_R']));
						
					$recurso .='<li id="evento56">
<div class="comment-info">
<h3><input type="checkbox" class="usrcheck" id="'.$row['PK1'].'" />&nbsp; <b>Nombre: </b>'.__toHtml($row['NOMBRE'], ENT_QUOTES, "ISO-8859-1").' '.utf8_encode($row['APELLIDOS']).'&nbsp;&nbsp;<b>Programa: </b>'.__toHtml($this->Model->BuscarPrograma($row['PK_PROGRAMA']), ENT_QUOTES, "ISO-8859-1").'&nbsp;&nbsp;<b>Campus: </b>'.$row['PK_CAMPUS'].'</h3>

<h3><b>Ciudad: </b>'.__toHtml($row['CIUDAD'], ENT_QUOTES, "ISO-8859-1").'&nbsp;&nbsp;<b>Telefono: </b>'.$row['TELEFONO'].'&nbsp;&nbsp;<b>Correo: </b>'.$row['CORREO'].'&nbsp;<b>Fecha registro: </b>'.$fechar.' </h3>

 <h3><b>URL origen: </b>'.$row['URL'].'</h3>
</div>
</li>';//*/
				$recurso .='
					<li>
						<table><tbody><tr>
							<td>
								<img style="width:40px; height:40px; opacity:0.2" src="skins/default/images/prospecto.jpg">
								<h3><input type="checkbox" class="usrcheck" id="'.$row['PK1'].'" style="width:40px;"></h3>
							</td>
							<td>
								<div class="comment-info-20">
									<h3><b>Nombre:   </b>'.__toHtml($row['NOMBRE'].' '.$row['APELLIDOS']).' &nbsp;&nbsp;
										<b>Programa: </b>'.__toHtml($row['PROGRAMA']).' &nbsp;&nbsp;
										<b>Campus:   </b>'.$row['PK_CAMPUS'].'
									</h3>
									<h3><b>Ciudad:   </b>'.__toHtml($row['CIUDAD'], ENT_QUOTES, "ISO-8859-1").' &nbsp;&nbsp;
										<b>Telefono: </b>'.$row['TELEFONO'].' &nbsp;&nbsp;
										<b>Correo:   </b>'.$row['CORREO'].' &nbsp;&nbsp;
										<b>Fecha registro: </b>'.__formatDate($row['FECHA_R']).' 
									</h3>
									<h3><b>URL origen: </b>'.$row['URL'].'
									</h3>
								</div>
							</td>
						</tr></tbody></table>
					</li>';
		
		}	
		
		$recurso .= "#%#";
		$recurso .= $this->getpaginadoFooter();
		$recurso .= "#%#";
		$recurso .= $total;
	    echo $recurso;	
	   
		}else{
		
		$recurso =$this->getPaginadoHeader();
		$recurso .= "#%#";
		$recurso .= '<div> <div class="empty_results">NO EXISTEN RESULTADOS</div></div>';
		$recurso .= "#%#";
		$recurso .=$this->getpaginadoFooter();
		$recurso .= "#%#";
		$recurso .= $total;
		echo $recurso;	
		
		}
		
		
	}	
		 
		 
	function Guardar(){	 
					 	
		$this->Model->campus = $_POST['campus'];			
		$this->Model->programa = $_POST['programa'];
		$this->Model->grado = $_POST['grado'];
		$this->Model->nombre = $_POST['nombre'];
		$this->Model->apellidos = $_POST['apellidos'];
		$this->Model->telefono = $_POST['telefono'];
		$this->Model->correo = $_POST['correo'];
		$this->Model->ciudad = $_POST['ciudad'];

		$this->Model->Guardar();
	} 
	
	
	function Editar(){	 
					 	
		$this->Model->campus = $_POST['campus'];			
		$this->Model->programa = $_POST['programa'];
		$this->Model->grado = $_POST['grado'];
		$this->Model->nombre = $_POST['nombre'];
		$this->Model->apellidos = $_POST['apellidos'];
		$this->Model->telefono = $_POST['telefono'];
		$this->Model->correo = $_POST['correo'];
		$this->Model->ciudad = $_POST['ciudad'];

		$this->Model->Editar($_POST['idprospecto']);
	} 
	
	
	function BuscarProspecto(){						 	
		
		$prospecto = $this->Model->BuscarProspecto($_POST['idprospecto']);
		
		$recurso = "";
		$recurso .= $prospecto['CAMPUS'];		
		$recurso .= "#%#";
		$recurso .= __toHtml($prospecto['PROGRAMA'], ENT_QUOTES, "ISO-8859-1");
		$recurso .= "#%#";
		$recurso .= __toHtml($prospecto['NOMBRE'], ENT_QUOTES, "ISO-8859-1");
		$recurso .= "#%#";
		$recurso .= utf8_encode($prospecto['APELLIDOS']);
		$recurso .= "#%#";
		$recurso .= $prospecto['TELEFONO'];	
		$recurso .= "#%#";
		$recurso .= $prospecto['CORREO'];
		$recurso .= "#%#";
		$recurso .= __toHtml($prospecto['CIUDAD'], ENT_QUOTES, "ISO-8859-1");
	    echo $recurso;	
		
		
	}  
		 
		 
	function Eliminar(){	 
		
		$usuarios  = explode(",",$_POST['usuarios']);	 	
		$this->Model->usuarios = $usuarios;

		$this->Model->Eliminar();
	}  
	
	
	
	function EnviarCorreoProsp(){	 
		
		$usuarios  = explode(",",$_POST['usuarios']);	 	
		$this->Model->usuarios = $usuarios;

		$this->Model->Enviar();
	}  
		 
		 
		 
		 
		 
	 
	   //=================================BUSCAR PLANES OPERATIVOS================================//
	 
	 
	 
	
	
	 function getPaginadoHeader(){
	 

		// $this->Model->buscarUsuarios();
		 	
	#---------------------PAGINADO---------------------------#
			 $q = (isset($_GET['q']))? "&q=".$_GET['q'] : ""; 
			$paginadoHeader ='
			
		
     <div class="left">
	  <div id="sort-panel">  
	  <input type="hidden" name="Search" value="recursos" />
	  <input type="hidden" name="p" value="'.$_GET['p'].'" />
	  <input type="hidden" name="s" value="'.$_GET['s'].'" />';
	 
	   if(isset($_GET['q'])){
	   	$paginadoHeader .=' <input type="hidden" name="q" value="'.$_GET['q'].'" />';
	   }	 
	 
	 
        $paginadoHeader.='<select id="sort-menu" name="sort" onchange="Ordenar(this.value)">';       
          
        $this->Model->BuscarNivelDivision();  
        
        $paginadoHeader.='<option';if($_GET['sort']==-1){$paginadoHeader .=' selected="selected" '; }
        $paginadoHeader.=' value="-1">Todos los Programas</option>';	        
        
        foreach($this->Model->divisiones as $row){      
         
          		 $paginadoHeader.= '<optgroup label="'.__toHtml($row['DESCRIPCION']).'">';	
		
		  		 $this->Model->BuscarDivisionPrograma($row['PK1']);  
		      
		          foreach($this->Model->programas as $row2){ 
		          
		              $paginadoHeader.='<option';if($_GET['sort']==$row2['PK1']){$paginadoHeader .=' selected="selected" ';}
		              $paginadoHeader.= ' value="'.$row2['PK1'].'">'.__toHtml($row2['DESCRIPCION']).'</option>';
		          
		          }
		
        	     $paginadoHeader .= '</optgroup>';	
        	
        }    
        	    
       $paginadoHeader.= ' </select>';
       
     
	   $paginadoHeader.= '
	  </div>
	  </div>
	  
	  
      <div class="bar_seperator"></div>
      
	  <div id="search_page_size-panel">
	    
        <div class="page_size_25" onClick="showLimitPage(25,this);" id="page_size_25-panel"></div>
		<div class="page_size_50" onClick="showLimitPage(50,this);" id="page_size_50-panel"></div>
        <div class="page_size_100" onClick="showLimitPage(100,this);" id="page_size_100-panel"></div>
        <div class="page_size_200" onClick="showLimitPage(200,this);" id="page_size_200-panel"></div>
	
     
	 </div>
     
	 <div class="bar_seperator"></div>
	 
	   <div id="results_text">
               0 resultados
       </div> <p>&nbsp;</p>
               
               
                <div style="position:relative; top:0px; left:50px;"><b>Seleccionar todos</b>&nbsp;<input type="checkbox" id="checkboxall1c" onClick="seleccionarTodo(\'1c\')" name="checkboxall"/></div>
      
	    
      <div class="search_pagination"  style="position:relative; top:-33px; ">
	  
	  <div class="left">
	  <div class="btn-group"  style=" left:-10px;">
														
				     <a href="#" class="btn">Control</a>
					 <a href="#" data-toggle="dropdown" class="btn dropdown-toggle" ><span class="caret"></span></a>
					<ul class="dropdown-menu">';
					
					
					
			 if($this->passport->privilegios->hasPrivilege('P69')){		
			 $paginadoHeader.= '<li><a   onclick="Enviar(false);"><i class="icon-envelope"></i> Enviar Correo</a></li>';		    }
			 
			  if($this->passport->privilegios->hasPrivilege('P70')){
				 $paginadoHeader.= '<li><a  onclick="Exportar(false);"  ><i class="icon-pencil"></i> Exportar</a></li>';
			}
			
			 if($this->passport->privilegios->hasPrivilege('P71')){											
				 $paginadoHeader.= '<li><a onClick="javascript:enviar();return false;"><i class="icon-trash"></i> Borrar</a></li>';
			}
														
				 $paginadoHeader.= '</ul>
	</div></div>';
		 
	  
      $prevpag = (int)$_GET["p"]-1;
	 
	  if($prevpag>$this->Model->totalPag || $prevpag<1){
	  
	  $prevbutton  ='<div class="page_button left button_disable"></div>';
	  }else{
	 
	  $prevbutton = '<a href="javascript:void(0)" onclick="showPage('.$prevpag.');"> <div class="page_button left"></div></a>';
	  }
	  
	   
	  $paginadoHeader.=  $prevbutton.' <div class="page_overview_display">
          <input type="text" value="'.$_GET["p"].'" class="page_number-box">
          &nbsp;de&nbsp;'.$this->Model->totalPag.'</div>';
       
	  $nextpag = (int)$_GET["p"]+1;
	  
	  if($nextpag>$this->Model->totalPag){
	  	$nextbutton = '<div class="page_button right button_disable"></div>';
	  }else{
	  	$nextbutton = '<a href="javascript:void(0)" onclick="showPage('.$nextpag.');"> <div class="page_button right "></div></a>';
	  }
	   
	 $paginadoHeader .= $nextbutton.' 
	  </div>';
		#--------------------- END PAGINADO---------------------------#
		
			
		
		//$this->View->replace_content('/\#FILTERHEADER\#/ms' ,$paginadoHeader);
		return $paginadoHeader;
		}
		
		
		
		function getpaginadoFooter(){
		
		#---------------------PAGINADO FOOTER---------------------------#
		$paginadoFooter ='<div class="search_navigation">
    <div class="search_pagination">';
      
	  $prevpag = (int)$_GET["p"]-1;
	  
	  if($prevpag>$this->Model->totalPag || $prevpag<1){
	  
	  $prevbutton  ='<div class="page_button left button_disable"></div>';
	  }else{
	  $prevbutton = '<a href="javascript:void(0)" onclick="showPage('.$prevpag.');"> <div class="page_button left"></div></a>';
	  }
	  
	   $paginadoFooter.=  $prevbutton.' <div class="page_overview_display">
          <input type="text" value="'.$_GET["p"].'" class="page_number-box">
          &nbsp;de&nbsp;'.$this->Model->totalPag.'</div>';
       
	  $nextpag = (int)$_GET["p"]+1;
	  
	  if($nextpag>$this->Model->totalPag){
	  	$nextbutton = '<div class="page_button right button_disable"></div>';
	  }else{
	  	$nextbutton = '<a href="javascript:void(0)" onclick="showPage('.$nextpag.');"> <div class="page_button right "></div></a>';
	  }
	   
	 $paginadoFooter .= $nextbutton.'
    </div>
  </div>';	
		 #---------------------END PAGINADO FOOTER---------------------------#
		
		//$this->View->replace_content('/\#FILTERFOOTER\#/ms' ,$paginadoFooter);
		
		return $paginadoFooter;
	}
	
	    //=================================BUSCAR PLANES OPERATIVOS================================//
	
	
	function getUsuario(){
		
		
		header("Content-Type: text/json; charset=utf-8");
		
		$usuario = $_SESSION['session']['user'];
		
		
        
        echo $_GET['callback'] . '(' . "{'usuario' : '$usuario'}" . ')';
		
	}
	  
	  
	function ObtenerUsuarios(){
		
		
		$ids = $_GET['usuarios'];
		
		$usuario = $this->Model->ObtenerUsuarios($ids);
		
		//$imagen = $usuario['IMAGEN'];
		
		header("Content-Type: text/json; charset=utf-8");
        
        echo $_GET['callback'] . '(' . "{'imagen' : '$usuario'}" . ')';
	   	
		
	    }  
	  
	  
	  
	



}

?>