<?php
	// include '../Database/database_handler.php';
	session_start();
	// Pengecheckan login

	function is_login(){
		$lol = True;
		if(isset($_SESSION['username'])){
			$lol =  True;
		}else{
			$lol =  False;
		}return $lol;
	}

	function get_user($params,$values){
		$tb_name= "tb_user";
		$fields = array();
		return select_data($tb_name,$fields,$params,$values);
		// print_r
			
	}
	 // get_user(array("nama_user"),array("kentang"));

	// is_login();

?>