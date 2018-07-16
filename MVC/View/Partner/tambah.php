<?php
	include '../../Controller/Database/database_handler.php';
	$x = select_data("tb_jenis_institusi",array(),array(),array());
	include '../../Controller/partner/list_negara.php';
?>
	
<html>
	<head>
		<link rel="icon" href="../../Pictures/stiki.jpg">
		<title>PARTNER</title>
	</head>
	<body>
		
		<?php  
			include '../../Controller/Login/Handler.php';
			if(is_login()){
				
			}else{
				header("Location: ../Login/Login_page.php");
			}
		?>
		<center><img src="../../Pictures/stiki.jpg" width="100" height="100"></center>
		<h1 align="center">
			PARTNER
		</h1><center>
		<form action="../../Controller/partner/proses_input.php" method="POST" name="partner" style="">
			<table style="border: 1px solid black; text-align: left;">
				<tr>
					<th>Kode Institusi</th>
					<td>:</td>
					<td><input type="text" placeholder="Kode Institusi" name="kode_institusi" title="Masukan kode Institusi" required></td>
				</tr>
				<tr>
					<th>Nama Institusi</th>
					<td>:</td>
					<td><input type="text" placeholder="Nama Institusi" name="nama_institusi" title="Masukan Nama Institusi" required></td>
				</tr>
				<tr>
					<th>Jenis Institusi</th>
					<td>:</td>
					<td>
						<select name="jenis_institusi">
						    <?php 

						    	for ($i=0; $i < sizeof($x); $i++) { 
						    		echo "<option value=\"".$x[$i]['kode_jenis_institusi']."\" >".$x[$i]['jenis_institusi']."</option>";
						    	}

						    ?>
							
								
						</select>
					</td>
				</tr>
				<tr>
					<th>Negara</th>
					<td>:</td>
					<td>
						<select name="negara">
						    <?php 
								foreach($countries as $key => $value) {
							?>
								<option value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
							<?php
								}

						    ?>
							
								
						</select>
					</td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td>:</td>
					<td><input type="text" placeholder="Alamat Institusi" name="alamat_institusi" title="Masukan alamat Institusi" required></td>
				</tr>
				<tr>
					<th>Email</th>
					<td>:</td>
					<td><input type="email" placeholder="Email Institusi" name="email_institusi" title="Masukan Email Institusi" required></td>
				</tr>
				<tr>
					<th>Tlp</th>
					<td>:</td>
					<td><input type="text" placeholder="Telp Institusi" name="tlp_institusi" title="Masukan No Telp Institusi" required></td>
				</tr>
			</table>
			<br>
			<div>	
				<input type="submit" value="Masukan Data" class="btn" name="submit">
				<input type="submit" value="Close" class="btn" name="cancel" onclick="window.history.back();return false;">
			</div>
		</form>
	</center>
	</body>
</html>