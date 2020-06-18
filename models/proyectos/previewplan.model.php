<?php

class previewplanModel {


	var $idplan;

	function __construct() {

	}



    function getPlan($id){

		$sql = "SELECT * FROM PESTRATEGICOS WHERE PK1 = '$id' ";
		$row = database::getRow($sql);
		if($row){
			return $row;
		}else{
			return FALSE;
		}
		}



    function getLineas(){


		$html = "";
		$id = $_GET['IDPlan'];
		$sql = "SELECT * FROM PESTRATEGICOS_LINEASE WHERE PK_PESTRATEGICO = '$id' ORDER BY ORDEN";


        //$result = database::executeQuery($sql);
		$i=1;
		//while($row = mssql_fetch_array($result, MSSQL_ASSOC)){
		foreach(database::getRows($sql) as $row){


		       $html .= '<fieldset>
							<legend>'.$i.'.   '.__toHtml($row['LINEA'], ENT_QUOTES, "ISO-8859-1").'</legend>';


					 $html .= $this->getObjetivos($row['PK1']);


				 $html .= '</fieldset>';
			   $i++;


		}
		return $html;
	}


	  function getObjetivos($idlinea){
	  	$html = "";
		$sql = "SELECT * FROM PESTRATEGICOS_OBJETIVOSE WHERE PK_LESTRATEGICA = '$idlinea'  ORDER BY ORDEN";


        //$result = database::executeQuery($sql);
		 $i=1;
		//while($row = mssql_fetch_array($result, MSSQL_ASSOC)){
		foreach(database::getRows($sql) as $row){

		   $html .= '	<div class="controls">'.$i.'.  '.__toHtml($row['OBJETIVO'], ENT_QUOTES, "ISO-8859-1").'</div>';
			$i++;
			}

			 return $html;
			 }

}

?>