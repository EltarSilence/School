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
		for ($i=5; $i<=45; $i++){
			//ripeto 40 volte la stampa delle righe usando la funzione creata sopra
			echo '<tr><td>'.$i.'</td><td>'.fattoriale($i).'</td></tr>';
		}
	?>
</table>


</body>
</html>
