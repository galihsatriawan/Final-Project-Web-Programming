<?php 
	session_start();
	unset($_SESSION["username"]);
	unset($_SESSION["user"]);
	header('Location: ../../view/login/Login_page.php');
 ?>