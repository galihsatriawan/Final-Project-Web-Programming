<?php
	include '../../Controller/Login/Handler.php';
	if(is_login()){
				
	}else{
		header("Location: ../Login/Login_page.php");
		}

	include '../../Controller/Database/database_handler.php';
		$x = select_data("tb_unit",array(),array("kode_unit"),array($_GET['id']));
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="../../Pictures/stiki.jpg">
		<title>Detail Unit</title>
	</head>
	<body>
		
		<center>
			<img src="../../Pictures/stiki.jpg" width="100" height="100">
			<h1>
				Detail Unit
			</h1>
		<table style="border: 1px solid black; text-align: left;">
			<tr>
				<th>Kode Unit</th>
				<td>:</td>
				<td><?php echo $x[0]['kode_unit']; ?></td>
			</tr>
			<tr>
				<th>Nama Unit</th>
				<td>:</td>
				<td><?php echo $x[0]['nama_unit']; ?></td>
			</tr>
			<tr>
				<th>Email Unit</th>
				<td>:</td>
				<td><?php echo $x[0]['email_unit']; ?></td>
			</tr>
			<tr>
				<th>Telp Kantor</th>
				<td>:</td>
				<td><?php echo $x[0]['telp_kantor']; ?></td>
			</tr>
		</table><br>
		<table width="200">
			<tr>
				<th align="left">
					<a href="../index.php?">Home</a>
				</th>
				<td align="right"> 
					<?php 
					 	echo "<a href=\"edit_unit.php?id=".$x[0]['kode_unit']."&aksi=edit\">Edit</a>";
					 ?>
				</td>
			</tr>
		</table>

		</center>
	</body>
</html>