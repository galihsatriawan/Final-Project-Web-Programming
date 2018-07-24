<?php
function contains($str, $sub){
		echo strpos($str, $sub);
		var_dump(strpos($str, $sub));
	}
	contains("halo guys","guys");
	contains("halo guys","geys");

	function sip($str, $sub){
		// echo strpos($str, $sub);
		// var_dump(strpos($str, $sub));
		return (strpos($str, $sub)!==false);
	}
	
	var_dump(sip("halo guys","guys"));
	var_dump(sip("halo guys","geys"));
?>