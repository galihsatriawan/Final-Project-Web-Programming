<?php
	include '../../Controller/Database/database_handler.php';
	$x= select_data("tb_unit",array(),array(),array());
	include '../../Controller/Login/Handler.php';
	if(is_login()){
				
	}else{
		header("Location: ../Login/Login_page.php");
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../../Pictures/stiki.jpg">
	<title>List Unit</title>
</head>
<body>
	<table>
		<tr>
			<th>No</th>
			<th>Kode Unit</th>
			<th>Nama Unit</th>
			<th colspan="3">Action</th>
		</tr>
		<?php 
			
			for ($i=0; $i < count($x); $i++) { 
				echo "<tr>";
					echo "<td>".($i+1)."</td>";
					echo "<td>".$x[$i]['kode_unit']."</td>";
					echo "<td>".$x[$i]['nama_unit']."</td>";
					echo "<td>";
						if (condition) {
							# code...
						} else {
							# code...
						}
						
					echo "</td>";
				echo "</tr>";
			}
		 ?>
	</table>
</body>
</html>