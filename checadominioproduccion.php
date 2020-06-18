<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *'); 

$handle = fopen("dominiosproduccion.txt", "r");
$jsontext = "[";

$arr = array();
if ($handle) 
{
    while (($line = fgets($handle)) !== false) 
	{
        array_push($arr,trim($line));
    }
    fclose($handle);
} else {
    // error opening the file.
} 


echo json_encode($arr);

?>