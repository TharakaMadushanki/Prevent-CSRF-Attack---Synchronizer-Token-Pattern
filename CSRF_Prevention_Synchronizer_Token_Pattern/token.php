<?php

class token {
   
	public static function checkToken($csrfToken,$sessionIdentifier){
		
		
		echo "<script>alert('Session Id: $sessionIdentifier');</script>";
		echo "<script>alert('CSRF Token: $csrfToken');</script>";
		
		$myTokenFile = fopen("Tokens.txt", "r") or die("Unable to open file!");
		list($token,$sessionId) = explode(",",chop(fgets($myTokenFile)),2);
		fclose($myTokenFile);
		if($token == $csrfToken){
			if($sessionIdentifier == $sessionId ){
				return true;
			}
		}		
	}
}
?>