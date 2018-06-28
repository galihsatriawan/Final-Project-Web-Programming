<?php
	include '../../Controller/Database/database_handler.php';
	$x = select_data("tb_jenis_institusi",array(),array(),array());
?>
	
<html>
	<head>
		<title>DAFTAR PARTNER</title>
	</head>
	<body>
		<form action="proses_input.php" method="POST" name="partner" style="">
			<table style="border: 1px solid black; text-align: left;">
				<tr>
					<th>Kode Institusi</th>
					<td>:</td>
					<td><input type="text" placeholder="Kode Institusi" name="kode_institusi" title="Masukan kode Institusi" required></td>
				</tr>
				<tr>
					<th>Nama Institusi</th>
					<td>:</td>
					<td><input type="text" placeholder="Nama Institusi" name="nama_institusi" title="Masukan Nama Institusi" required></td>
				</tr>
				<tr>
					<th>Jenis Institusi</th>
					<td>:</td>
					<td>
						<select name="jenis_institusi" title="Pilih Nama unit" id="unit">
						    <?php
								foreach($konek->select_jenis() as $x){
							?>
							<option value="<?php echo $x['kode_jenis_institusi'];?>" ><?php echo $x['jenis_institusi'];  ?></option>
								<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Negara</th>
					<td>:</td>
					<td><input type="text" placeholder="Negara" name="negara" title="Masukan Negara" required></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td>:</td>
					<td><input type="text" placeholder="Alamat Institusi" name="alamat_institusi" title="Masukan alamat Institusi" required></td>
				</tr>
				<tr>
					<th>Email</th>
					<td>:</td>
					<td><input type="email" placeholder="Email Institusi" name="email_institusi" title="Masukan Email Institusi" required></td>
				</tr>
				<tr>
					<th>Tlp</th>
					<td>:</td>
					<td><input type="text" placeholder="Telp Institusi" name="tlp_institusi" title="Masukan No Telp Institusi" required></td>
				</tr>
				<tr>
					<th>Tanggal Dibuat</th>
					<td>:</td>
					<td><input type="date" name="tanggal_dibuat" title="Masukan tanggal dibuat" required></td>
				</tr>
			</table>
			<div>	
				<input type="submit" value="Masukan Data" class="btn" name="submit">
				<input type="submit" value="Close" class="btn" name="cancel" onclick="window.history.back();return false;">
			</div>
		</form>
	</body>
</html>