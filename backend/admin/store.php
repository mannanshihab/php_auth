<?php

	include_once ($_SERVER ['DOCUMENT_ROOT']."/PHP/config.php");

	use PHP\Admin;
	$_admin  = new Admin();
	$_admin ->store();
?>

