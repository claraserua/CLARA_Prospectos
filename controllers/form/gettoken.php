<?php
	
	$secreto = '$2a$12$PXtAWIwXLGUvR2RWngt.f.fBSDYltLpoIKRoHG2AF8AFbvkm15Qk.';
	$secreto = base64_encode($secreto);
	$banner = base64_encode('Rhino:'); 
	
	$authorizationHeader = $banner.$secreto;
	
	$URL = 'http://crmbanner2.azurewebsites.net/o/Server';
	
	$crl = curl_init();

    $headr = array();
	$headr[] = 'content-type: application/json';
	$headr[] = 'Host: crmbanner2.azurewebsites.net';
    $headr[] = 'Content-length: 45';
    $headr[] = 'Authorization: Basic '.$authorizationHeader;
	
   $data = 'grant_type=password&username=Banner&password=';

	curl_setopt($crl, CURLOPT_URL,$URL);
	curl_setopt($crl, CURLOPT_POST,true);
	curl_setopt($crl, CURLOPT_POSTFIELDS, $data);
	curl_setopt($crl, CURLOPT_HEADER, false); //debugear
    curl_setopt($crl, CURLOPT_HTTPHEADER,$headr);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
    
	$rest = curl_exec($crl);
	
	if ($rest == false)
    {
    // throw new Exception('Curl error: ' . curl_error($crl));
    print_r('Curl error: ' . curl_error($crl));
    }
 
    curl_close($crl);
  
    $obj = json_decode($rest);
    $access_token = $obj->access_token;
	
	
	
   //Consumir webservice token
  
   $URLServicio = 'http://crmbanner2.azurewebsites.net/api/CambiaTelefono';
 
 
     $content ='{
  "IdBanner": "00281898",
  "lstInformacionTelefonos": [
    {
      "VPDI": "UAC",
      "TipoTelefono": "BI",
      "SecuenciaTelefono": 1,
      "TipoOperacion": "D",
      "TelefonoArea": "1",
      "Telefono": "1",
      "TelefonoPreferido": "N"
    },
    {
      "VPDI": "UAQ",
      "TipoTelefono": "BU",
      "SecuenciaTelefono": 1,
      "TipoOperacion": "U",
      "TelefonoArea": "1",
      "Telefono": "7878787870",
      "TelefonoPreferido": "N"
    },
    {
      "VPDI": "UAC",
      "TipoTelefono": "CW",
      "SecuenciaTelefono": 1,
      "TipoOperacion": "I",
      "TelefonoArea": "3242",
      "Telefono": "23432",
      "TelefonoPreferido": "N"
    },
    {
      "VPDI": "UAN",
      "TipoTelefono": "PR",
      "SecuenciaTelefono": 1,
      "TipoOperacion": "U",
      "TelefonoArea": "52",
      "Telefono": "62791530",
      "TelefonoPreferido": "Y"
    },
    {
      "VPDI": "UAN",
      "TipoTelefono": "CE",
      "SecuenciaTelefono": 2,
      "TipoOperacion": "U",
      "TelefonoArea": "044",
      "Telefono": "5546610550",
      "TelefonoPreferido": "N"
    },
    {
      "VPDI": "UAQ",
      "TipoTelefono": "CO",
      "SecuenciaTelefono": 2,
      "TipoOperacion": "U",
      "TelefonoArea": "1",
      "Telefono": "45454545450",
      "TelefonoPreferido": "N"
    }
  ]
}';
 
 
    $ch = curl_init();
	
	$header = array();
	$header[] = 'content-type: application/json';
	$header[] = 'Host: crmbanner2.azurewebsites.net';
    $header[] = 'Content-length: 0';
    $header[] = 'Authorization: bearer '.trim($access_token);
 
     
   
	curl_setopt($ch, CURLOPT_URL,$URLServicio);
	curl_setopt($ch, CURLOPT_POST,true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
	curl_setopt($ch, CURLOPT_HEADER, false); //debugear
    curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
    $result = curl_exec($ch);
	
	echo $result;
	
	if ($result == false)
    {
    // throw new Exception('Curl error: ' . curl_error($crl));
    print_r('Curl error: ' . curl_error($ch));
    }
	
    curl_close($ch);
    //echo json_decode($result);
	
	
	
?>