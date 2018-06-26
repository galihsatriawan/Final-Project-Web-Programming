<?php
	/**
	 * 
	 */
	class Model 
	{	
		private $row = array();
		function __construct($data)
		{
			# code...
			$row = array($data);
		}
		public get_data($field){
			return $this->row[$field];
		}
		public get_datas(){
			return $this->row;
		}
	}
?>