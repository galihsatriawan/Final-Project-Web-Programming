<?php 
	session_start();
	unset($_SESSION["username"]);
	unset($_SESSION["user"]);
	unset($_SESSION["admin"]);
	header('Location: ../../view/Admin/Login.php');
 ?>