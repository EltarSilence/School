<?php require 'array.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Parte B</title>
</head>
<body>
<h3>Estrai le persone iscritte ai corsi o <a href="index.php">torna indietro</a></h3>
	<form method="POST" action="">
		<select name="corso">
			<?php
			//per ogni corso, ne mostro il nome in tag HTML <option>
			foreach ($CORSI as $key => $value) {
				echo '<option value="'.$value.'">'.$value.'</option>';
			}
			?>
		</select>
		<input type="submit" name="showMateria">
	</form>

	<?php

	//se mi arrivano dati dal form
	if(isset($_POST['corso'])) {

		if (filesize('iscrizioni.txt') <= 0){
			//se il file e' vuoto lo script muore qui
			die("File delle iscrizioni vuoto!");
		}
		$file = fopen('iscrizioni.txt', 'r');
		$data = fread($file, filesize('iscrizioni.txt'));
		//lettura file
		
		$data = explode("\n", $data);
		//esplodo per riga

		for ($i = 0; $i<count($data)-1; $i++){
			//esplodo per singola coppia di informazione
			$single = explode(',', $data[$i]);
			
			//assegno i vari valori
			$tmp = explode('=', $single[0]);
			$tmp1 = explode('=', $single[1]);

			//creo un array associativo formato in questo modo
			//array(partecipante => corso)
			if ($tmp[0] && $tmp1[0] != null)
				$mat_assoc[$tmp[1]] = $tmp1[1];
		}
		/*
		foreach ($data as $pair) {
			//esplodo per singola coppia di informazione
			$single = explode(',', $pair);
			print_r($single);
			//assegno i vari valori
			$tmp = explode('=', $single[0]);
			$tmp1 = explode('=', $single[1]);

			//creo un array associativo formato in questo modo
			//array(partecipante => corso)
			if ($tmp[0] && $tmp1[0] != null)
				$mat_assoc[$tmp[1]] = $tmp1[1];

		}
*/

		fclose($file);

		//visualizzo gli iscritti ove siano iscritti al corso
		//che mi arriva dal form
		echo 'Iscritti:<br>';
		foreach ($mat_assoc as $key => $value) {
			if ($value == $_POST['corso'])
				echo $key."<br>";
		}
	}

//l'array $_POST viene completamente azzerato per prevenire ulteriori 
//accidentali ricaricamenti della pagina che ripeterebbero la lettura del file
$_POST = array();
//Secondo me e' meglio mantenerlo come array piuttosto che disassociarlo con l'unset(), magari (per 
//puro caso) altri file stanno tentando di leggerlo, ed ovviamente assumendo che si tratti di un array
//cosi' mi rimane mantenuto.

?>

</body>
</html>