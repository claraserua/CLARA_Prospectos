<?php
$file = fopen("paquete.json", "r");
	$txt='';
	while(!feof($file)) {
	    $txt=$txt.fgets($file);
	}
echo base64_encode($txt);

?>