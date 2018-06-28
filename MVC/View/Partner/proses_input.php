<?php
	include '../database_handler.php';
	
		if (isset($_POST['submit'])){
			
			$kode_institusi	=htmlentities ($_POST['kode_institusi']);
			$nama_institusi	=htmlentities ($_POST['nama_institusi']);
			$jenis_institusi=htmlentities ($_POST['jenis_institusi']);
			$negara	 		=htmlentities ($_POST['negara']);
			$alamat_institusi=htmlentities ($_POST['alamat_institusi']);
			$email_institusi=htmlentities ($_POST['email_institusi']);
			$tlp_institusi	=htmlentities ($_POST['tlp_institusi']);
			$tanggal_dibuat	=htmlentities ($_POST['tanggal_dibuat']);

			
			mysql_query("SET FOREIGN_KEY_CHECKS=0;");
			$insert = mysql_query("INSERT INTO tb_partner (kode_institusi,nama_institusi,kode_jenis_institusi,negara,alamat_institusi,email_institusi,telp_institusi,is_aktif,tgl_dibuat,tgl_dimodifikasi)
				VALUES ('$kode_institusi','$nama_institusi','$jenis_institusi','$negara','$alamat_institusi','$email_institusi','$tlp_institusi','1','$tanggal_dibuat','') ");
			
			if($insert){
				header("Location: list_partner.php");
			}else{
				echo "sorry kak error ";
				echo $jenis_institusi;
				echo $kode_institusi;
				echo $nama_institusi;
				echo $negara;
				echo $alamat_institusi;
				echo $email_institusi;
				echo $email_institusi;
				echo $tlp_institusi;
				echo $tanggal_dibuat;
			}
		}
?>