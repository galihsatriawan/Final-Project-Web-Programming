<?php
	 $GLOBALS['conn'] = null;
	function pdo_connect(){

		$server = "localhost";
		$user = "gokil";
		$pass = "gokil";
		$dbname = "partnership_db";

		try {
			$conn = new PDO("mysql:host=$server;dbname=$dbname",$user,$pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			// echo("Success Connect");
		} catch (Exception $e) {
			// echo $e.getMessage();
			die("Connection failed :".$e.getMessage());
		}

		return $conn;
	}	
	// pdo_connect();
	// function get_data_with_one_param($conn,$tb_name,$param,$value){
	// 	$sql = "SELECT * FROM ".$tb_name." WHERE ".$param." = :".$param;
	// 	// echo "$sql";
	// 	try {
	// 		$prepare_query = $conn->prepare($sql);
	// 		//Bind
	// 		$prepare_query->bindValue(":".$param,$value);
	// 		//Eksekusi
	// 		$prepare_query->execute();
	// 		//Ambil semua
	// 		$hasil = $prepare_query->fetchAll();
	// 		// echo "Sukses juga";
	// 		print_r($hasil);
	// 	} catch (Exception $e) {
	// 		echo "gagal";
	// 		die("Get data failed :".$e.getMessage());	
	// 	}
	// 	return $hasil;
	// }
	/*
		Contoh Pemakaian
	 get_data_with_one_param(pdo_connect(),"tb_user","kode_user",1);

	*/

	/*
		Fungsi dibawah ini digunakan untuk SELECT data yang fleksibel	
	*/
		//get_data_with_more_params_several_field
	function select_data($tb_name,$fields,$params,$values){
		try{
			if($GLOBALS['conn']==null){
				$GLOBALS['conn'] = pdo_connect();
			}
			$conn=$GLOBALS['conn'];
			//jadikan field dalam bentuk string
			$str_fields= convert_field_to_str($fields);
			if(count($params)==0){
				$sql = "SELECT ".$str_fields." FROM ".$tb_name;
				$prepare_query = $conn->prepare($sql);
				$prepare_query->execute();

			}else{
				$str_params = convert_params_to_str($params);
				$sql = "SELECT ".$str_fields." FROM ".$tb_name." WHERE ".$str_params;
				
				$prepare_query = $conn->prepare($sql);
				//Binding
				for($i=0;$i<count($params);$i++){
					$prepare_query->bindValue(":".$params[$i],$values[$i]);	
				}
				$prepare_query->execute();
				
			}
			$hasil = $prepare_query->fetchAll();
		} catch (Exception $e) {
			echo $sql."<br>".$e.getMessage();		
		}
		return $hasil;
	}
	/*
	//Percobaan
	$contoh = get_data_with_more_params_several_field(pdo_connect(),"tb_user",array("nama_user","kode_user"),array("kode_user"),array(1));
	print_r($contoh);
	*/


	/*
		Fungsi dibawah ini digunakan untuk INSERT data yang fleksibel	
	*/
	// insert_data_with_several_field
	function insert_data($tb_name,$fields,$values){
		// INSERT INTO tb_jenis_institusi(kode_jenis_institusi,jenis_institusi) VALUES (1,"Perguruan Tinggi")
		//jadikan field dalam bentuk string
		try {
			if($GLOBALS['conn']==null){
				$GLOBALS['conn'] = pdo_connect();
			}
			$conn=$GLOBALS['conn'];
							
	 		$str_fields= convert_field_to_str($fields);
			$str_values = convert_values_to_str($values); 

			$sql = "INSERT INTO ".$tb_name."(".$str_fields.") VALUES (".$str_values.")";
			// echo "$sql";	
			$conn->exec($sql);// exec tanpa pengembalian
				
		} catch (Exception $e) {
			echo $sql."<br>".$e.getMessage();		
		}
	}
	// insert_data_with_several_field(pdo_connect(),"tb_user",array("kode_user","nama_user"),array(2,"admin"));

	/*
		Fungsi dibawah ini digunakan untuk UPDATE data yang fleksibel	
	*/
	// update_data_with_several_field_and_params
	function update_data($tb_name,$fields,$values_fields,$params,$values_params){

		try {
			if($GLOBALS['conn']==null){
				$GLOBALS['conn'] = pdo_connect();
			}
			$conn=$GLOBALS['conn'];
						
			// Params ---> nrp = :nrp				
	 		$str_params= convert_params_to_str($params);
			$str_fields = convert_params_to_str($fields); //format sama 

			$sql = "UPDATE ".$tb_name." SET ".$str_fields." WHERE ".$str_params;
			echo "$sql";	
			$prepare_query = $conn->prepare($sql);
			
			//binding fields
			for($i=0;$i<count($fields);$i++){
				$prepare_query->bindValue(":".$fields[$i],$values_fields[$i]);
			}
			//binding params
			for($i=0;$i<count($params);$i++){
				$prepare_query->bindValue(":".$params[$i],$values_params[$i]);
			}
			
			$prepare_query->execute();
				
		} catch (Exception $e) {
			echo $sql."<br>".$e.getMessage();		
		}
	}
	// update_data_with_several_field_and_params(pdo_connect(),"tb_user",array("nama_user"),array("mimin"),array("kode_user"),array("2"));

	/*
		Fungsi dibawah ini digunakan untuk DELETE data yang fleksibel	
	*/
	// delete_data_with_several_params
	function delete_data($conn,$tb_name,$params,$values){

		try {
			if($GLOBALS['conn']==null){
				$GLOBALS['conn'] = pdo_connect();
			}
			$conn=$GLOBALS['conn'];
						
			// Params ---> nrp = :nrp				

	 		$str_params= convert_params_to_str($params);
			 

			$sql = "DELETE FROM ".$tb_name." WHERE ".$str_params;
			// echo "$sql";	
			$prepare_query = $conn->prepare($sql);
			//binding
			for($i=0;$i<count($params);$i++){
				$prepare_query->bindValue(":".$params[$i],$values[$i]);
			}
			
			$prepare_query->execute();
				
		} catch (Exception $e) {
			echo $sql."<br>".$e.getMessage();		
		}
	}
	// delete_data_with_several_params(pdo_connect(),"tb_user",array("kode_user"),array("2"));



	/*
		fungsi ini digunakan untuk merubah array of field menjadi string (kode,nama, dsb)
	*/
	function convert_field_to_str($fields){
		$str ="";
		$banyak =count($fields);
		switch ($banyak) {
			//kalau seluruh field
			case 0:
				$str= '*';
				break;
			
			case 1:
				$str = $fields[0];
				break;
				//Kalau banyak field
			default :
				$str = $fields[0];
				for($i=1;$i<$banyak;$i++){
					$str = $str.",".$fields[$i];
				}
				break;

		}
		// kembalikan nilai str
		return $str;
	}

	/*
		fungsi ini digunakan untuk merubah array of field menjadi string (kode,nama, dsb)
	*/
	function convert_values_to_str($values){
		$str ="";
		// var_dump($values);
		$banyak =count($values);
		
		switch ($banyak) {
			
			case 1:
				$str = $values[0]===1?$values[0]:"'".$values[0]."'";

				break;
				//Kalau banyak values
			default :
				$str = (gettype($values[0])==gettype(1))?$values[0]:("'".$values[0]."'");
				// echo "$str";
				for($i=1;$i<$banyak;$i++){
					$str = $str.",".((gettype($values[$i])==gettype(1))?$values[$i]:"'".$values[$i]."'");
				}
				// echo "$str";
				break;

		}
		// kembalikan nilai str
		return $str;
	}
	/*
	percobaan untuk menghitung panjang array
	
	$test = array(1,2);
	echo count($test);
	*/
	/* Percobaan convert
		
	*/
	// echo convert_field_to_str(array("oke","hello","see"));

	/*
		fungsi ini digunakan untuk merubah array of params menjadi string (kode,nama, dsb)
	*/
	function convert_params_to_str($params){
		$str ="";
		$banyak =count($params);
		switch ($banyak) {
			//tidak mungkin params kosong menggunakan fungsi ini
			case 1:
				$str = $params[0]."=:".$params[0];
				break;
				//Kalau banyak field
			default :
				$str = $params[0]."=:".$params[0];
				for($i=1;$i<$banyak;$i++){
					$str = $str." AND ".$params[$i]."=:".$params[$i];
				}
				break;

		}
		// kembalikan nilai str
		return $str;
	}

	
	// echo convert_params_to_str(array("test","2"));
	function select_extra($tb_name,$fields,$params,$values,$add){
		try{
			if($GLOBALS['conn']==null){
				$GLOBALS['conn'] = pdo_connect();
			}
			$conn=$GLOBALS['conn'];
			//jadikan field dalam bentuk string
			$str_fields= convert_field_to_str($fields);
			if(count($params)==0){
				$sql = "SELECT ".$str_fields." FROM ".$tb_name." WHERE ".$add;
				// echo "$sql";
				$prepare_query = $conn->prepare($sql);
				$prepare_query->execute();

			}else{
				$str_params = convert_params_to_str($params);
				$sql = "SELECT ".$str_fields." FROM ".$tb_name." WHERE ".$str_params." AND ".$add;
				// echo "$sql";
				$prepare_query = $conn->prepare($sql);
				//Binding
				for($i=0;$i<count($params);$i++){
					$prepare_query->bindValue(":".$params[$i],$values[$i]);	
				}
				$prepare_query->execute();
				
			}
			// echo "$sql";
			$hasil = $prepare_query->fetchAll();
			// var_dump($hasil);
		} catch (Exception $e) {
			echo $sql."<br>".$e.getMessage();		
		}
		return $hasil;
	}
?>
