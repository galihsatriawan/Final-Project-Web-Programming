<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<?php
	/*
		Pengecheckan Login
	*/
		include '../../Controller/Login/Handler.php';
		if(is_login()){
			// echo "sudah_login";
		}else{
			// echo "belum login";
		}
		
	?>

	<div class="wrapper_container">
		<div class="header">
			
		</div>
		<div class="container">
			<form method="POST" action="../../Controller/Login/LoginHandler.php">
				<table>
					<th>
						<td colspan="3"> Login </td>
					</th>
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
					<tr>
						<td></td>
						<td colspan="2"><input type="submit" name="login" value="login"></td>
					</tr>
				</table>
				
				
			</form>
		</div>
		<div class="footer">
			
		</div>
	</div>
</body>
</html>