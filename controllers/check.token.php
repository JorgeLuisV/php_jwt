<?php

require_once "../classes/TokenAuth.php";

try {
	if( !isset($_POST["p_token"]) || empty($_POST["p_token"]) ){
	    echo "Falta el token";
	    exit;
	}

	$token = $_POST["p_token"];

    $objTokenAuth = new TokenAuth();
    $data = $objTokenAuth->checkToken($token);
    
    print_r($data);
       
} catch (Exception $exc) {
   echo $exc->getMessage();
}