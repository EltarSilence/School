<?php
  /*
    Se e' loggato un admin, mostro il suo nome
    Se non e' loggato, mostro un errore
    Se ricevo dati da questo form, costruisco un oggetto
    e scrivo su file
  */

  session_start();
  //if (!isset($_SESSION['username'])) header("HTTP/1.0 403");

  require 'Prodotto.php';
  include 'bar.php';
  if (isset($_SESSION['username'])) {
    echo '<div class="success">
    <b>Amministratore loggato: </b> '.$_SESSION['username'].'</div>';
  }
?>

<html>
  <head>
    <title>Inserimento Prodotti</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
<?php
  if (!isset($_SESSION['username'])){
    echo '<div class="error">
    <b>Errore:</b> Devi effettuare il login per inserire i prodotti.
    <a href="login.php">Vai qui</a>
    </div>';
    die();
  }
  else {
    //loggato
    ?>
    <form method="POST" action="" enctype="multipart/form-data">
      <table class="login-box">
        <tr>
          <td>Nome Prodotto</td>
          <td><input name="nomeP" /></td>
        </tr>
        <tr>
          <td>Genere</td>
          <td><input name="genereP"/></td>
        </tr>
        <tr>
          <td>Prezzo Unitario</td>
          <td><input name="prezzoP"/></td>
        </tr>
        <tr>
          <td>Giacenza</td>
          <td><input name="giacenzaP"/></td>
        </tr>
        <tr>
          <td>Percorso Immagine</td>
          <td><input type="file" name="immagineP" /></td>
        </tr>
        <tr>
          <td><input type="submit" value="Inserisci prodotto" /></td>
        </tr>
         <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
      </table>
    </form>

    <?php

    if (isset($_POST['nomeP'])) {
      if ($_POST['nomeP'] == "" || $_POST['genereP'] == "" || $_POST['prezzoP'] == "" || $_POST['giacenzaP'] == "") {
        //dati non validi
        echo '<div class="error">Impossibile inserire il prodotto: dati errati</div>';
        die();
      }
      $ts = new DateTime();

      $nome_file = $_FILES['immagineP']['name'];
      $estensione = '.'.explode('.', $nome_file)[1];

      $uploaddir = 'img/';
      //$link = 'img'.$ts->getTimestamp().$estensione;
      $uploadfile = $uploaddir.'img'.$ts->getTimestamp().$estensione;

      if (move_uploaded_file($_FILES['immagineP']['tmp_name'], $uploadfile)) {
          echo "Caricamento OK.\n";

          $prodotto = new Prodotto();
          $prodotto->init($_POST['nomeP'],
          $_POST['genereP'], $_POST['prezzoP'],
          $_POST['giacenzaP'], $uploadfile);
          $f = fopen('prodotti.csv', 'a');
          fwrite($f, $prodotto->returnCSV(',')."\n");
          fclose($f);

          echo "Prodotto ".$prodotto->getNome()." inserito!<br>";
          echo '<a href="elenco.php">Guarda l\'elenco</a>';


      }
      else {
          echo "Possibile attacco tramite file upload!\n";
      }



    }

?>
  </body>
</html>

<?php

  }

?>
