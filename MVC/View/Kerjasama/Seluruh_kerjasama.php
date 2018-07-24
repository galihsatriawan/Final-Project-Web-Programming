
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../../Pictures/stiki.jpg">
	<title>Seluruh Kerjasama</title>
	<style type="text/css">
		#cont_pencarian{
			background: rgb(255,255,0);
			margin: 10px;

		}
		.tbl_pencari{

		}
		#cont_field{
			background: rgb(255,100,100);
			padding: 10px;
		}
	</style>
</head>
<body>
	<?php
		// session_start();
		include '../../Controller/Kerjasama/seluruh_kerjasama_handler.php';
		include '../header.php';
		//var_dump($institusi);
		// var_dump($all_data);
		$data = $all_data;
//	echo "$test";
	?>
	<h1 align="center">
			SELURUH KERJASAMA
	
	</h1>

	<div id="cont_pencarian" align: center;>
		<h1 style="margin: 10px ">Pencarian</h1>
		<div id="cont_field" align="center">
			<form action="" method="GET">
				<table style="margin: 10px" class="tbl_pencari">
					<tr>
						<th>Nama Partner</th>	
						<th>Tahun Dokumen</th>
						<th>Negara</th>
					</tr>
					<tr>
						<td align="center" width="200"> <input type="text" name="partner" placeholder="Nama Partner" value="<?php $hasil = (isset($_GET['partner'])) ? $_GET['partner'] :"" ;echo $hasil;?>" ></td>
						<td align="center" width="200">
							<?php $i= (int)date("Y"); ?>
							<select name="thn" style ="width:150px" >
								<?php 
									$hasil = (isset($_GET['thn'])) ? $_GET['thn'] : $i;

								for($i=$i;$i>=2010;$i--){?>
								<option value="<?php echo $i?>" <?php $selected = ($i==$hasil)?"selected" : ""; echo "$selected";?>> <?php echo $i?></option>
								<?php }?>
							</select>
						</td>
						<td><input type="text" name="negara" placeholder="Negara" value="<?php $hasil = (isset($_GET['negara'])) ? $_GET['negara'] :"" ;echo $hasil;?>" ></td>
					</tr>
				</table>
				<table class="tbl_pencari" style="margin: 10px">
					<tr>
						<th>Jenis Dokumen</th>	
						<th>Jenis Partner Kerjasama</th>
						<th> Bentuk Kegiatan</th>
					</tr>
					<tr>
						<td width="200" align="center">
							<select name="doc"style="width:150px ">
								<?php $hasil = (isset($_GET['doc'])) ? $_GET['doc'] : "MoU";?>
								<option value="MoU" <?php if($hasil=="MoU") echo "selected";?>>MoU</option>
								<option value="MoA" <?php if($hasil=="MoA") echo "selected";?>>MoA</option>
							</select>
						</td>
						<td align="center" width="200">
							<select name="institusi"style ="width:150px">
								<?php 
									$hasil = (isset($_GET['institusi'])) ? $_GET['institusi'] : "";							
								foreach ($institusi as $inst){?>
								<option value="<?php echo $inst['jenis_institusi']?>" <?php $selected = ($inst['jenis_institusi']==$hasil)?"selected" : ""; echo "$selected";?>><?php echo $inst['jenis_institusi'];?></option>
								<?php }?>
							</select>
						</td>
						<td>

							<select name="bentuk_kerja" style ="width:175px">
								<?php 
							$hasil = (isset($_GET['bentuk_kerja'])) ? $_GET['bentuk_kerja'] : "";		
								foreach ($bentuk_kerja as $bentuk){?>
								<option value="<?php echo $bentuk['bentuk_kerjasama']?>" <?php $selected = ($bentuk['bentuk_kerjasama']==$hasil)?"selected" : ""; echo "$selected";?>><?php echo $bentuk['bentuk_kerjasama'];?></option>
								<?php }?>
							</select>	
						</td>
					</tr>
				</table>
				<center><button type="submit" style="width: 100px;">Cari</button></center>
			</form>
		</div>
	</div>
	<div id="cont_table_kerja" align="center">

	<table border="1" >
		<tr>
			<th>No</th>
			<th>No. Dokumen</th>
			<th>Jenis Dokumen</th>
			<th>Nama Institusi</th>
			<th width="200">Deskripsi Kerjasama</th>
			<th>Negara</th>
			<th width="200">Bentuk Kerjasama</th>
			<th>Tanggal Expiry</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>	
		<?php 
		$i=0;
			//print_r($all_data);
			foreach ($all_data as $data ) {
				//echo $data['no_dokumen']." ".$data['is_aktif'];
				if($data['is_aktif']=="YES"){	
			?>
		<tr>
			<td><?php echo ++$i; ?></td>
			<td><?php echo $data['no_dokumen']; ?></td>
			<td><?php echo $data['jenis_dokumen_kerjasama']; ?></td>
			<td><?php echo $data['nama_institusi']; ?></td>
			<td ><?php echo $data['deskripsi_kerjasama']; ?></td>
			<td ><?php echo $data['negara']; ?></td>
			<td ><?php echo $data['kode']; ?></td>
			<td ><?php echo $data['tgl_akhir']; ?></td>
			<td ><?php echo $data['status_kerjasama']; ?></td>
			<td>
				<a href="Detail_kerjasama_page.php<?php echo "?id=".$data['kode_kerjasama']?>"><button>Detail</button></a>
				<?php if($data['kode_user']==$_SESSION['user']){?>
					<a href="Kerjasama_page.php?idKerja=<?php echo $data['kode_kerjasama'] ?>&aksi=edit&id=<?php echo $data['kode_institusi'] ?>"><button>Edit</button></a>
					<a href="../../Controller/Kerjasama/delete_handler.php?id=<?php echo $data['kode_kerjasama'];?> "><button>Delete</button></a>
				<?php }?>
			</td>
		</tr>
		<?php }}?>
		
	</table>
	<table>
		<tr>
			<td colspan="10" align="center">
				<a href="../"><button>Back</button></a>
				<a href="../Partner/list_partner.php"><button style="margin: 10px">Tambah Kerjasama</button>	</a>
			</td>
		</tr>
	</table>
	<?php
		
	?>
	</div>
</body>
</html>
