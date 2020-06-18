<?php
require 'authentication.php';
require 'dbaccess.php';
//require 'constants.php';
require 'view.php';
require 'menu.php';
require 'niveles.php';
require 'alertas.php';


class HandlerEvent
{
    var $passport;
    var $event;
    var $uri;
    var $peticiones;
    function __construct()
    {
        $this->passport = new Authentication();
        if ($this->passport->session == NULL) {
            #SI NO EXISTE SESSION
            if ($this->passport->login) {
                $this->loadPageError();
            } else {
                #NO EXISTE LOGIN Y TAMPOCO SESSION go PAGINA LOGIN
                $this->loadPageLogin();
            }
        } else {
            if ($this->passport->login) {
                #LOGIN CORECTO OBTENER PERFIL
                $this->loadController();
            } else {
                #EXISTE LA SESSION
                $this->loadController();
            }
        }
    }
	
    function loadController()
    {
        if (isset($_GET['execute'])) {
            $controlador = $_GET['execute'];
            $page        = $this->loadClass($controlador);
        } else {
            $page = $this->loadClass('principal');
        }
    }
	
    function loadPageLogin()
    {
        $page = $this->loadClass('login');
    }
	
    function loadPageError()
    {
        header("Location: index.php?error=login");
    }
	
    function loadClass($controller, $route = "")
    {
		$controller = str_replace('/','\\', $controller);
		
        $class = explode("\\", $controller);
        if (sizeof($class) > 1) {
            $class = $class[sizeof($class) - 1];
        } else {
            $class = $controller;
        }
        require_once(RAIZ . 'controllers\\' . $controller . '.class.php');
        return new $class;
    }
	
    function obtenerPerfil()
    {
    }
	
    function cacharEvento()
    {
    }
	
} //END CLASS HandlerEvent

?>
