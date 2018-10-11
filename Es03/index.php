<?php
require_once 'array.php';
require_once 'writeFile.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Corsi</title>
</head>
<body>

	<form method="get" action="">
		<input name="nome">
		<select name="corso">
			<?php
			foreach ($CORSI as $key => $value) {
				echo '<option value="'.$value.'">'.$value.'</option>';
			}
			?>
		</select>
		<input type="submit" value="Scopri">
	</form>
	<a href="parteB.php">Parte B</a>



	<?php

	if (isset($_GET['corso'])){

		echo 'Vuoi iscriverti al corso? Costo: &euro;';
		foreach ($CORSI as $key => $value) {
			if ($value == $_GET['corso'])
				echo $COSTI[$key]. ' tenuto dal prof. '.$key;
			$costo = $COSTI[$key];
		}
		echo '<form method="post" action="">';
		echo '<input type="hidden" name="corso" value="'.$_GET['corso'].'">
		<input type="hidden" name="costo" value="'.$costo.'">
		<input type="hidden" name="nome" value="'.$_GET['nome'].'">
		SI<input type="radio" name="yn" value="si"><br>
		NO<input type="radio" name="yn" value="no"><br>
		<input type="submit" value="Iscriviti">
	</form>';

	if (isset($_POST['yn'])) {

		if ($_POST['yn'] == "si"){
			echo 'Grazie! Le tue informazioni sono state memorizzate.';
			writeOnFile();

		}
		else {
			echo 'Ci dispiace, arrivederci';
		}

	}
}
?>

</body>
</html>