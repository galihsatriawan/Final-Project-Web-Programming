<?php
	session_start();
	include '../Database/database_handler.php';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include 'Handler.php';
		include '../../Model/UserLogin.php';
		$username = $_POST['kode_user'];
		$pass = $_POST['password'];

		$user = get_user(array("kode_user"),array($username));
		var_dump($user);
		if(count($user)==0){
			header("Location: ../../View/Login/Login_page.php?user=nothing");	
		}else{
			if($pass == $user[0]['password']&&'2'== $user[0]['kode_role']&&'YES' == $user[0]['is_aktif']){
				$_SESSION['username'] = $user[0]["nama_user"];
				$_SESSION['user'] = $user[0]["kode_user"];
				$_SESSION['unit'] = $user[0]["kode_unit"];

				header("Location: ../../View");		
			}else{
				header("Location: ../../View/Login/Login_page.php?user=salah");	
			}
		}
	}else{
		header("Location: ../../View/Login/Login_page.php");
	}
?>