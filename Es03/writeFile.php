<?php

function showIscrizioni($materia) {
	
	$data = file_get_contents('iscrizioni.txt');
	$data = explode(PHP_EOL, $data);

	echo 'ISCRITTI AL CORSO DI '.$materia.':';

	foreach ($data as $pair) {
		$single = explode(',', $pair);
	
	    $tmp = explode('=', $single[0]);
	    $tmp1 = explode('=', $single[1]);
	    
	    $mat_assoc[$tmp[1]] = $tmp1[1];
	}

//da finire visualizzazione

	foreach ($mat_assoc as $key => $value) {
		echo $key.' => '.$value;
	}

}

function writeOnFile() {
	//FORMATO:
	// user=<nome>,corso=<corso>,costo=<costo>
	$data = 'user='.$_POST['nome'].',corso='.$_POST['corso'].',costo='.$_POST['costo'];

	$file = fopen('iscrizioni.txt', 'a');
	fwrite($file, $data.PHP_EOL);
	fclose($file);
}

	if (isset($_POST['yn'])) {

		if ($_POST['yn'] == "si"){
			echo 'Grazie! Le tue informazioni sono state memorizzate.';
			writeOnFile();
			showIscrizioni($_POST['corso']);
		}
		else {
			echo 'Ci dispiace, arrivederci';
		}

	}

?>