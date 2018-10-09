<?php
	$CORSI = array('Bulgari' => 'Italiano', 'Bottini' => 'Informatica', 'Passalacqua' => 'Telecomunicazioni');
	$COSTI = array('Bulgari' => 25, 'Bottini'=> 15, 'Passalacqua' => 25);
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

	<?php
		if (isset($_GET['corso'])){

			echo 'Vuoi iscriverti al corso? Costo: &euro;';
			foreach ($CORSI as $key => $value) {
				if ($value == $_GET['corso'])
				echo $COSTI[$key]. ' tenuto dal prof. '.$key;
				$costo = $COSTI[$key];
			}
			echo '<form method="post" action="writeFile.php">';
			echo '<input type="hidden" name="corso" value="'.$_GET['corso'].'">
			<input type="hidden" name="costo" value="'.$costo.'">
			<input type="hidden" name="nome" value="'.$_GET['nome'].'">
			SI<input type="radio" name="yn" value="si"><br>
			NO<input type="radio" name="yn" value="no"><br>
			<input type="submit" value="Iscriviti">
			</form>';

		}
	?>

</body>
</html>