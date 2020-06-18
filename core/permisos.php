<?php
class Permisos
{
    var $permisos;

    function __construct($role_id) {
        
		$this->getRolePerms($role_id);
    }

    // Retornamos el Objeto Rol con los permisos
    function getRolePerms($role_id) {
      
	 $this->permisos = array();    
     $sql = "SELECT P.PK1,P.PERMISO 
                FROM ROLES_PERMISOS RP, ROLES R, PERMISOS P 
                WHERE RP.PK_PERMISO = P.PK1 and 
                R.PK1 = RP.PK_ROL and
                RP.PK_ROL = '$role_id'";
     
	  $rows = database::getRows($sql);
		foreach ($rows as $row) {
					 
         $this->permisos[$row["PK1"]]= $row["PERMISO"];	
        }		
		    
    }


    // revisamos si el permiso existe
    function hasPerm($permission) {
		
		
        return isset($this->permisos[$permission]);
    }
}


?>