<?php

	include '../../Controller/Login/Handler.php';
	if(is_login()){
				
	}else{
		header("Location: ../Login/Login_page.php");
	}
	
	include '../../Controller/Database/database_handler.php';
	$y = select_data("tb_unit",array(),array("kode_unit"),array($_GET['id']));
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../../Pictures/stiki.jpg">
	<title>Edit Data Unit</title>
</head>
<body>
	
	<center>
			<img src="../../Pictures/stiki.jpg" width="100" height="100">
			<h1>
				Edit Unit
			</h1>
		<table style="border: 1px solid black; text-align: left;">
				<form <?php echo"action=\"../../Controller/unit/proses_edit.php?id=".$y[0]['kode_unit']."\""; ?> method="POST" name="unit" style="">
				<tr>
					<th>Kode Unit</th>
					<td>:</td>
					<td><input type="text" value="<?php echo $y[0]['kode_unit']; ?>" name="kode_unit" title="Masukan Kode Unit" required readonly='ON'></td>
				</tr>
				<tr>
					<th>Nama Unit</th>
					<td>:</td>
					<td><input type="text" value="<?php echo $y[0]['nama_unit']; ?>"  name="nama_unit" title="Masukan Nama Unit" required></td>
				</tr>
				<tr>
					<th>Email Unit</th>
					<td>:</td>
					<td><input type="text" value="<?php echo $y[0]['email_unit']; ?>"  name="email_unit" title="Masukan Email Unit" required></td>
				</tr>
				<tr>
					<th>No. Telp</th>
					<td>:</td>
					<td><input type="text" value="<?php echo $y[0]['telp_kantor']; ?>"  name="telp_kantor" title="Masukan No Telp" required></td>
				</tr>
		</table>
				<div>	
				<input type="submit" value="Update Data" class="btn" name="submit">
				<input type="submit" value="Close" class="btn" name="cancel" onclick="window.history.back();return false;">
				</div>
				</form>
	</center>

</body>
</html>