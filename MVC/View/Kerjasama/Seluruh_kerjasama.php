
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include '../../Controller/Database/database_handler.php';
	?>

	<?php
		$field = array(); //all
		$params = array();
		$values = array(); 
		$addition = "tk.kode_institusi = tp.kode_institusi AND tk.kode_kerjasama = tbk.kode_kerjasama";
		$kerjasama = select_extra("tb_tr_kerjasama tk, tb_partner tp , tb_tr_bentuk_kerjasama tbk",$field,$params,$values,$addition);
		// var_dump($kerjasama);

	?>
	
</body>
</html>
