<?php
  /*
    Se e' loggato un admin, mostro il suo nome
    Se non e' loggato, mostro un errore
    Se ricevo dati da questo form, costruisco un oggetto
    e scrivo su file
  */

  session_start();
  require 'Prodotto.php';
  if (isset($_SESSION['username'])) {
    echo '<div class="success">
    <b>Amministratore loggato: </b> '.$_SESSION['username'].'</div>';
  }
?>

<html>
  <head>
    <title>Login</title>
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
    <a href="homepage.php">Torna alla homepage</a><br>
    <a href="elenco.php">Elenco prodotti</a><br>
    <form method="get" action="">
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
          <td><input name="immagineP" /></td>
        </tr>
        <tr>
          <td><input type="submit" value="Inserisci prodotto" /></td>
        </tr>
      </table>
    </form>

    <?php

    if (isset($_GET['nomeP'])) {
      if ($_GET['nomeP'] == "" || $_GET['genereP'] == "" || $_GET['prezzoP'] == "" || $_GET['giacenzaP'] == "" || $_GET['immagineP'] == "") {
        //dati non validi
        echo '<div class="error">Impossibile inserire il prodotto: dati errati</div>';
        die();
      }


      $prodotto = new Prodotto();
      $prodotto->init($_GET['nomeP'], $_GET['genereP'], $_GET['prezzoP'], $_GET['giacenzaP'], $_GET['immagineP']);

      $f = fopen('prodotti.csv', 'a');
      fwrite($f, $prodotto->returnCSV(',')."\n");
      fclose($f);

      echo "Prodotto ".$prodotto->getNome()." inserito!<br>";
      echo '<a href="elenco.php">Guarda l\'elenco</a>';
    }

?>
  </body>
</html>

<?php

  }

?>
