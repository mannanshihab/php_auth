<?php
	session_start();
	$_SESSION [ 'is_authenticated']= false;
	unset($_SESSION [ 'is_authenticated']);
	session_destroy();
	header('location:http://localhost/php/backend/login.php');	
?>
