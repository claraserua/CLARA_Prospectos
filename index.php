<?php

/**
 * Controller
 *
 *
 * @package		Aprende
 * @author		Ruiz Garcia Jose Carlos
 * @copyright (c) 2012  Sistema de Planeacion
 * @license		Red de Universidades Anahuac
 ********************************** 80 Columns *********************************
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('memory_limit', '-1');

date_default_timezone_set("America/Mexico_City");

require_once('config.php');
require_once('core/handlerEvent.php');


$mvc = new HandlerEvent();

?>
	