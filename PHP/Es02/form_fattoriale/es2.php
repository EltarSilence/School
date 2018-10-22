<?php
//funzione fattoriale
function fattoriale($n) { 
    if ($n <=1) { 
        return 1; 
    } else { 
        return ($n * fattoriale($n-1)); 
    } 
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Es 02 PHP</title>
</head>
<body>

<table border="1">
	<?php
		echo '<table border="1">';
		
		for ($i=$_GET['minimo']; $i<=$_GET['massimo']; $i++){
			//ripeto n volte la stampa delle righe richiamando l'esercizio 2
			echo '<tr><td>'.$i.'</td><td>'.fattoriale($i).'</td></tr>';
		}
	?>
</table>


</body>
</html>
