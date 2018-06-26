<?php
	include '../Database/database_handler.php';
	session_start();
	// Pengecheckan login
	function is_login(){
		if(isset($_SESSION['username'])){
			header("Location: ../../View");
			return true;
		}else{
			return false;
		}

	}

	function get_user($username){

		get_data_with_more_params_several_field()
	}
	// is_login();
	if($_SERVER['REQUEST_METHOD']=='POST'){

	}else{
		header("Location: ../../View/Login_page.php");
	}
?>