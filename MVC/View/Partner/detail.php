<?php
include '../../Controller/Database/database_handler.php';

?>	
	
<html>
	<head>
		<link rel="icon" href="../../Pictures/stiki.jpg">
		<title>DETAIL PARTNER</title>
	</head>
	<body>
		
		<center><img src="../../Pictures/stiki.jpg" width="100" height="100"></center>
		<h1 align="center">
			DETAIL PARTNER
		</h1>
<?php

	$x = select_extra("tb_partner p,tb_jenis_institusi ji",array(),array("kode_institusi"),array($_GET['id']),"p.kode_jenis_institusi=ji.kode_jenis_institusi"); ?>
		<center>
		<table style="border: 1px solid black; text-align: left;">
			<tr>
				<th>Kode Institusi</th>
				<td>:</td>
				<td><?php echo $x[0]['kode_institusi']; ?></td>
			</tr>
			<tr>
				<th>Nama Institusi</th>
				<td>:</td>
				<td><?php echo $x[0]['nama_institusi']; ?></td>
			</tr>
			<tr>
				<th>Jenis Institusi</th>
				<td>:</td>
				<td><?php echo $x[0]['jenis_institusi']; ?></td>
			</tr>
			<tr>
				<th>Negara</th>
				<td>:</td>
				<td><?php echo $x[0]['negara']; ?></td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td>:</td>
				<td><?php echo $x[0]['alamat_institusi']; ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td>:</td>
				<td><?php echo $x[0]['email_institusi']; ?></td>
			</tr>
			<tr>
				<th>Tlp</th>
				<td>:</td>
				<td><?php echo $x[0]['telp_institusi']; ?></td>
			</tr>
			<tr>
				<th>Tanggal Dibuat</th>
				<td>:</td>
				<td><?php echo $x[0]['tgl_dibuat']; ?></td>
			</tr>
			<tr>
				<th>Tanggal Dimodifikasi</th>
				<td>:</td>
				<td><?php echo $x[0]['tgl_dimodifikasi']; ?></td>
			</tr>
		</table>
		<br>
		<table width="350">
			<tr>
				<td>
					<a href="list_partner.php">Back</a>
				</td>
				<td align="right">
					 <?php 
					 echo "<a href=\"edit.php?id=".$x[0]['kode_institusi']."&aksi=edit\">Edit</a>";
					 ?>
				</td>
			</tr>

		</table>
		</center>
	</body>
</html>