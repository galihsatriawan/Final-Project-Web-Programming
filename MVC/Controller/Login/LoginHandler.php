<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include 'Handler.php';
		$username = $_POST['username'];
		$pass = $_POST['password'];
		$user = get_user($username,$pass);
		if($user==null){
			header("Location: ../../View/Login/Login_page.php?user=nothing");	
		}else{
			if($pass = $user['password']){
				header("Location: ../../View");		
			}else{
				header("Location: ../../View/Login/Login_page.php?user=salah");	
			}
		}
	}else{
		header("Location: ../../View/Login/Login_page.php");
	}
?>