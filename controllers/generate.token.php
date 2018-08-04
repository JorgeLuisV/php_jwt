<?php

require_once "../classes/TokenAuth.php";

try {

	if( !isset($_POST["p_email"]) || empty($_POST["p_email"]) ){
	    echo "Falta el correo";
	    exit;
	}

	if( !isset($_POST["p_password"]) || empty($_POST["p_password"]) ){
	    echo "Falta la contraseña";
	    exit;
	}


	if( $_POST["p_email"] == 'juan@gmail.com' && $_POST["p_password"] == 123 ){

		$data = array(
			'id' => 1,
			'name' => "Juan Miguel",
		);

		$objTokenAuth = new TokenAuth();
    	$token = $objTokenAuth->generateToken($data);

    	echo $token;

	} else {
		echo "Usuario o contraseña inválidos";
	}
	
} catch (Exception $exc) {
   echo $exc->getMessage();
}