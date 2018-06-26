<?php
	include '../Database/database_handler.php';
	session_start();
	// Pengecheckan login
	function is_login(){
		if(isset($_SESSION['username'])){
			header("Location: ../../View");
			return true;
		}else{
			return false;
		}

	}

	function get_user($params,$values){
		$tb_name= "tb_user";
		$fields = array();
		var_dump(select_data($tb_name,$fields,$params,$values));
			
	}
	 get_user(array("nama_user"),array("kentang"));

	// is_login();

?>