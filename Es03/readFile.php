<?php
	
function showIscrizioni() {
	//$file = fopen('iscrizioni.txt', 'r');
	$data = file_get_contents('iscrizioni.txt');

	echo $data;
}

?>