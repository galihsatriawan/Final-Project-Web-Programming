<?php
	// session_start();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include 'Handler.php';
		// include '../../Model/UserLogin.php';
		$username = $_POST['username'];
		$pass = $_POST['password'];

		$user = get_user(array("nama_user"),array($username));
		// var_dump($user);
		if(count($user)==0){
			header("Location: ../../View/Login/Login_page.php?user=nothing");	
		}else{
			if($pass == $user[0]['password']){
				$_SESSION['username'] = $username;
				$_SESSION['user'] = $user;

				header("Location: ../../View");		
			}else{
				header("Location: ../../View/Login/Login_page.php?user=salah");	
			}
		}
	}else{
		header("Location: ../../View/Login/Login_page.php");
	}
?>