<?php
	session_start();
	$GLOBALS['kode_institusi']= $_GET['id'];
	// print_r($_SESSION['user']);
	echo $GLOBALS['kode_institusi'];
?>