<?php
	session_start();
	
	include '../../Controller/Database/database_handler.php';
	
	$sql ="SELECT
	 kr.*,pt.*,GROUP_CONCAT(
		bk.bentuk_kerjasama SEPARATOR ','
	) AS kode
FROM
	tb_tr_kerjasama kr,
	tb_partner pt,
	tb_tr_bentuk_kerjasama trbk,
	tb_bentuk_kerjasama bk
WHERE
	kr.kode_institusi = pt.kode_institusi
AND trbk.kode_kerjasama = kr.kode_kerjasama
AND trbk.kode_bentuk_kerjasama = bk.kode_bentuk_kerjasama

GROUP BY kr.kode_kerjasama";
// echo "$sql";
	
//print_r(query_biasa($sql));
if(!isset($_GET['thn'])){
	$all_data = query_biasa($sql);
}else{
	$thn = $_GET['thn'];
	$partner = $_GET['partner'];
	$negara = $_GET['negara'];
	$doc = $_GET['doc'];
	$inst = $_GET['institusi'];
	$bentuk = $_GET['bentuk_kerja'];
	$sql ="SELECT
	 kr.*,`pt`.*,GROUP_CONCAT(
		bk.bentuk_kerjasama SEPARATOR ','
	) AS kode
FROM
	tb_tr_kerjasama kr,
	tb_partner pt,
	tb_tr_bentuk_kerjasama trbk,
	tb_bentuk_kerjasama bk,
	tb_jenis_institusi jn
WHERE
	kr.kode_institusi = pt.kode_institusi
AND trbk.kode_kerjasama = kr.kode_kerjasama
AND trbk.kode_bentuk_kerjasama = bk.kode_bentuk_kerjasama
AND jn.kode_jenis_institusi = pt.kode_jenis_institusi
AND YEAR(kr.tgl_awal) = \"2018\"
AND pt.nama_institusi LIKE \"%$partner%\"
AND  jn.jenis_institusi LIKE \"%$inst%\"
AND bk.bentuk_kerjasama LIKE \"%$bentuk%\"
AND pt.negara LIKE \"%$negara%\"
AND kr.jenis_dokumen_kerjasama LIKE \"%$doc%\"

GROUP BY kr.kode_kerjasama";
	// $test = $sql;
	$all_data = query_biasa($sql);
}
	$institusi = select_data("tb_jenis_institusi",array(),array(),array());
	$bentuk_kerja = select_data("tb_bentuk_kerjasama",array(),array(),array());
?>