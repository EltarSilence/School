<!DOCTYPE html>
<html>
<head>
	<title>Es 01 PHP</title>
</head>
<body>


<table border="1">
<tr><td colspan="3">
<?php 
//stampa la data corrente
echo Date('d/m/Y - h:i:s');
?>
</td></tr>
	<?php
		for ($i=1; $i<=15; $i++){
			//ripeto quindici volte la stampa delle righe
			echo '<tr><td>'.$i.'</td><td>'.($i*$i).'</td><td>'.($i*$i*$i).'</td></tr>';
		}
	?>
</table>


</body>
</html>

