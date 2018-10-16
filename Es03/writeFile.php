<?php

require 'array.php';

function writeOnFile() {
	//FORMATO:
	// user=<nome>,corso=<corso>,costo=<costo>
	$data = 'user='.$_POST['nome'].',corso='.$_POST['corso'].',costo='.$_POST['costo'];

	//scrivo su file
	$file = fopen('iscrizioni.txt', 'a');
	fwrite($file, $data."\n");
	fclose($file);
}


?>