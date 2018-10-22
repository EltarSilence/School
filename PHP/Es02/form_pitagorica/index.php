<!DOCTYPE html>
<html>
<head>
	<title>Tabella pitagorica</title>
</head>
<body>

	<form method="POST" action="" name="form1">
	<table border="1">
		<tr>
			<td>Valore N</td>
		</tr>
		<tr>
			<td><input type="text" name="n"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Genera Tabella"></td>
		</tr>

	</table>

	</form>

<?php
if (isset($_POST['n'])) {
	//stampa la tabella
	echo '<table border="1">';
	for ($n=1; $n<=$_POST['n']; $n++) {
		echo '<tr>'; //stampa prima riga
		for ($k=1; $k<=$_POST['n']; $k++) {
			echo '<td>' . $n*$k . '</td>';
			//stampa tutte righe moltiplicate
		}
		echo '</tr>';
	}
	echo '</table>';
}
?>


</body>
</html>