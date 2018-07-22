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
		<center>

			<img src="../../Pictures/stiki.jpg" width="100" height="100">
			<h1 align="center">
				DAFTAR UNIT KERJA
			</h1>
			<form action="tambah_unit.php">
			<button type="submit" value="Submit">Tambah Unit</button>
			</form>
			<table style="border: 1px solid black">
				<tr>
					<th>No</th>
					<th>Kode Unit</th>
					<th>Nama Unit</th>
					<td align="center" colspan="2">Action</td>
				</tr>
				<?php 
					for ($i=0; $i < count($x); $i++) { 
						echo "<tr>";
							echo "<td>".($i+1)."</td>";
							echo "<td>".$x[$i]['kode_unit']."</td>";
							echo "<td>".$x[$i]['nama_unit']."</td>";
							echo "<td>";
							echo "<a href=\"../../View/Unit/detail_unit.php?id=".$x[$i]['kode_unit']."&aksi=BK\">Detail Unit</a>";
								
							echo "</td>";
							echo "<td>";
								echo "<a href=\"../../View/Unit/edit_unit.php?id=".$x[$i]['kode_unit']."&aksi=BK\">Edit Unit</a>";
							echo "</td>";
						echo "</tr>";
					}
				 ?>
			</table>
			<form action="../">
				<button type="submit" value="Submit">Home</button>
			</form>
		</center>
	</body>
</html>