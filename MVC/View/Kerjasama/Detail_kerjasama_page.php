<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../../Pictures/stiki.jpg">
	<title>Detail Kerjasama</title>
</head>
<body>
	<?php
		include '../../Controller/Kerjasama/detail_kerjasama_handler.php';
	?>
	<center><img src="../../Pictures/stiki.jpg" width="100" height="100"></center>
		<h1 align="center">
			DETAIL KERJASAMA
		</h1>
		<div id="cont_detail" align="center">
			<table>
				<tr>
					<td >No. Dokumen</td>
					<td >:</td>
					<td ><?php echo $detail['no_dokumen']; ?></td>
				</tr>
				<tr>
					<td >Jenis Dokumen</td>
					<td >:</td>
					<td ><?php echo $detail['jenis_dokumen_kerjasama']; ?></td>
				</tr>
				<tr>
					<td>Nama Institusi</td>
					<td>:</td>
					<td><?php echo $detail['nama_institusi']; ?></td>
				</tr>
				<tr>
					<td >Jenis Institusi</td>
					<td >:</td>
					<td ><?php echo $detail['jenis_institusi']; ?></td>
				</tr>
				<tr>
					<td >Deskripsi Kerjasama</td>
					<td >:</td>
					<td ><?php echo $detail['deskripsi_kerjasama']; ?></td>
				</tr>
				<tr>
					<td >Deskripsi Kerjasama</td>
					<td >:</td>
					<td ><?php echo $detail['deskripsi_kerjasama']; ?></td>
				</tr>

			</table>
		</div>
		
			<center>
				<a href="Seluruh_kerjasama.php"> <button type="submit" name="back">Back</button> </a>
				<a href="Kerjasama_page.php"> <button type="submit" name="edit">Edit</button> </a>
			</center>
		
</body>
</html>
