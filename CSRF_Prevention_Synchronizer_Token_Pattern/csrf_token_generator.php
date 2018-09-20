<?php

	session_start();
	$myTokenFile = fopen("Tokens.txt", "w") or die("Error in opening Tokens.txt file!");
	$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
	$text = $_SESSION['token'].",";

	fwrite($myTokenFile, $text);
	$session_id = session_id();
	setcookie('sessionId',$session_id,time()+60*60*24*365,'/');
	$text1 = $session_id."\n";
	fwrite($myTokenFile, $text1);
	fclose($myTokenFile);

	echo $_SESSION['token'];

?>