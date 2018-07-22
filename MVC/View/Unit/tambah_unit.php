<?php  
	include '../../Controller/Login/Handler.php';
	if(is_login()){
				
	}else{
		header("Location: ../Login/Login_page.php");
	}
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
				Tambah Unit
			</h1> 
			<form action="../../Controller/unit/proses_input.php" method="POST" name="unit" style="">
			<table>
				<tr>
					<th>Kode Unit</th>
					<td><input type="text" placeholder="Kode Unit" name="kode_unit" title="Masukan Kode Unit" required></td>
				</tr>
				<tr>
					<th>Nama Unit</th>
					<td><input type="text" placeholder="Nama Unit" name="nama_unit" title="Masukan Nama Unit" required></td>
				</tr>
				<tr>
					<th>Email Unit</th>
					<td><input type="text" placeholder="Email Unit" name="email_unit" title="Masukan Email Unit" required></td>
				</tr>
				<tr>
					<th>Telp Unit</th>
					<td><input type="text" placeholder="Telp Unit" name="telp_kantor" title="Masukan Telp Unit" required></td>
				</tr>
			</table>
			<br>
			<div>	
				<input type="submit" value="Masukan Data" class="btn" name="submit">
				<input type="submit" value="Close" class="btn" name="cancel" onclick="window.history.back();return false;">
			</div>
	</center>
</body>
</html>