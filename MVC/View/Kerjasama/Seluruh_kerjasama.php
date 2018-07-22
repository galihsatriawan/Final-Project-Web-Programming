
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include '../../Controller/Kerjasama/seluruh_kerjasama_handler.php';
	?>
	<table>
		<?php for($i=0;$i<count($all_data);$i++){?>
		<tr>
			<td><?php echo $all_data[0]['no_dokumen']; ?></td>
			<td></td>
		</tr>
		<?php }?>
	</table>
	<?php
		
	?>
	
</body>
</html>
