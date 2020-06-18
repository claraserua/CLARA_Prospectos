<?php
require_once("libs/tree/TreeMenuXL.php");

class Niveles
{
    var $nodos;
	var $menu;
	var $nodo;
	var $nodeProperties;
	var $nodo_Principal;
	var $nodosusuario;
	var $nodospermitidos;
	var $passport;


    //Constructor
	function Niveles($tipo="") {

	   $this->passport = new Authentication();

	   $this->NivelesUsuario($_SESSION['session']['user']);

       switch($tipo){
	   	case "filtro2":
		$this->nodos = $this->initNivelesFiltro();
	   		break;

		case "option":
		$this->nodos = $this->initNivelesOption();
	   		break;

		case "move":
		$this->nodos = $this->initNivelesMove();
	   		break;

	   	case "select":
		$this->nodos = $this->initNivelesSelect();
	   		break;

	   	default:
		$this->nodos = $this->initNiveles();
	   		break;
	   }

    }


	function NivelesUsuario($user){

		$this->nodosusuario = array();
		$sql = "SELECT PK_JERARQUIA FROM USUARIOS_JERARQUIA WHERE PK_USUARIO = '$user'";
		//$result = database::executeQuery($sql);
		foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
	        $this->nodosusuario[] = $row['PK_JERARQUIA'];
        }

	}

	// revisamos si tiene asignado el nivel
    function hasNivel($nivel) {
        return in_array($nivel, $this->nodosusuario); //isset($this->nodosusuario[$nivel]);
    }



	function NivelesUsuarioPermitidos($user){

		$this->nodospermitidos = array();
		$sql = "SELECT PK_JERARQUIA FROM USUARIOS_JERARQUIA WHERE PK_USUARIO = '$user'";
		//$result = database::executeQuery($sql);
		foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
	        $this->nodospermitidos[] = $row['PK_JERARQUIA'];
        }

	}

	// revisamos si tiene asignado el nivel
    function hasNivelPermitido($nivel) {
        return in_array($nivel, $this->nodospermitidos); //isset($this->nodosusuario[$nivel]);
    }




	function initNiveles($nivel = "0"){
		$menu  = new HTML_TreeMenuXL();
	    // $this->nodeProperties = array("icon"=>"nodo.png");

	    $sql = sprintf("SELECT PK1, NOMBRE,DESCRIPCION, PADRE,DISPONIBLE,FECHA_R,ORDEN FROM JERARQUIAS WHERE PADRE = '$nivel' ORDER BY ORDEN");
		//$result = database::executeQuery($sql);

		$i=1;
		foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {

		$nodo = 'nodo'.$i;

	    $$nodo = new HTML_TreeNodeXL(__toHtml($row['NOMBRE'], ENT_QUOTES, "ISO-8859-1"), "?execute=jerarquia&Menu=F3&SubMenu=SF34&method=default&Nivel=".$row['PK1']."#&p=1&s=25&sort=1&q=", $this->nodeProperties);
	    $this->initSubNiveles($row['PK1'],$$nodo);
	    $menu->addItem($$nodo);

	}

	$arbol = new HTML_TreeMenu_DHTMLXL($menu, array("images"=>"libs/tree/TMimages"));
    $nodos = $arbol->toHTML();

	return $nodos;


	}


	function initSubNiveles($padre, &$nodo) {
   $sql="SELECT * FROM JERARQUIAS WHERE PADRE = '$padre' ORDER BY ORDEN";
   //$result = database::executeQuery($sql);


     $i=0;
   foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
    $i++;
	$subNode='subNode'.$i;
     $$subNode=&$nodo->addItem(new HTML_TreeNodeXL(__toHtml($row['NOMBRE'], ENT_QUOTES, "ISO-8859-1"), "?execute=jerarquia&method=default&Menu=F3&SubMenu=SF34&Nivel=".$row['PK1']."#&p=1&s=25&sort=1&q=",
    $this->nodeProperties));
      $this->initSubNiveles($row['PK1'],$$subNode);
   }
}




	 function initNivelesFiltro($nivel = "0"){

	$menu  = new HTML_TreeMenuXL();
    $this->nodeProperties = array("icon"=>"nodo.png");

    $sql = sprintf("SELECT PK1, NOMBRE,DESCRIPCION, PADRE,DISPONIBLE,FECHA_R,ORDEN FROM JERARQUIAS WHERE PADRE = '$nivel' ORDER BY ORDEN");
    //$result = database::executeQuery($sql);

	$i=1;
	foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {

	$nodo = 'nodo'.$i;



	/*if($row['PK1']==3||$row['PK1']==4||$row['PK1']==5){

	}else{*/

		$$nodo = new HTML_TreeNodeXL("<input type='checkbox' name=\"niveles[]\" value=\"".$row['PK1']."\" id='".$row['PK1']."' onClick='filtrar(this.id)'>&nbsp;".__toHtml($row['NOMBRE'], ENT_QUOTES, "ISO-8859-1"), "", $this->nodeProperties);


	}//


	$this->initSubNivelesFiltro($row['PK1'],$$nodo);
    $menu->addItem($$nodo);

	}

	$arbol = new HTML_TreeMenu_DHTMLXL($menu, array("images"=>"libs\\tree\\TMimages"));
     $nodos = $arbol->toHTML();

	return $nodos;

	}


	function initSubNivelesFiltro($padre, &$nodo) {


       $sql="SELECT * FROM JERARQUIAS WHERE PADRE = '$padre' ORDER BY ORDEN";
       //$result = database::executeQuery($sql);

       $user = $nombre = $_SESSION['session']['user'];
       $nivel = (isset($_GET['nodo'])) ? $_GET['nodo'] : $_SESSION['session']['nodo'];




	   if(isset($_GET['nodo'])){ $this->NivelesUsuarioPermitidos($_GET['user']); }


       $i=0;
       foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
       $i++;
	   $subNode='subNode'.$i;


	   if($this->hasNivel($row['PK1']) || isset($this->passport->privilegios->roles['R00']) ){

		$checkbox = "<input type='checkbox' name=\"niveles[]\" ";

		if(isset($_GET['nodo'])){

			if($this->hasNivelPermitido($row['PK1'])){
			 $checkbox .= "checked=\"checked\" ";
			}

		}else{
		    if($nivel==$row['PK1']){
		    $checkbox .= "checked=\"checked\" ";
		    }
		}


		$checkbox .= " value=\"".$row['PK1']."\" id='".$row['PK1']."' onClick='filtrar(this.id)'>&nbsp;".__toHtml($row['NOMBRE'], ENT_QUOTES, "ISO-8859-1");

     $$subNode=&$nodo->addItem(new HTML_TreeNodeXL($checkbox, "",$this->nodeProperties));

	 }

      $this->initSubNivelesFiltro($row['PK1'],$$subNode);
   }
}



	function initNivelesOption($nivel = "0"){


	$menu  = new HTML_TreeMenuXL();
    $this->nodeProperties = array("icon"=>"nodo.png");

    $sql = sprintf("SELECT PK1, NOMBRE,DESCRIPCION, PADRE,DISPONIBLE,FECHA_R,ORDEN FROM JERARQUIAS WHERE PADRE = '$nivel' ORDER BY ORDEN");
    //$result = database::executeQuery($sql);

	$i=1;
	foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {

	$nodo = 'nodo'.$i;

    $$nodo = new HTML_TreeNodeXL("<input type='radio' name='jerarquia' value='".$row['PK1']."' />&nbsp;".__toHtml($row['NOMBRE'], ENT_QUOTES, "ISO-8859-1"), "", $this->nodeProperties);
    $this->initSubNivelesOption($row['PK1'],$$nodo);
    $menu->addItem($$nodo);

	}

	$arbol = new HTML_TreeMenu_DHTMLXL($menu, array("images"=>"libs/tree/TMimages"));
    $nodos = $arbol->toHTML();

	return $nodos;

	}


	function initSubNivelesOption($padre, &$nodo) {

		$nivel = (isset($_GET['nodo'])) ? $_GET['nodo'] : $_SESSION['session']['nodo'];
		$user = $nombre = $_SESSION['session']['user'];

		$sql="SELECT * FROM JERARQUIAS WHERE PADRE = '$padre' ORDER BY ORDEN";
        //$result = database::executeQuery($sql);


        $i=0;
        foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
        $i++;
	$subNode='subNode'.$i;

        if($this->hasNivel($row['PK1']) || isset($this->passport->privilegios->roles['R00']) ){

		$checkbox = "<input type='radio' name='jerarquia' ";

		if($nivel==$row['PK1']){
		$checkbox .= "checked=\"checked\" ";
		}

		$checkbox .= " value=\"".$row['PK1']."\" id='".$row['PK1']."' >&nbsp;".__toHtml($row['NOMBRE'], ENT_QUOTES, "ISO-8859-1");

     $$subNode=&$nodo->addItem(new HTML_TreeNodeXL($checkbox, "",$this->nodeProperties));

	 }


		//$$subNode=&$nodo->addItem(new HTML_TreeNodeXL("<input type='radio' name='jerarquia' value='".$row['PK1']."' />&nbsp;".$row['NOMBRE'], "",$this->nodeProperties));



        $this->initSubNivelesOption($row['PK1'],$$subNode);
        }
}





function initNivelesMove($nivel = "0"){


	$menu  = new HTML_TreeMenuXL();
    $this->nodeProperties = array("icon"=>"nodo.png");


    $sql = sprintf("SELECT PK1, NOMBRE,DESCRIPCION, PADRE,DISPONIBLE,FECHA_R,ORDEN FROM JERARQUIAS WHERE PADRE = '$nivel' ORDER BY ORDEN");
    //$result = database::executeQuery($sql);

	$i=1;
	foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {

	$nodo = 'nodo'.$i;


	  if($this->hasNivel($row['PK1']) || isset($this->passport->privilegios->roles['R00']) ){

		$checkbox = "<input type='radio' name='jerarquia' ";

		if($row['PK1']==$_GET['Padre']){
		$checkbox .= "checked=\"checked\" ";
		}

		$checkbox .= " value=\"".$row['PK1']."\" id='".$row['PK1']."' >&nbsp;".__toHtml($row['NOMBRE'], ENT_QUOTES, "ISO-8859-1");
		$$nodo = new HTML_TreeNodeXL($checkbox, "", $this->nodeProperties);

	    }



	$this->initSubNivelesMove($row['PK1'],$$nodo);
    $menu->addItem($$nodo);

	}

	$arbol = new HTML_TreeMenu_DHTMLXL($menu, array("images"=>"libs/tree/TMimages"));
    $nodos = $arbol->toHTML();

	return $nodos;

	}




	function initSubNivelesMove($padre, &$nodo) {

		$nivel = (isset($_GET['nodo'])) ? $_GET['nodo'] : $_SESSION['session']['nodo'];
		$user = $nombre = $_SESSION['session']['user'];

		$sql="SELECT * FROM JERARQUIAS WHERE PADRE = '$padre' ORDER BY ORDEN";
        //$result = database::executeQuery($sql);


        $i=0;
        foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
        $i++;
	    $subNode='subNode'.$i;

        if($this->hasNivel($row['PK1']) || isset($this->passport->privilegios->roles['R00']) ){

		$checkbox = "<input type='radio' name='jerarquia' ";

		if($row['PK1']==$_GET['Padre']){
		$checkbox .= "checked=\"checked\" ";
		}

		$checkbox .= " value=\"".$row['PK1']."\" id='".$row['PK1']."' >&nbsp;".__toHtml($row['NOMBRE'], ENT_QUOTES, "ISO-8859-1");

        $$subNode=&$nodo->addItem(new HTML_TreeNodeXL($checkbox, "",$this->nodeProperties));

	    }


        $this->initSubNivelesMove($row['PK1'],$$subNode);
        }
}


function initNivelesSelect($nivel = "0"){

    $sql = sprintf("SELECT PK1, NOMBRE,DESCRIPCION, PADRE,DISPONIBLE,FECHA_R,ORDEN FROM JERARQUIAS WHERE PADRE = '$nivel' ORDER BY ORDEN");



    //$result = database::executeQuery($sql);

	$niveles = "";
	$i=1;
	foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {

	//$nodo = 'nodo'.$i;



	  $niveles .= "<option value='".$row['PK1']."'>".__toHtml($row['NOMBRE'], ENT_QUOTES, "ISO-8859-1")."</option>";


    $niveles .=  $this->initSubNivelesSelect($row['PK1']);

	}

	// echo $niveles;
	return $niveles;

	}


	function initSubNivelesSelect($padre) {

        //echo $padre;

		$nivel = (isset($_GET['nodo'])) ? $_GET['nodo'] : $_SESSION['session']['nodo'];
		$user = $nombre = $_SESSION['session']['user'];

		$sql="SELECT * FROM JERARQUIAS WHERE PADRE = '$padre' ORDER BY ORDEN";
        //$result = database::executeQuery($sql);

        $i=0;
        foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {

         //$niveles = "";

        if($this->hasNivel($row['PK1']) || isset($this->passport->privilegios->roles['R00']) ){


		$select = "<option ";

		if($nivel==$row['PK1']){
		$select .= "selected=\"selected\" ";
		}

		$select .= " value=\"".$row['PK1']."\" >&nbsp;".__toHtml($row['NOMBRE'], ENT_QUOTES, "ISO-8859-1")."</option>";

         //$select .= $select;
	     $niveles .= $select;
	     //echo $select;
	    }

        $this->initSubNivelesSelect($row['PK1']);
        }

        //echo $niveles;

        return $niveles;
}





}
?>