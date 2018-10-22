<?php require_once 'fattoriale.php'; //prende la funzione dal file esterno ?>

<!DOCTYPE html>
<html>
<head>
	<title>Esercizio 1 form</title>
	<script src="script.sos" type="text/javascript"></script>
</head>
<body>

	<form method="GET" action="es2.php" name="form1" onsubmit="return controllaDati()">
	<table border="1">
		<tr>
			<td>Minimo numero</td><td><input type="text" name="minimo"></td>
			<td>Massimo numero</td><td><input type="text" name="massimo"></td>
		</tr>
		<tr>
		<td>
		<input type="submit" value="Invia">
		</td>
		</tr>
	</table>
	</form>

</table>
</body>
</html>