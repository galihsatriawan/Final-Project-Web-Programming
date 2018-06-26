<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include '../Model/UserLogin.php';
		include '../Controller/Login/Handler.php';
		if(is_login()){
			// echo "sudah_login";
			
			echo "homepage";
		}else{
			header("Location: Login/Login_page.php");
			// echo "belum login";
		}
		
	?>
</body>
</html>