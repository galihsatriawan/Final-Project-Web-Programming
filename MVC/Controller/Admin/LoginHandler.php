<?php
	include '../Database/database_handler.php';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include 'AdminHandler.php';
		$username = $_POST['kode_user'];
		$pass = $_POST['password'];

		$user = get_user(array('kode_user'),array($username));
		echo "<br>";
		var_dump($user);
		if(count($user)==0){
			header("Location: ../../View/admin/login.php?user=nothing");	
		}else{
			if($pass == $user[0]['password']&&'1'== $user[0]['kode_role']&&'YES' == $user[0]['is_aktif']){
				$_SESSION['username'] = $user[0]["nama_user"];
				$_SESSION['user'] = $user[0]["kode_user"];
				$_SESSION['admin'] = "YES";
				header("Location: ../../View/Admin/Admin.php");		
			}else{
				header("Location: ../../View/admin/login.php?user=salah");	
			}
		}
	}else{
		header("Location: ../../View/admin/login.php");
	}
?>