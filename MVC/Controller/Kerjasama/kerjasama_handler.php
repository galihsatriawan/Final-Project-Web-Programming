<?php
	session_start();
include '../../Controller/Database/database_handler.php';	
	// print_r($_SESSION['user']);
	// echo $GLOBALS['kode_institusi'];
	$mode = $_GET['aksi'];
	// echo "$mode";
	if($mode=="tambah"){
		$GLOBALS['kode_institusi']= $_GET['id'];
		$fields = array("nama_unit");
		$params = array("kode_unit");
		$values = array($_SESSION['unit']);
		$unit = select_data("tb_unit",$fields,$params,$values);
		$unit = $unit[0]['nama_unit'];
		
		// var_dump($unit);
		$fields = array("nama_institusi");
		$params = array("kode_institusi");
		$values = array($GLOBALS['kode_institusi']);

		$hasil = select_data("tb_partner",$fields,$params,$values);
		$nama_institusi = $hasil[0]['nama_institusi'];
		// echo "$nama_institusi";
		$id_kerja = generate_id($GLOBALS['kode_institusi']);

	}
	else{
		$id_kerja = $_GET['idKerja'];
			$sql ="SELECT
			 kr.*,pt.*,jn.*,un.*,us.*,GROUP_CONCAT(
				bk.bentuk_kerjasama SEPARATOR ','
			) AS kode
		FROM
			tb_tr_kerjasama kr,
			tb_partner pt,
			tb_tr_bentuk_kerjasama trbk,
			tb_bentuk_kerjasama bk,
			tb_jenis_institusi jn,
			tb_unit un,
			tb_user us
		WHERE
			kr.kode_institusi = pt.kode_institusi
		AND trbk.kode_kerjasama = kr.kode_kerjasama
		AND trbk.kode_bentuk_kerjasama = bk.kode_bentuk_kerjasama
		AND jn.kode_jenis_institusi = pt.kode_jenis_institusi
		AND kr.kode_user = us.kode_user
		AND un.kode_unit = us.kode_unit 
		AND kr.kode_kerjasama = '".$id_kerja."'
		GROUP BY kr.kode_kerjasama";	
		$edit = query_biasa($sql); 
		$edit = $edit[0];
	}

	
	function generate_id($kode_inst){
		$fields = array("negara");
		$params = array("kode_institusi");
		$values = array($kode_inst);
		$negara = select_data("tb_partner",$fields,$params,$values);
		// print_r($negara);
		$kode = strtoupper($negara[0]['negara']);
		$kode = substr($kode,0,4).get_date();

		return $kode;
	}
	// echo generate_id("KORE001");
	function get_date(){
		$str = date("ymdhi");
		return $str;
	}
	//echo get_date();
	function hitung_panjang($bil){
		$i = 0;
		while($bil>0){
			$i++;
			$bil/=10;
		}
		return $i;
	}
	function contains($str, $sub){
		// echo strpos($str, $sub);
		// var_dump(strpos($str, $sub));
		return (strpos($str, $sub)!==false);
	}
?>