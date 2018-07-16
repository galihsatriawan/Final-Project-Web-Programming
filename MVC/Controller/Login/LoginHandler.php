<?php
	session_start();
	include '../Database/database_handler.php';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include 'Handler.php';
		include '../../Model/UserLogin.php';
		$username = $_POST['username'];
		$pass = $_POST['password'];

		$user = get_user(array("nama_user"),array($username));
		// var_dump($user);
		if(count($user)==0){
			header("Location: ../../View/Login/Login_page.php?user=nothing");	
		}else{
			if($pass == $user[0]['password']){
				$_SESSION['username'] = $username;
				$_SESSION['user'] = $user[0]["nama_user"];
				$_SESSION['id'] = $user[0]["kode_user"];

				header("Location: ../../View");		
			}else{
				header("Location: ../../View/Login/Login_page.php?user=salah");	
			}
		}
	}else{
		header("Location: ../../View/Login/Login_page.php");
	}
?>