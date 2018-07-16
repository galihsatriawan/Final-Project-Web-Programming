<!DOCTYPE html>
<html>
	<head>

		<link rel="icon" href="../../Pictures/stiki.jpg">
		<title>Login Page</title>
	</head>
<body>
	<center>
	<?php
	/*
		Pengecheckan Login
	*/
		include '../../Controller/Login/Handler.php';
		if(is_login()){
			header("Location: ../");
			// echo "sudah_login";
		}else{
			// echo "belum login";
	?>
	<h1>LOGIN</h1>
	<div class="wrapper_container">
		<div class="header">
			
		</div>
		<div class="container">
			<form method="POST" action="../../Controller/Login/LoginHandler.php">
				<table style="border: 1px solid black; text-align: left;">
					<tr>
						<td><label for="username">Username</label></td>
						<td>  </td>
						<td><input type="text" name="username" placeholder="Username" "> </td>
					</tr>
					<tr>
						<td><label for="username">Password</label></td>
						<td>  </td>
						<td><input type="password" name="password" placeholder="Password" "> </td>
					</tr>
				</table>
				<br>
				<input type="submit" name="login" value="login">
				
				
			</form>
		</div>
		<div class="footer">
			
		</div>
	</div>
	</center>
	<?php 	
			}
	?>
</body>
</html>