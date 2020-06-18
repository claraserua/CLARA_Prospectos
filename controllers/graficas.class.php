<?php
include "models/principal.model.php";


class graficas {

    var $View;
	var $Model;
	var $menu;
	var $nodos;
	

	function __construct() {
	 $this->menu = new Menu();
	 $this->View = new View();
	 $this->Model = new principalModel();
	 
	 
	  switch($_GET['method']){
	 	
		case "Imprimegrafica":
			$this->Imprimegrafica();
			break;	
			
		case "Imprimegraficapie":
			$this->Imprimegraficapie();
			break;
		
		case "ConsultaUniversidades":
			$this->ConsultaUniversidades();
			break;
			
		case "ConsultaProspectosPorUniversidad":
			$idUniversidad = $_GET['idUniversidad'];
			$fech_1 = $_GET['fech_1'];
			$fech_2 = $_GET['fech_2'];
			$this->ConsultaProspectosPorUniversidad($idUniversidad, $fech_1, $fech_2);
			break;
			
		case "ConsultaProspectos":
			$fech_1 = $_GET['fech_1'];
			$fech_2 = $_GET['fech_2'];
			$this->ConsultaProspectos($fech_1, $fech_2);
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
		$this->loadContent();
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
	 
	 
	
	function loadMenu()
	{
		$menu =  $this->menu->menu; 
		$this->View->replace_content('/\#MENU\#/ms' ,$menu);
	}
	
	function loadContent(){
	 
		$contenido = $this->View->Template(TEMPLATE.'modules/GRAFICAS.TPL');
		$this->View->replace_content('/\#CONTENT\#/ms' ,$contenido);
		
	}
		 
	function Imprimegrafica(){	 
	//saca datos de bd prospectos
	
		$this->Model->getProspectosUniversidad();
		
		$numrecursos = sizeof($this->Model->etapas);
		
		$content = "";
		if($numrecursos != 0){
		
			foreach($this->Model->etapas as $row){
				
				
				
			}
		
		}
	}  
	     
	function Imprimegraficapie(){	 
	//saca datos de bd prospectos
	
	
	}
	
	function ConsultaUniversidades()
	{
		echo '<option value="0">Todas</option>';
		$this->Model->getUniversidades();
		foreach($this->Model->universidades as $row){
			$PK1 = $row['PK1'];
			$DESCRIPCION = __toHtml($row['DESCRIPCION']);
			echo "<option value='$PK1'>$DESCRIPCION</option>";
		}
	}
		
		function ConsultaProspectosPorUniversidad($idUniversidad,$fech_1,$fech_2)
		{
			if($idUniversidad == '0')
				$this->Model->getProspectos($fech_1,$fech_2);
			else
				$this->Model->getProspectosXUniversidad($idUniversidad,$fech_1,$fech_2);
			$fech_prosp;
			$FECHA_ACTUAL='';
			$indice=-1;
			foreach($this->Model->prospectos as $row)
			{
				$FECHA = $row['FECHA']->format('Y-m-d');
				if ($FECHA_ACTUAL != $FECHA){
					$FECHA_ACTUAL = $FECHA;
					$indice++;
					$fech_prosp[$indice]= array($FECHA_ACTUAL,0);
				}
				$fech_prosp[$indice][1]++;
			}
			$universidad = $this->Model->getUniversidadXID($idUniversidad);
			if($universidad == "")
				$universidad = "Todas las Universidades";
			
			echo "[";
			{
				// Universidad
				echo '"'.__toHtml($universidad, ENT_QUOTES).'"';
				
				// Fechas
				echo ",[";
				$first=true;
				foreach($fech_prosp as $item){
					if($first) $first=false;
					else echo ",";
					$fecha = $item[0];
					echo '"'.$fecha.'"';
				}
				echo "]";
				
				// contadores de prospectos por dia.
				echo ",[";
				$first=true;
				foreach($fech_prosp as $item){
					if($first) $first=false;
					else echo ",";
					$contador=$item[1];
					echo "$contador";
				}
				echo "]";
			}
			echo "]";
		}
		
	function ConsultaProspectos($fech_1,$fech_2)
	{
		$this->Model->getUniversidades();
		$universidades;
		$indice=0;
		foreach($this->Model->universidades as $row){
			$PK1 = $row['PK1'];
			$CODIGO = $row['CODIGO'];
			$universidades[$indice] = array($PK1, $CODIGO, 0);
			$indice++;
		}
		$this->Model->getProspectos_2($fech_1,$fech_2);

		$arrAcumXUniv;
		$PK_ACTUAL='';
		$indice=-1;
		foreach($this->Model->prospectos as $row)
		{
			$PK_CAMPUS = $row['PK_CAMPUS'];
			
			//echo "\nforeach:";
			//*
			$length = sizeof($universidades);
			for($j=0; $j<$length; $j++){
				if($PK_CAMPUS == $universidades[$j][0]){
					$universidades[$j][2]++;
				}
			}
			/*
			foreach($universidades as $item){
				echo ', <'.$PK_CAMPUS . ',' . $item[0] . '>';
				if($PK_CAMPUS == $item[0]){
					$item[2] = $item[2]+1;
					echo '('.$item[2].')';
				}
			}
			
			/*
			$PK_CAMPUS = $row['PK_CAMPUS'];
			if ($PK_ACTUAL != $PK_CAMPUS)
			{
				$universidad="";
				foreach($universidades as $item){
					if($PK_CAMPUS == $item[0])
						$universidad = $item[1];
				}
				$PK_ACTUAL = $PK_CAMPUS;
				$indice++;
				$arrAcumXUniv[$indice]=array($universidad, 0);
			}
			$arrAcumXUniv[$indice][1]++;
			//*/
		}
		
		echo "[";
		{
			echo "[\n";
			$first=true;
			foreach($universidades as $item){
				$universidad = __toHtml($item[1], ENT_QUOTES);
				$contador = $item[2];
				if($first) $first=false;
				else echo ",";
				echo "[ \"$universidad\", $contador ]\n";
			}
			echo "]";
			/*
			echo "[\n";
			$first=true;
			foreach($arrAcumXUniv as $item){
				if($item[0]!=''){
					$universidad = __toHtml($item[0], ENT_QUOTES);
					$contador = $item[1];
					if($first) $first=false;
					else echo ",";
					echo "[ \"$universidad\", $contador ]\n";
				}
			}
			echo "]";
			//*/
		}
		echo "]";
		
	}

}

?>