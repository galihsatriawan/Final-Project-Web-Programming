<?php
include '../../Controller/Database/database_handler.php';
session_start();
$target_dir = "../../Files/";

	$mode = $_GET['aksi'];
	//data
	 $kode_kerjasama=$_GET['idKerja'];
	$jenis_doc = $_POST['doc'];
	$no_doc = $_POST['no_doc'];
	$deskrip = $_POST['deskripsi'];
	$kode_institusi = $_GET['id'];
	$nama_unit = $_POST['penandatangan'];
	$jabatan_unit = $_POST['jbt_penandatangan'];
	$nama_pj = $_POST['penanggung'];
	$jabatan_pj = $_POST['jbt_penanggung'];
	$email_pj = $_POST['email_penanggung'];
	$nama_part = $_POST['penandatangan_part'];
	$jabatan_part = $_POST['jbt_penandatangan_part'];
	$nama_pj_part = $_POST['penanggung_part'];
	$jabatan_pj_part = $_POST['jbt_penanggung_part'];
	$email_pj_part = $_POST['email_penanggung_part'];
	$periode = $_POST['periode'];
	$tgl_awal = $_POST['tgl_awal'];
	$tgl_akhir = empty($_POST['tgl_akhir'])?"2018-08-09":$_POST['tgl_akhir'];
	$dur_bulan = empty($_POST['dur_bulan'])?0:$_POST['dur_bulan'];
	$dur_minggu = empty($_POST['dur_minggu'])?0:$_POST['dur_minggu'];
	$dur_hari = empty($_POST['dur_hari'])?0:$_POST['dur_hari'];
	$status = $_POST['status'];
	$bentuk_kerja = $_POST['bentuk'];
	$is_aktif = "YES";
	$user = $_SESSION['user'];
	// echo "$periode";
	// echo "$jenis_doc";
	if($mode == "tambah"){
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
	$file_name =basename($_FILES["fileToUpload"]["name"]);
//echo basename($_FILES["fileToUpload"]["name"]);
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	$file = $file_name;
		$fields =array("kode_kerjasama","jenis_dokumen_kerjasama","no_dokumen","deskripsi_kerjasama","kode_institusi","nama_unit_ttd","jabatan_unit_ttd","nama_penanggung_jawab_unit","email_penanggung_jawab_unit","jabatan_penanggung_jawab_unit","nama_partner_ttd","jabatan_partner_ttd","nama_penanggung_jawab_partner","jabatan_penanggung_jawab_partner","email_penanggung_jawab_partner","periode_kerjasama","tgl_awal","tgl_akhir","durasi_bulan","durasi_minggu","durasi_hari","status_kerjasama","file_kerjasama","is_aktif","kode_user");
		$values = array($kode_kerjasama,$jenis_doc,$no_doc,$deskrip,$kode_institusi,$nama_unit,$jabatan_unit,$nama_pj,$jabatan_pj,$email_pj,$nama_part,$jabatan_part,$nama_pj_part,$jabatan_pj_part,$email_pj_part,$periode,$tgl_awal,$tgl_akhir,$dur_bulan,$dur_minggu,$dur_hari,$status,$file,$is_aktif,$user);
		
		insert_data("tb_tr_kerjasama",$fields,$values);
		foreach ($bentuk_kerja as $key ) {
			$kd_bentuk = $key;
			$kd_kerja = $kode_kerjasama;
			$fields = array("kode_bentuk_kerjasama","kode_kerjasama");
			insert_data("tb_tr_bentuk_kerjasama",$fields,array($kd_bentuk,$kd_kerja)); 
		}
	}else{
	
		$fields =array("kode_kerjasama","jenis_dokumen_kerjasama","no_dokumen","deskripsi_kerjasama","kode_institusi","nama_unit_ttd","jabatan_unit_ttd","nama_penanggung_jawab_unit","email_penanggung_jawab_unit","jabatan_penanggung_jawab_unit","nama_partner_ttd","jabatan_partner_ttd","nama_penanggung_jawab_partner","jabatan_penanggung_jawab_partner","email_penanggung_jawab_partner","periode_kerjasama","tgl_awal","tgl_akhir","durasi_bulan","durasi_minggu","durasi_hari","status_kerjasama","is_aktif","kode_user");
		$params = array("kode_kerjasama");
		$values_params = array($_GET['idKerja']);
		$values = array($kode_kerjasama,$jenis_doc,$no_doc,$deskrip,$kode_institusi,$nama_unit,$jabatan_unit,$nama_pj,$jabatan_pj,$email_pj,$nama_part,$jabatan_part,$nama_pj_part,$jabatan_pj_part,$email_pj_part,$periode,$tgl_awal,$tgl_akhir,$dur_bulan,$dur_minggu,$dur_hari,$status,$is_aktif,$user);
		update_data("tb_tr_kerjasama",$fields,$values,$params,$values_params);
		// delete_data();
		foreach ($bentuk_kerja as $key ) {
			$kd_bentuk = $key;
			$kd_kerja = $_GET['idKerja'];
			$fields = array("kode_bentuk_kerjasama","kode_kerjasama");
			insert_data("tb_tr_bentuk_kerjasama",$fields,array($kd_bentuk,$kd_kerja)); 
		}
	}
	header("Location: ../../View/Partner/list_partner.php");
?>