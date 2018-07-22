<?php
	session_start();
	
	include '../../Controller/Database/database_handler.php';
	// header("Location: ../../Controller/Database/database_handler.php");
	// $GLOBALS['kode_kerjasama'] = $_GET['id'];
	// print_r($_SESSION['user']);
	// echo $GLOBALS['kode_kerjasama'];

// $qry = "Select * from tb_partner";
	
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
AND kr.kode_kerjasama = 'KR000001'
GROUP BY kr.kode_kerjasama";
// echo "$sql";
	$detail = query_biasa($sql); 
// print_r(query_biasa($sql));

	// $hasil = $query->fetchAll();
	// echo "$hasil";

?>