<?php 
include '../../Controller/Database/database_handler.php';
$id = $_GET['id'];
update_data("tb_partner",array("is_aktif"),array("NO"),array("kode_institusi"),array($id));
header('Location: ../../View/Partner/list_partner.php');
?>