<?php
	include '../../Controller/Database/database_handler.php';
	$x = select_data("tb_jenis_institusi",array(),array(),array());
	$y = select_data("tb_partner",array(),array("kode_institusi"),array($_GET['id']));
	include '../../Controller/partner/list_negara.php';
?>
	
<html>
	<head>
		<title>DAFTAR PARTNER</title>
	</head>
	<body>
		<form action="../../Controller/partner/proses_edit.php" method="POST" name="partner" style="">
			<table style="border: 1px solid black; text-align: left;">
				<tr>
					<th>Kode Institusi</th>
					<td>:</td>
					<td><input type="text" value="<?php echo $y[0]['kode_institusi']; ?>" name="kode_institusi" title="Masukan kode Institusi" required readonly='ON'></td>
				</tr>
				<tr>
					<th>Nama Institusi</th>
					<td>:</td>
					<td><input type="text" value="<?php echo $y[0]['nama_institusi']; ?>"  name="nama_institusi" title="Masukan Nama Institusi" required></td>
				</tr>
				<tr>
					<th>Jenis Institusi</th>
					<td>:</td>
					<td>
						<select name="jenis_institusi" >
						    <?php 
						    	$select = "";
						    	for ($i=0; $i < sizeof($x); $i++) { 
						    		if($y[0]['kode_jenis_institusi'] == $x[$i]['kode_jenis_institusi']) {
						    			$select = "selected";
						    		} else {
						    			$select = "";
						    		}
						    		/*$x[$i]['jenis_institusi']*/
						    		echo "<option value='".$x[$i]['kode_jenis_institusi']."' ".$select.">".$x[$i]['jenis_institusi']."</option>";
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
								if($y[0]['negara'] == $key) {
						    			$select = "selected";
						    		} else {
						    			$select = "";
						    		}
							?>
								<option value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>" <?php echo $select ?>>
									<?= htmlspecialchars($value) ?>
								</option>
							<?php
								}

						    ?>
							
								
						</select>
					</td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td>:</td>
					<td><input type="text" value="<?php echo $y[0]['alamat_institusi']; ?>" name="alamat_institusi" title="Masukan alamat Institusi" required></td>
				</tr>
				<tr>
					<th>Email</th>
					<td>:</td>
					<td><input type="email" value="<?php echo $y[0]['email_institusi']; ?>" name="email_institusi" title="Masukan Email Institusi" required></td>
				</tr>
				<tr>
					<th>Tlp</th>
					<td>:</td>
					<td><input type="text" value="<?php echo $y[0]['telp_institusi']; ?>" name="tlp_institusi" title="Masukan No Telp Institusi" required></td>
				</tr>
			</table>
			<br>
			<div>	
				<input type="submit" value="Update Data" class="btn" name="submit">
				<input type="submit" value="Close" class="btn" name="cancel" onclick="window.history.back();return false;">
			</div>
		</form>
	</body>
</html>