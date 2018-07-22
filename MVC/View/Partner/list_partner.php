<?php
	include '../../Controller/Database/database_handler.php';
	include '../../Controller/Login/Handler.php';
	if(is_login()){
				
	}else{
		header("Location: ../Login/Login_page.php");
	}
?>	
	
<html>
	<head>
		<link rel="icon" href="../../Pictures/stiki.jpg">
		<title>DAFTAR PARTNER</title>
	</head>
	<body>

		<center><img src="../../Pictures/stiki.jpg" width="100" height="100"></center>
		<h1 align="center">
			DAFTAR PARTNER
		</h1>
		<center>
			<form action="tambah.php">
			<button type="submit" value="Submit">Tambah Partner</button>
			</form>
		<table style="border: 1px solid black">
			<tr>
				<th>NO</th>
				<th>Kode Institusi</th>
				<th>Nama Institusi</th>
				<th colspan="3">Action</th>
			</tr>
			<?php $no=0;
			$x= select_data("tb_partner",array(),array(),array());
			for ($i=0 ; $i < count($x) ; $i++) { 
				echo "<tr>";				
					echo "<td>".++$no."</td>";
					echo "<td>".$x[$i]['kode_institusi']."</td>";
					echo "<td>".$x[$i]['nama_institusi']."</td>";
					echo "<td>";
					if ($x[$i]['is_aktif']=="YES") {
						echo"<a href=\"detail.php?id=".$x[$i]['kode_institusi']."&aksi=detail\">Detail</a>";
					}
					
					echo "</td><td>";
					// if ($x[$i]['is_aktif']=="YES") {
					// 	echo "<a href=\"../../View/Kerjasama/List_kerjasama_page.php?id=".$x[$i]['kode_institusi']."&aksi=DK\">List kerjasama</a>";
					// }
						echo "<a href=\"../../View/Kerjasama/List_kerjasama_page.php?id=".$x[$i]['kode_institusi']."&aksi=DK\">List kerjasama</a>";
					echo "</td><td>";
					if ($x[$i]['is_aktif']=="YES") {
						echo "<a href=\"../../View/Kerjasama/Kerjasama_page.php?id=".$x[$i]['kode_institusi']."&aksi=BK\">Buat kerjasama</a>";
					}
					echo "</td><td>";

					if ($x[$i]['is_aktif']=="YES") {
						echo "<a href=\"../../Controller/Partner/disable.php?id=".$x[$i]['kode_institusi']."&aksi=disable\">Disable</a>";
					}else{
						echo "<a href=\"../../Controller/Partner/active.php?id=".$x[$i]['kode_institusi']."&aksi=anable\">Active</a>";
					}			
								
					echo "</td>";
				echo "</tr>";			
			}
				
			?>
		</table><br>
			<form action="../">
				<button type="submit" value="Submit">Home</button>
			</form>
		</center>
	</body>
</html>
