<?php
include "models/login.model.php";

class login {

    var $View;
	var $Model;
	
	
	function __construct() 
	{
	 $this->View = new View();
	 $this->Model = new loginModel();
	 $this->loadPage();
     $this->View->viewPage();
	}
		 

	 function loadPage()
	 {
	 $this->View->template = TEMPLATE.'login.tpl';
	 $this->View->loadTemplate();
	 $this->loadLogin();	
	 } 
		
		

	 function loadLogin()
	 {
	  
       
	  if(isset($_GET['error'])){
         if($_GET['error']=="login"){
            $section = TEMPLATE.'sections/logine.tpl';
         }
		 else if($_GET['error']=="recordarpassword"){
            $section = TEMPLATE.'sections/olvido.tpl';
         }
         else if($_GET['error']=="enviado"){
            $section = TEMPLATE.'sections/olvido.tpl';
         }
        
		 }else{
		$section = TEMPLATE.'sections/login.tpl';	
		 }
	 
	 $section = $this->View->loadSection($section);
	 $this->View->replace_content('/\#LOGIN\#/ms' ,$section);
	 $contenido = md5(uniqid(mt_rand(), true));
	 $this->View->replace_content('/\#TOKEN\#/ms',$contenido);	
	 }
	 

}//END CLASS

?>