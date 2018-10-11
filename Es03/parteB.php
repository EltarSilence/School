<?php require 'array.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Parte B</title>
</head>
<body>

	<form method="POST" action="">
		<select name="corso">
			<?php
			foreach ($CORSI as $key => $value) {
				echo '<option value="'.$value.'">'.$value.'</option>';
			}
			?>
		</select>
		<input type="submit" name="showMateria">
	</form>

	<?php

	if(isset($_POST['corso'])) {

		$file = fopen('iscrizioni.txt', 'r');
		$data = fread($file, filesize('iscrizioni.txt'));
		$data = explode("\n", $data);

		foreach ($data as $pair) {
			$single = explode(',', $pair);


			$tmp = explode('=', $single[0]);
			//if ($single[1] != null)
			$tmp1 = explode('=', $single[1]);


			if ($tmp[0] && $tmp1[0] != null)
				$mat_assoc[$tmp[1]] = $tmp1[1];

		}


		fclose($file);

		echo 'Iscritti:<br>';
		foreach ($mat_assoc as $key => $value) {
			if ($value == $_POST['corso'])
				echo $key."<br>";
		}
	}


	?>

</body>
</html>