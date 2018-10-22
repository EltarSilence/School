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
<h3>Iscriviti al corso o accedi alla <a href="parteB.php">Parte B</a></h3>
	<form method="get" action="">
		<label>Nome: </label><input name="nome"><br>
		<label>Corso:</label>
		<select name="corso">
			<?php
			//per ogni corso, ne mostro il nome in tag HTML <option>
			foreach ($CORSI as $key => $value) {
				echo '<option value="'.$value.'">'.$value.'</option>';
			}
			?>
		</select>
		<input type="submit" value="Scopri">
	</form>
	



	<?php

	if (isset($_GET['corso'])){

		echo 'Vuoi iscriverti al corso? Costo: &euro;';
		//scorro i corsi e confronto: se il corso e' quello selezionato
		//dall'utente allora ne mostro il prezzo
		foreach ($CORSI as $key => $value) {
			if ($value == $_GET['corso'])
				echo $COSTI[$key]. ' tenuto dal prof. '.$key;
			$costo = $COSTI[$key];
		}
		//mando in output il form con i relativi campi hidden
		//che serviranno a mandare i dati in POST nella conferma
		echo '<form method="post" action="">';
		echo '<input type="hidden" name="corso" value="'.$_GET['corso'].'">
		<input type="hidden" name="costo" value="'.$costo.'">
		<input type="hidden" name="nome" value="'.$_GET['nome'].'">
		SI<input type="radio" name="yn" value="si"><br>
		NO<input type="radio" name="yn" value="no"><br>
		<input type="submit" value="Iscriviti">
	</form>';

	//se e' arrivata conferma
	if (isset($_POST['yn'])) {
		//se ha confermato
		if ($_POST['yn'] == "si"){
			//scrive
			echo 'Grazie! Le tue informazioni sono state memorizzate.';
			writeOnFile();

		}
		else {
			//non scrive e reindirizza ad index.php
			header('Location: index.php');
		}

	}
}
//l'array $_POST viene completamente azzerato per prevenire ulteriori 
//accidentali ricaricamenti della pagina che scriverebbero un'altra volta su file 
$_POST = array();
//Secondo me e' meglio mantenerlo come array piuttosto che disassociarlo con l'unset(), magari (per puro caso) altri file stanno tentando di leggerlo ed ovviamente assumendo che si tratti di un array
//cosi' mi rimane mantenuto.
?>

</body>
</html>