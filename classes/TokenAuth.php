<?php

use \Firebase\JWT\JWT;
require_once "../php-jwt-master/src/JWT.php";
require_once "../php-jwt-master/src/ExpiredException.php";

class TokenAuth{

	private static $encrypt = ["HS256"];
	private static $secret_key   = "781e5e245d69b566979b86e28d23f2c7";

	public static function generateToken($data) {

		$time  = time();
		$token = array(
		    'iat' => $time,
		    'exp' => $time + (60*60),
		    'data' => $data
		);

		return JWT::encode($token, self::$secret_key);
		
    }

    public static function checkToken($token){

        if( empty($token) ){
            throw new Exception("Falta el Token");
        }
        
        $decoded = JWT::decode(
            $token,
            self::$secret_key,
            self::$encrypt
        )->data;
        
        $decoded_array = (array) $decoded;

        return $decoded_array;
    }

}