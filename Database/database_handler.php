<?php
	function pdo_connect(){

		$server = "localhost";
		$user = "gokil";
		$pass = "gokil";
		$dbname = "partnership_db";

		try {
			$conn = new PDO("mysql:host=$server;dbname=$dbname",$user,$pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			echo("Success Connect");
		} catch (Exception $e) {
			// echo $e.getMessage();
			die("Connection failed :".$e.getMessage());
		}

		return $conn;
	}	
	// pdo_connect();
?>