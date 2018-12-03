<html>
  <head>
  <title>Home</title>
  <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <?php
    session_start();
    include 'bar.php';
    /*
      Se non e' loggato, avvisa che non tutte le funzioni sono disponibili
      Mostra tutte le funzionalita' in base al livello di autorizzazioni
    */

      if (!isset($_SESSION['username'])) {
        $logged = false;
      }
      else {
        $logged = true;
      }
    ?>
    <div class="page">
      <h4>Home Page</h4>
      Da qui puoi accedere a tutte le funzionalit&agrave;
      del sito.
    </div>
      <?php
        if ($logged){
          //mostra inserimento e logout
        }
        else {
          //mostra login
        }
      ?>


  </body>




</html>
