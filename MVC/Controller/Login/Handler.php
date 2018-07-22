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
		print_r(select_data($tb_name,$fields,$params,$values));
		return select_data($tb_name,$fields,$params,$values);
		
			
	}
	 // get_user(array("nama_user"),array("kentang"));

	// is_login();

?>