<!DOCTYPE html>
<html>
<head>
	<title>Es 03 PHP</title>
</head>
<body>


<table border="1">
<h1>Tabella ASCII</h1>
	<?php
		for ($i=0; $i<=126; $i++){
			//ripeto 126 volte la stampa delle righe tirando fuori l'ascii
			echo '<tr><td>'.$i.'</td><td>&#'.$i.'</td></tr>';
		}
	?>
</table>


</body>
</html>
