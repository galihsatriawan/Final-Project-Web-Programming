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
					<td >Email</td>
					<td >:</td>
					<td ><?php echo $detail['email_institusi']; ?></td>
				</tr>
				<tr>
					<td >Telp Institusi</td>
					<td >:</td>
					<td ><?php echo $detail['telp_institusi']; ?></td>
				</tr>
				<tr>
					<td >Jenis Institusi</td>
					<td >:</td>
					<td ><?php echo $detail['jenis_institusi']; ?></td>
				</tr>
				<tr>
					<td >Negara</td>
					<td >:</td>
					<td ><?php echo $detail['negara']; ?></td>
				</tr>
				<tr>
					<td >Deskripsi Kerjasama</td>
					<td >:</td>
					<td ><?php echo $detail['deskripsi_kerjasama']; ?></td>
				</tr>
				<tr>
					<td >Tanggal Dibuat</td>
					<td >:</td>
					<td ><?php echo $detail['tgl_dibuat']; ?></td>
				</tr>

				<tr>
					<td colspan="3"><h4>Unit Pelaksana</h4></td>
				</tr>
				<tr>
					<td >Penandatangan</td>
					<td >:</td>
					<td ><?php echo $detail['nama_unit_ttd']; ?></td>
				</tr>
				<tr>
					<td >Jabatan Penandatangan</td>
					<td >:</td>
					<td ><?php echo $detail['jabatan_unit_ttd']; ?></td>
				</tr>
				<tr>
					<td >Penanggung Jawab</td>
					<td >:</td>
					<td ><?php echo $detail['nama_penanggung_jawab_unit']; ?></td>
				</tr>
				<tr>
					<td >Jabatan Penanggung Jawab</td>
					<td >:</td>
					<td ><?php echo $detail['jabatan_penanggung_jawab_unit']; ?></td>
				</tr>
				<tr>
					<td >Email Penanggung Jawab</td>
					<td >:</td>
					<td ><?php echo $detail['email_penanggung_jawab_unit']; ?></td>
				</tr>
				<tr>
					<td colspan="3"><h4>Partner</h4></td>
				</tr>	
				<tr>
					<td >Penandatangan</td>
					<td >:</td>
					<td ><?php echo $detail['nama_partner_ttd']; ?></td>
				</tr>
				<tr>
					<td >Jabatan Penandatangan</td>
					<td >:</td>
					<td ><?php echo $detail['jabatan_partner_ttd']; ?></td>
				</tr>
				<tr>
					<td >Penanggung Jawab</td>
					<td >:</td>
					<td ><?php echo $detail['nama_penanggung_jawab_partner']; ?></td>
				</tr>
				<tr>
					<td >Jabatan Penanggung Jawab</td>
					<td >:</td>
					<td ><?php echo $detail['jabatan_penanggung_jawab_partner']; ?></td>
				</tr>
				<tr>
					<td >Email Penanggung Jawab</td>
					<td >:</td>
					<td ><?php echo $detail['email_penanggung_jawab_partner']; ?></td>
				</tr>

				
				<?php if($detail['periode_kerjasama']=="Tanggal Awal & Akhir"){?>
					<tr>
						<td colspan="3"><h4>Periode Kerjasama <?php echo "(Tanggal Awal & Akhir)"?></h4></td>
					</tr>
					<tr>
						<td >Tanggal Awal</td>
						<td >:</td>
						<td ><?php echo $detail['tgl_awal']; ?></td>
					</tr>
					<tr>
						<td >Tanggal Akhir</td>
						<td >:</td>
						<td ><?php echo $detail['tgl_akhir']; ?></td>
					</tr>
				<?php }?>				
				<?php if($detail['periode_kerjasama']=="Durasi"){?>
					<tr>
						<td colspan="3"><h4>Periode Kerjasama <?php echo "(Durasi)"?></h4></td>
					</tr>
					<tr>
						<td >Tanggal Awal</td>
						<td >:</td>
						<td ><?php echo $detail['tgl_awal']; ?></td>
					</tr>
					<tr>
						<td >Durasi</td>
						<td >:</td>
						<td ><?php echo $detail['durasi_bulan']." bulan".$detail['durasi_minggu']." minggu".$detail['durasi_hari']." hari"; ?></td>
					</tr>
				<?php }?>	
				<?php if($detail['periode_kerjasama']=="Tak Terbatas"){?>
					<tr>
						<td colspan="3"><h4>Periode Kerjasama <?php echo "(Tak Terbatas)"?></h4></td>
					</tr>
					<tr>
						<td >Tanggal Awal</td>
						<td >:</td>
						<td ><?php echo $detail['tgl_awal']; ?></td>
					</tr>
				<?php }?>
				<tr>
					<td colspan="3"><h4>Pelengkap</h4></td>
				</tr>
				
				<tr>
					<td >Status Kerjasama</td>
					<td >:</td>
					<td ><?php echo $detail['status_kerjasama']; ?></td>
				</tr>

				<tr>
					<td >File Pendukung</td>
					<td >:</td>
					<td ><a href="/MVC/Files/<?php echo $detail['file_kerjasama']?>" download><button>Download</button></a></td>
				</tr>
			</table>
		</div>
	<br>		
			<center>
				<a href="Seluruh_kerjasama.php"> <button type="submit" name="back">Back</button> </a>
				<?php if($detail['kode_user']==$_SESSION['user']){?><a href="Kerjasama_page.php?idKerja=<?php echo $detail['kode_kerjasama']?>&aksi=edit"> <button type="submit" name="edit">Edit</button> </a><?php }?>
			</center>
		
</body>
</html>
