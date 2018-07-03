<?php
	include '../Database/database_handler.php';
	
		if (isset($_POST['submit'])){
			
			$kode_institusi	= $_POST['kode_institusi'];
			$nama_institusi	= $_POST['nama_institusi'];
			$jenis_institusi= $_POST['jenis_institusi'];
			$negara	 		= $_POST['negara'];
			$alamat_institusi= $_POST['alamat_institusi'];
			$email_institusi= $_POST['email_institusi'];
			$telp_institusi	= $_POST['tlp_institusi'];
			$tgl_dimodifikasi = date("Y-m-d h:i:sa");

			
			update_data(
				"tb_partner", 
				array("alamat_institusi", "email_institusi", "is_aktif", "kode_jenis_institusi", "nama_institusi", "negara", "telp_institusi","tgl_dimodifikasi"),
				array($alamat_institusi,$email_institusi,"YES",$jenis_institusi,$nama_institusi,$negara,$telp_institusi,$tgl_dimodifikasi),
				array('kode_institusi'),
				array($kode_institusi)
			);

			header("Location: ../../view/partner/list_partner.php");
			
		}
?>