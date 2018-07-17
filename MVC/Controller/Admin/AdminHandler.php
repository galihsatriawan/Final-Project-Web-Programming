<?php 
session_start();
function is_login(){
		$lol = True;
		if(isset($_SESSION['admin'])){
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

 ?>