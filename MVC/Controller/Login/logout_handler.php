<?php 
	session_start();
	unset($_SESSION["username"]);
	unset($_SESSION["user"]);
	unset($_SESSION["unit"]);
	header('Location: ../../view/login/Login_page.php');
 ?>