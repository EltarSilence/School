<html>
<head>
  <title>Iscrizione</title>
</head>

<body>
  <h3>Iscrizione alla scuola</h3>
  <a href="elenco.php">Visualizza elenco</a><br /><br />
  <form method="post" action="" name="iscrizione" onsubmit="return controllo()">
    <label>Nome:</label><input name="nome" /><br />
    <label>Cognome:</label><input name="cognome" /><br />
    <label>Data:</label><input type="date" name="ddn" /><br />
    <label>Scuola di provenienza:</label><input name="scuola_p" /><br />
    <label>Indirizzo richiesto:</label>
    <select name="indirizzo">
      <option name="Informatica">Informatica</option>
      <option name="Grafica">Grafica</option>
      <option name="Meccanica">Meccanica</option>
    </select><br />
    <input type="submit" value="Iscriviti" /><br />
  </form>
</body>

<?php

  require_once 'Studente.php';

  if (isset($_POST['nome'])){
    $studente = new Studente($_POST['nome'], $_POST['cognome'], $_POST['ddn'], $_POST['scuola_p'], $_POST['indirizzo']);
    $filename = "iscrizioni.txt";
    $file = fopen($filename, 'a');
    $csv = $studente->createCSVstring() . "\n";
    fwrite($file, $csv);
    echo "<h4>Iscrizione registrata</h4>";
  }

?>

  <script src="script.sos"></script>
</html>
