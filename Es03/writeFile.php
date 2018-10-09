<?php

function writeOnFile() {
	//FORMATO:
	// Utente <nome> si e' iscritto al corso di <corso> (pagati <costo> euro)
	$data = 'Utente "'.$_POST['nome'].'" si e\' iscritto al corso di '.$_POST['corso'].' (Pagati '.$_POST['costo'].')';

	$file = fopen('iscrizioni.txt', 'a');
	fwrite($file, $data.PHP_EOL);
	fclose($file);
}

	if (isset($_POST['yn'])) {

		if ($_POST['yn'] == "si"){
			echo 'Grazie! Le tue informazioni sono state memorizzate.';
			writeOnFile();
		}
		else {
			echo 'Ci dispiace, arrivederci';
		}

	}

?>