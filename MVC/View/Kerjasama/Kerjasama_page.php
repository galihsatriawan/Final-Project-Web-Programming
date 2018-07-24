<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../../Pictures/stiki.jpg">
	<title>Kerjasama</title>
</head>
<body>
	<?php

		
		include '../../Controller/Kerjasama/kerjasama_handler.php';
	?>
	<center><img src="../../Pictures/stiki.jpg" width="100" height="100"></center>
		<h1 align="center">
			KERJASAMA
		</h1>
		<div id="cont_detail" align="center">
			<form action="../../Controller/Kerjasama/update_kerjasama_handler.php?aksi=<?php echo $mode?>&id=<?php if($mode=="tambah"){
					echo $GLOBALS['kode_institusi']."&idKerja=".$id_kerja;}else{ echo $edit['kode_institusi']."&idKerja=".$edit['kode_kerjasama'];} ?> " method="POST" enctype="multipart/form-data" id="form_kerja">
			<table>
				<td colspan="3"><h4>Data Pelaksana</h4></td>				
				<tr>
					<td >Pelaksana Kerjasama</td>
					<td >:</td>
					<td><input type="text" name="unit" value="<?php $hasil = (isset($edit)) ? $edit['nama_unit'] : "$unit"; echo $hasil?>"disabled></td>
					
					
				</tr>
				<tr>
					<td >Jenis Dokumen</td>
					<td >:</td>
					<td >
						<select name="doc"style="width:150px ">
							<?php $hasil = (isset($edit)) ? $edit['jenis_dokumen_kerjasama'] : "MoU";?>
							<option value="MoU" <?php if($hasil=="MoU") echo "selected";?>>MoU</option>
							<option value="MoA" <?php if($hasil=="MoA") echo "selected";?>>MoA</option>
						</select>
					</td>
				
					
				</tr>
				<tr>
					<td >No. Dokumen</td>
					<td >:</td>
					<td><input type="text" name="no_doc" value="<?php $hasil = (isset($edit)) ? $edit['no_dokumen'] : ""; echo $hasil?>" placeholder="Isikan No. Dokumen"></td>
					
				</tr>
				<tr>
					<td >Deskripsi Kerjasama</td>
					<td >:</td>
					<td><textarea name="deskripsi"  placeholder="Isikan Deskripsi Kerjasama"><?php $hasil = (isset($edit)) ? $edit['deskripsi_kerjasama'] : ""; echo $hasil?></textarea></td>
					
				</tr>
				<td colspan="3"><h4>Detail Partner Kerjasama</h4></td>				
				<tr>
					<td>Nama Partner Kerjasama</td>
					<td>:</td>
					<td><input type="text" name="nama_partner" value="<?php $hasil = (isset($edit)) ? $edit['nama_institusi'] : "$nama_institusi"; echo $hasil?>" disabled ></td>
				</tr>
				<tr>
					<td colspan="3"><h4>Bentuk Kerjasama</h4></td>
				</tr>
				<tr>
					<td><input type="checkbox" name="bentuk[]" value="DD" <?php 
						echo isset($edit) && contains($edit['kode'],"Double Degree") ?"checked":"";
						?>>Double Degree</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="bentuk[]" value="PB" <?php if(isset($edit)){
							if(contains($edit['kode'],"Penelitian Bersama")) {
								echo "checked";
							}
							}?>> Penelitian Bersama</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="bentuk[]" value="PM" <?php if(isset($edit)){
							if(contains($edit['kode'],"Pemagangan")) {
								echo "checked";
							}
							}?>> Pemagangan</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="bentuk" value="ST" <?php if(isset($edit)){
							if(contains($edit['kode'],"Student Exchange")) {
								echo "checked";
							}
							}?>> Student Exchange</td>
				</tr>
				
				<tr>
					<td colspan="3"><h4>Unit Pelaksana</h4></td>
				</tr>
				<tr>
					<td >Penandatangan</td>
					<td >:</td>
					<td><input type="text" name="penandatangan" value="<?php $hasil = (isset($edit)) ? $edit['nama_unit_ttd'] : ""; echo $hasil?>" placeholder="Masukkan nama penandatangan"></td>
					
				</tr>
				<tr>
					<td >Jabatan Penandatangan</td>
					<td >:</td>
					<td><input type="text" name="jbt_penandatangan" value="<?php $hasil = (isset($edit)) ? $edit['jabatan_unit_ttd'] : ""; echo $hasil?>" placeholder="Masukkan jabatan penandatangan"></td>
					
				</tr>
				<tr>
					<td >Penanggung Jawab</td>
					<td >:</td>
					<td><input type="text" name="penanggung" value="<?php $hasil = (isset($edit)) ? $edit['nama_penanggung_jawab_unit'] : ""; echo $hasil?>" placeholder="Masukkan nama penanggung"></td>

				</tr>
				<tr>
					<td >Jabatan Penanggung Jawab</td>
					<td >:</td>
					<td><input type="text" name="jbt_penanggung" value="<?php $hasil = (isset($edit)) ? $edit['jabatan_penanggung_jawab_unit'] : ""; echo $hasil?>" placeholder="Masukkan jabatan penanggung"></td>					
					
				</tr>
				<tr>
					<td >Email Penanggung Jawab</td>
					<td >:</td>
					<td><input type="text" name="email_penanggung" value="<?php $hasil = (isset($edit)) ? $edit['email_penanggung_jawab_unit'] : ""; echo $hasil?>" placeholder="Masukkan email penanggung"></td>				
				</tr>
				<tr>
					<td colspan="3"><h4>Partner</h4></td>
				</tr>	
				<tr>
					<td >Penandatangan</td>
					<td >:</td>
					<td><input type="text" name="penandatangan_part" value="<?php $hasil = (isset($edit)) ? $edit['nama_partner_ttd'] : ""; echo $hasil?>" placeholder="Masukkan nama penandatangan"></td>
					
				</tr>
				<tr>
					<td >Jabatan Penandatangan</td>
					<td >:</td>
					<td><input type="text" name="jbt_penandatangan_part" value="<?php $hasil = (isset($edit)) ? $edit['jabatan_partner_ttd'] : ""; echo $hasil?>" placeholder="Masukkan jabatan penandatangan"></td>
					
				</tr>
				<tr>
					<td >Penanggung Jawab</td>
					<td >:</td>
					<td><input type="text" name="penanggung_part" value="<?php $hasil = (isset($edit)) ? $edit['nama_penanggung_jawab_partner'] : ""; echo $hasil?>" placeholder="Masukkan nama penanggung"></td>

				</tr>
				<tr>
					<td >Jabatan Penanggung Jawab</td>
					<td >:</td>
					<td><input type="text" name="jbt_penanggung_part" value="<?php $hasil = (isset($edit)) ? $edit['jabatan_penanggung_jawab_partner'] : ""; echo $hasil?>" placeholder="Masukkan jabatan penanggung"></td>					
					
				</tr>
				<tr>
					<td >Email Penanggung Jawab</td>
					<td >:</td>
					<td><input type="text" name="email_penanggung_part" value="<?php $hasil = (isset($edit)) ? $edit['email_penanggung_jawab_partner'] : ""; echo $hasil?>" placeholder="Masukkan email penanggung"></td>				
				</tr>
				
				<tr>
					<td colspan="3"><h4>Periode Kerjasama</h4></td>
				</tr>
				<tr>
					
					<td><input type="radio" name="periode" value="Durasi" <?php if(isset($edit)){
							if(contains($edit['periode_kerjasama'],"Durasi")) {
								echo "checked";
							}
							}?>>Berdasarkan Durasi</td>
					<td colspan="2"><input type="radio" name="periode" value="Tanggal Awal & Akhir" <?php if(isset($edit)){
							if(contains($edit['periode_kerjasama'],"Tanggal Awal & Akhir")) {
								echo "checked";
							}
							}?>> Berdasarkan Tanggal awal dan akhir</td>
					<td><input type="radio" name="periode" value="Tak Terbatas" <?php if(isset($edit)){
							if(contains($edit['periode_kerjasama'],"Tak Terbatas")) {
								echo "checked";
							}
							}?>>Tidak dibatasi</td>
				</tr>
				<tr>
					<td><strong style="font-size: 12px">Tanggal Awal</strong><br><input type="date" name="tgl_awal" value="<?php $hasil = (isset($edit)) ? $edit['tgl_awal'] : ""; echo $hasil?>"></td>
					<td colspan="2"><strong style="font-size: 12px">Tanggal Awal</strong><br><input type="date" name="tgl_awal" value="<?php $hasil = (isset($edit)) ? $edit['tgl_awal'] : ""; echo $hasil?>"></td>
					<td><strong style="font-size: 12px"></strong><br><input type="date" name="tgl_awal" value="<?php $hasil = (isset($edit)) ? $edit['tgl_awal'] : ""; echo $hasil?>"></td>
				</tr>
				<tr>
					<td><strong style="font-size: 12px">Bulan</strong><br><input type="number" name="dur_bulan" value="<?php $hasil = (isset($edit)) ? $edit['durasi_bulan'] : ""; echo $hasil?>"></td>
					<td colspan="2"><strong style="font-size: 12px">Tanggal Akhir</strong><br><input type="date" name="tgl_akhir" value="<?php $hasil = (isset($edit)) ? $edit['tgl_akhir'] : ""; echo $hasil?>"></td>
					<td width="200">Keterangan: pilih jika periode bealum ditentukan atau kerjasama diakhiri berdasarkan kesepakatan bersama antara perguruan tinggi dan partner</td>
				</tr>
				<tr>
					<td><strong style="font-size: 12px">Minggu</strong><br><input type="number" name="dur_minggu" value="<?php $hasil = (isset($edit)) ? $edit['durasi_minggu'] : ""; echo $hasil?>"></td>
				</tr>
				<tr>
					<td><strong style="font-size: 12px">Hari</strong><br><input type="number" name="dur_hari" value="<?php $hasil = (isset($edit)) ? $edit['durasi_hari'] : ""; echo $hasil?>"></td>
				</tr>
				<tr>
					<td colspan="3"><h4>Pelengkap</h4></td>
				</tr>
				
				<tr>
					<td >Status Kerjasama</td>
					<td >:</td>
					<td><select name="status"style="width:150px ">
							<?php $hasil = (isset($edit)) ? $edit['status_kerjasama'] : "Aktfi";?>
							<option value="Aktif" <?php if($hasil=="Aktif") echo "selected";?>>Aktif</option>
							<option value="Kadaluarsa" <?php if($hasil=="Kadaluarsa") echo "selected";?>>Kadaluarsa</option>
						</select></td>
				</tr>

				<tr>
					<td >File Pendukung</td>
					<td >:</td>
					<?php if(isset($edit)){?><td><a href="/MVC/Files/<?php echo $edit['file_kerjasama']?>" download><button type="button">Download</button></a></td>
					<?php }else{?>
						 <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
					<?php }?>
				</tr>
			</table>
	</form>	
		</div>
	<br>		
			<center>
				<a href="Seluruh_kerjasama.php"> <button type="button" name="back">Back</button> </a>
				<a > <button type="submit" name="simpan" form="form_kerja">Simpan</button> </a>
			</center>
	
</body>
</html>
