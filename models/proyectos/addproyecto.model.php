<?php

class addproyectoModel {
	
	var $nomProyecto;
	var $descripcion;	
    var $disponible;
	var $fechai;
	var $fechat;
    var $usuario;
	var $idProyecto;	
	var $jerarquia;
	var $campos;
	var $usuarios;
	var $totalnum;
	var $roles;
	var $rol;
	
	
	
	function __construct() {
		
	}

    function GuardarProyecto($estado){
		$estado = trim($estado);
		$JERARQUIA = $this->jerarquia;
		
	$finicio = $this->fechai;
	$ftermino = $this->fechat;
	
		
		$sql = "SELECT PK1 FROM PROYECTOS WHERE PK1 = '$this->idProyecto'";	
		$row = database::getRow($sql);
		
		
		if($row){	
		
		         if(($finicio==""||$finicio==NULL)||(($ftermino==""||$ftermino==NULL))){
					
					$this->campos = array(//'PK1'=>$this->idProyecto,
	                         'PROYECTO'=>$this->nomProyecto,
							 'DESCRIPCION'=>$this->descripcion,							
							 'PK_JERARQUIA'=>$this->jerarquia,
							 'DISPONIBLE'=>$this->disponible,
							 'ESTADO'=>$estado,
							// 'FECHA_I'=>$finicio,
							// 'FECHA_T'=>$ftermino,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );	
							 
				$condition = "PK1 = '$this->idProyecto' ";
		 
		         database::updateRecords("PROYECTOS",$this->campos,$condition);	
				$this->asignarUsuarioProyecto();	
					
				 }else{
					
					
					$this->campos = array(//'PK1'=>$this->idProyecto,
	                         'PROYECTO'=>$this->nomProyecto,
							 'DESCRIPCION'=>$this->descripcion,							
							 'PK_JERARQUIA'=>$this->jerarquia,
							 'DISPONIBLE'=>$this->disponible,
							 'ESTADO'=>$estado,
							 'FECHA_I'=>$finicio,
							 'FECHA_T'=>$ftermino,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );	
							 
				     $condition = "PK1 = '$this->idProyecto' ";
		             database::updateRecords("PROYECTOS",$this->campos,$condition);	
					 $this->asignarUsuarioProyecto();
					
				    }		
			
						 		
			
		}else{
			
			     if(($finicio==""||$finicio==NULL)||(($ftermino==""||$ftermino==NULL))){
				 	
					$this->campos = array('PK1'=>$this->idProyecto,
	                         'PROYECTO'=>$this->nomProyecto,
							 'DESCRIPCION'=>$this->descripcion,							
							 'PK_JERARQUIA'=>$this->jerarquia,
							 'DISPONIBLE'=>$this->disponible,
							 'ESTADO'=>$estado,
							// 'FECHA_I'=>$finicio,
							//'FECHA_T'=>$ftermino,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );
		
		                database::insertRecords("PROYECTOS",$this->campos);	
			            $this->asignarUsuariosAutomaticosProyecto();
						$this->asignarUsuarioProyecto();
							
					
					
					
				 }else{
				 	
					  $this->campos = array('PK1'=>$this->idProyecto,
	                         'PROYECTO'=>$this->nomProyecto,
							 'DESCRIPCION'=>$this->descripcion,							
							 'PK_JERARQUIA'=>$this->jerarquia,
							 'DISPONIBLE'=>$this->disponible,
							 'ESTADO'=>$estado,
							 'FECHA_I'=>$finicio,
							 'FECHA_T'=>$ftermino,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );
		
		                database::insertRecords("PROYECTOS",$this->campos);	
			            $this->asignarUsuariosAutomaticosProyecto();				
					    $this->asignarUsuarioProyecto();
					
				 }		
			
			
		}
		
		
		
	}
	
	
	  function asignarUsuariosAutomaticosProyecto(){
		
    $idProyecto = $this->idProyecto;
	//$jerarquia = $this->jerarquia;

    
	$sql=" SELECT RU.PK_USUARIO AS IDUSUARIO, RU.PK_ROLE AS IDROLE FROM ROLES_USUARIO RU, ROLES R
  WHERE RU.PK_ROLE = R.PK1 AND R.TIPO = 'A' ";
		
		
		//$result1 = database::executeQuery($sql);
	
        	
	// while ($rowusuario = mssql_fetch_array($result1, MSSQL_ASSOC)) {
	foreach(database::getRows($sql) as $rowusuario){
	 		
	 	$usuario=$rowusuario['IDUSUARIO'];
		$idrol=$rowusuario['IDROLE'];
		$sql = "SELECT PK1 FROM PROYECTOS_ASIGNACIONES WHERE PK_USUARIO = '$usuario' AND PK_PROYECTO = '$idProyecto' ";   
		$row = database::getRow($sql);
		if(!$row){
				  
		$sql = "SELECT PK1 FROM USUARIOS WHERE PK1 = '$usuario' ";   
		$row = database::getRow($sql);
		
		   if($row){		//id se autoincrementa
		   $this->campos = array('PK_PROYECTO'=>$idProyecto,
		                     'PK_USUARIO'=>$usuario,
	                         'ROL'=>$idrol,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 );
		
		$result = database::insertRecords("PROYECTOS_ASIGNACIONES",$this->campos);
		
		
		
		 }	
		}
		
		
		   }   
		
		
		
		
	}	
	
	
	function asignarUsuarioProyecto(){
		
    $idProyecto = $this->idProyecto;
	$rol = $this->rol;
    $usuario =  $_SESSION['session']['user'];
    
	//foreach($this->usuarios as $usuario){
	 	
		$sql = "SELECT PK1 FROM PROYECTOS_ASIGNACIONES WHERE PK_USUARIO = '$usuario' AND PK_PROYECTO = '$idProyecto' ";   
		$row = database::getRow($sql);
		if($row){				  
				  
		     $sql = "SELECT PK1 FROM USUARIOS WHERE PK1 = '$usuario' ";  		 
		     $row = database::getRow($sql);		
		
		     if($row){
			 			
		         $this->campos = array(//'PK_PROYECTO'=>$idProyecto,
		                            //'PK_USUARIO'=>$usuario,
	                                'ROL'=>$rol,
						        	'FECHA_R'=>date("Y-m-d H:i:s"),
							        );
		
		            $condition = "PK_PROYECTO = '$idProyecto' AND PK_USUARIO = '$usuario' ";
		             database::updateRecords("PROYECTOS_ASIGNACIONES",$this->campos,$condition);			
	
		      }	
			  
		}else{			
		
		     $sql = "SELECT PK1 FROM USUARIOS WHERE PK1 = '$usuario' ";  		 
		     $row = database::getRow($sql);		
		
		     if($row){		  
					 //id se autoincrementa
		         $this->campos = array('PK_PROYECTO'=>$idProyecto,
		                            'PK_USUARIO'=>$usuario,
	                                'ROL'=>$rol,
						        	'FECHA_R'=>date("Y-m-d H:i:s"),
							        );
		
		          $result = database::insertRecords("PROYECTOS_ASIGNACIONES",$this->campos);
			}
			
			
		}
		
		
		
		
		 //  }
		
		
		
		
	}	
	
	
	
	
	
	function obtenerRoles(){
		
	 	$sql = "SELECT * FROM ROLES WHERE TIPO IN('P') "; 
		//$result = database::executeQuery($sql);
			
		foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		
	     $this->roles[] = $row;
		
        }
	 }	
	
	
	
	
		
	function getProyecto($id){		
		
	  $sql = "SELECT * FROM PROYECTOS WHERE PK1='$id'";   
		$row = database::getRow($sql);		
	
		if($row){
			return $row;
		}else{
			return FALSE;
		}
	}
	
}

?>