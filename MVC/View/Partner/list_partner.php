<?php
include '../../Controller/Database/database_handler.php';
?>	
	
<html>
	<head>
		<title>DAFTAR PARTNER</title>
	</head>
	<body>
		<a href="tambah.php">Tambah Partner</a>
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
					if ($x[$i]['is_aktif']=="YES") {
						echo "<a href=\"../../View/Kerjasama/list_kerjasama.php?id=".$x[$i]['kode_institusi']."&aksi=DK\">Data kerjasama</a>";
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
		</table>
	</body>
</html>
