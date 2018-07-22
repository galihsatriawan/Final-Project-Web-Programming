<?php
	include '../../Controller/Database/database_handler.php';
	$id = $_GET['id'];
	$field = array("is_aktif");
	$values = array("NO");
	$params = array("kode_kerjasama");
	$v_params= array($id);
	update_data("tb_tr_kerjasama",$field,$values,$params,$v_params);

	header("Location: ../../View/Kerjasama/Seluruh_kerjasama.php");
?>