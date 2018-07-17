<?php
	include '../../Controller/admin/AdminHandler.php';
	if(is_login()){
		include 'admin.php';
	}else{

	}
?>
<!DOCTYPE html>
<html>
	<head>

		<link rel="icon" href="../../Pictures/stiki.jpg">
		<title>Login Admin</title>
	</head>
<body>
	<center>
	<h1>LOGIN ADMIN</h1>
	<div class="wrapper_container">
		<div class="header">
			
		</div>
		<div class="container">
			<form method="POST" action="../../Controller/Admin/LoginHandler.php">
				<table style="border: 1px solid black; text-align: left;">
					<tr>
						<td><label for="username">Kode User</label></td>
						<td>  </td>
						<td><input type="text" name="kode_user" placeholder="Kode User" "> </td>
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
</body>
</html>