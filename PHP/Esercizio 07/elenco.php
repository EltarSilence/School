<html>
<head>
  <title>Elenco</title>
</head>

<body>
  <h3>Elenco di iscritti</h3>
  <?php

    require_once 'Studente.php';
    $filename = "iscrizioni.txt";
    if (filesize($filename) <= 0){
			//se il file e' vuoto lo script muore qui
			die("File delle iscrizioni vuoto!");
		}
		$file = fopen($filename, 'r');
		$data = fread($file, filesize($filename)-1);
		$data = explode("\n", $data);
    echo 'Iscritti: '.count($data).'<br /><br />';
    $iscritti = array();

    //versione corretta ad oggetti
    for ($i=0; $i<count($data); $i++){
      if ($data[$i] != "") {
        $studente = new Studente("","","","","");
        $studente->getByCSV($data[$i]);
      }
      $n_c = $studente->getNome().' '.$studente->getCognome();
      array_push($iscritti, $n_c);
    }
    sort($iscritti);

    for ($i=0; $i<count($iscritti); $i++){
      echo $iscritti[$i].'<br />';
    }

    /*
    metodo procedurale
    for ($i=0; $i<count($data); $i++){
      $datum = explode(",", $data[$i]);
      $n_c = $datum[0].' '.$datum[1];
      array_push($iscritti, $n_c);
    }
    sort($iscritti);

    for ($i=0; $i<count($iscritti); $i++){
      echo $iscritti[$i]."<br />";
    }
    */

  ?>

</body>
</html>
