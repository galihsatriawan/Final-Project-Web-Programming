<?php
	include '../../Controller/admin/AdminHandler.php';
	include '../../Controller/Database/database_handler.php';
	if(is_login()){

	}else{
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="../../Pictures/stiki.jpg">
		<title>KERMA</title>
	</head>
<body>
	<center>
		<img src="../../Pictures/stiki.jpg" width="100" height="100">
		<h1>LAPOR KERMA</h1>
		<table>
			<tr>
				<td>Username </td>
				<td><?php echo(": ".$_SESSION['username']); ?></td>
			</tr>
			<tr>
				<td>Id User  </td>
				 <td><?php echo(": ".$_SESSION['user']); ?></td>
			</tr>
			<tr>
				<td>Jumlah Partner</td>
				<td> : <?php echo(select_jumlah("tb_partner","")); ?></td>
			</tr>
			<tr>
				<td>Jumlah Kerjasama STIKI</td>
				<td> : <?php echo(select_jumlah("tb_tr_kerjasama","")); ?></td>
			</tr>
		</table>
		<?php 
			echo "<a href=\"../User/Edit_User.php?id=".$_SESSION['user']."&aksi=edit\">Edit My Account</a>";
		?>
		<br>
		<br>
		<table width="250">
			<tr>
				<th align="left">
					<form action="../Unit/list_unit.php">
						<button type="submit" value="Submit">List Unit</button>
					</form>
				</th>
				<td align="right">
					<form action="../Unit/tambah_unit.php">
						<button type="submit" value="Submit">Tambah Unit</button>
					</form>
				</td>
			</tr>
		</table>
		<br>
		<table width="250">
			<tr>
				<th align="left">
					<form action="../Partner/list_partner.php">
						<button type="submit" value="Submit">List Partner</button>
					</form>
				</th>
				<td align="right">
					<form action="../Partner/tambah.php">
						<button type="submit" value="Submit">Tambah Partner</button>
					</form>
				</td>
			</tr>
		</table>
		<br>
		<table width="250">
			<tr>
				<th align="left">
					<form action="../User/list_partner.php">
						<button type="submit" value="Submit">List User</button>
					</form>
				</th>
				<td align="right">
					<form action="../User/tambah.php">
						<button type="submit" value="Submit">Tambah User</button>
					</form>
				</td>
			</tr>
		</table>		
		<br>
		<form action="../../Controller/Admin/logout_handler.php">
			<button type="submit" value="Submit">Logout</button>
		</form>
	</center>

</body>
</html>