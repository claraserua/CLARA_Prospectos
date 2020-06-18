 <?php
include "models/herramientas/InformesDeError.model.php";
class InformesDeError
{
	var $View;
	var $Model;
	var $menu;
	function __construct()
	{
		$this->menu	 = new Menu();
		$this->Model = new InformesDeErrorModel();
		switch ($_GET['method']) {
			case "Buscar":
				$this->Buscar();
				break;
			default:
				$this->View = new View();
				$this->loadPage();
				break;
		}
	}
	function loadPage()
	{
		$this->View->template = TEMPLATE . 'PRINCIPAL.TPL';
		$this->View->loadTemplate();
		$this->loadHeader();
		$this->loadMenu();
		$this->loadContent();
		$this->loadFooter();
		$this->View->viewPage();
	}
	function loadHeader()
	{
		$section = TEMPLATE . 'sections/header.tpl';
		$section = $this->View->loadSection($section);
		$nombre	 = $_SESSION['session']['titulo'] . ' ' . __toHtml($_SESSION['session']['nombre']) . ' ' . __toHtml($_SESSION['session']['apellidos']);
		$imagen	 = 'thum_40x40_' . $_SESSION['session']['imagen'];
		$section = $this->View->replace('/\#AVATAR\#/ms', $imagen, $section);
		$section = $this->View->replace('/\#USUARIO\#/ms', $nombre, $section);
		$this->View->replace_content('/\#HEADER\#/ms', $section);
	}
	function loadFooter()
	{
		$section = TEMPLATE . 'sections/footer.tpl';
		$section = $this->View->loadSection($section);
		$this->View->replace_content('/\#FOOTER\#/ms', $section);
	}
	function loadMenu()
	{
		$menu = $this->menu->menu;
		$this->View->replace_content('/\#MENU\#/ms', $menu);
	}
	function loadContent()
	{
		$section = TEMPLATE . 'modules/herramientas/INFORMES_DE_ERROR.TPL';
		$section = $this->View->loadSection($section);
		$this->View->replace_content('/\#CONTENT\#/ms', $section);
	}
	function cutString($string, $len)
	{
		if($len < strlen($string))
			return substr($string, 0, $len);
		else
			return $string;
	}
	function Buscar()
	{
		$this->Model->buscarFichas();
		$recurso = $this->getPaginadoHeader();
		$recurso .= "#%#";
		$numrecursos = sizeof($this->Model->fichas);
		$total		 = $this->Model->totalnum;
		if ($numrecursos != 0) {
//								<td><h3>' . __toHtml(cutString($row['ENTRADA'], 20)) . '</h3></td>
			foreach ($this->Model->fichas as $row) {
				$recurso .= '<tr>
								<td><h3>' . $row['PK_PROSPECTO'] . '</h3></td>
								<td><h3>' . __toHtml($row['ERROR']) . '</h3></td>
								
								<td>
									<button class="btn btn-small" onclick="MostrarJSON(\'json_'.$row['PK1'].'\')"><i class="icon-folder-open"></i> Mostrar JSON</button>
									<input id="json_'.$row['PK1'].'" type="hidden" value=\''.$row['SALIDA'].'\' />
								</td>
								
								<td><h3>' . __formatDateTime($row['FECHA_R']) . '</h3></td>
								<td><h3>' . __formatDateTime($row['FECHA_M']) . '</h3></td>
							</tr>';
			}
			$recurso .= "#%#";
			$recurso .= $this->getpaginadoFooter();
			$recurso .= "#%#";
			$recurso .= $total;
			echo $recurso;
		} else {
			$recurso = $this->getPaginadoHeader();
			$recurso .= "#%#NO EXISTEN RESULTADOS#%#";
			$recurso .= $this->getpaginadoFooter();
			$recurso .= "#%#";
			$recurso .= $total;
			echo $recurso;
		}
	}
	function getPaginadoHeader()
	{
		// $this->Model->buscarUsuarios();
		#---------------------PAGINADO---------------------------#
		$q				= (isset($_GET['q'])) ? "&q=" . $_GET['q'] : "";
		$paginadoHeader = '
			<div class="left">
			<div id="sort-panel">
			<input type="hidden" name="Search" value="recursos" />
			<input type="hidden" name="p" value="' . $_GET['p'] . '" />
			<input type="hidden" name="s" value="' . $_GET['s'] . '" />';
		if (isset($_GET['q'])) {
			$paginadoHeader .= ' <input type="hidden" name="q" value="' . $_GET['q'] . '" />';
		}
		$paginadoHeader .= '<select id="sort-menu" name="sort" onchange="Ordenar(this.value)">
		  <option';
		if ($_GET['sort'] == 1) $paginadoHeader .= ' selected="selected" ';
		$paginadoHeader .= ' value="1">Ordenar por: Reciente adición</option>
		  <option';
		if ($_GET['sort'] == 2) $paginadoHeader .= ' selected="selected" ';
		$paginadoHeader .= ' value="2">Ordenar por: Nombre</option>
			<option';
		if ($_GET['sort'] == 3) $paginadoHeader .= ' selected="selected" ';
		$paginadoHeader .= ' value="3">Ordenar por: Apellidos</option>
		</select>
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
			   </div>
	  <div class="search_pagination">
	  <button class="btn btn-small" onclick="buscar();" style="float:left; margin-right:10px;"><i class="icon-refresh"></i> Actualizar</button>';
		$prevpag = (int) $_GET["p"] - 1;
		if ($prevpag > $this->Model->totalPag || $prevpag < 1) {
			$prevbutton = '<div class="page_button left button_disable"></div>';
		} else {
			$prevbutton = '<a href="javascript:void(0)" onclick="showPage(' . $prevpag . ');"> <div class="page_button left"></div></a>';
		}
		$paginadoHeader .= $prevbutton . ' <div class="page_overview_display">
		  <input type="text" value="' . $_GET["p"] . '" class="page_number-box">
		  &nbsp;de&nbsp;' . $this->Model->totalPag . '</div>';
		$nextpag = (int) $_GET["p"] + 1;
		if ($nextpag > $this->Model->totalPag) {
			$nextbutton = '<div class="page_button right button_disable"></div>';
		} else {
			$nextbutton = '<a href="javascript:void(0)" onclick="showPage(' . $nextpag . ');"> <div class="page_button right "></div></a>';
		}
		$paginadoHeader .= $nextbutton . '
		</div>';
		#--------------------- END PAGINADO---------------------------#
		//$this->View->replace_content('/\#FILTERHEADER\#/ms' ,$paginadoHeader);
		return $paginadoHeader;
	}
	function getpaginadoFooter()
	{
		#---------------------PAGINADO FOOTER---------------------------#
		$paginadoFooter = '<div class="search_navigation">
		<div class="search_pagination">';
		$prevpag = (int) $_GET["p"] - 1;
		if ($prevpag > $this->Model->totalPag || $prevpag < 1) {
			$prevbutton = '<div class="page_button left button_disable"></div>';
		} else {
			$prevbutton = '<a href="javascript:void(0)" onclick="showPage(' . $prevpag . ');"> <div class="page_button left"></div></a>';
		}
		$paginadoFooter .= $prevbutton . ' <div class="page_overview_display">
		  <input type="text" value="' . $_GET["p"] . '" class="page_number-box">
		  &nbsp;de&nbsp;' . $this->Model->totalPag . '</div>';
		$nextpag = (int) $_GET["p"] + 1;
		if ($nextpag > $this->Model->totalPag) {
			$nextbutton = '<div class="page_button right button_disable"></div>';
		} else {
			$nextbutton = '<a href="javascript:void(0)" onclick="showPage(' . $nextpag . ');"> <div class="page_button right "></div></a>';
		}
		$paginadoFooter .= $nextbutton . '
			</div>
		  </div>';
		#---------------------END PAGINADO FOOTER---------------------------#
		return $paginadoFooter;
	}
}

?>