<?php
	include '../Database/database_handler.php';
	
		if (isset($_POST['submit'])){
			
			$kode_unit	= $_POST['kode_unit'];
			$nama_unit	= $_POST['nama_unit'];
			$email_unit	= $_POST['email_unit'];
			$telp_kantor	= $_POST['telp_kantor'];

			
			insert_data(
				"tb_unit", 
				array("kode_unit","nama_unit", "email_unit", "telp_kantor"),
				array($kode_unit, $nama_unit, $email_unit,$telp_kantor)
			);

			header("Location: ../../view/unit/list_unit.php");
			
		}
?>