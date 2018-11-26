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
    <ul>
      <li>
        <a href="elenco.php">Elenco</a>
      </li>
      <?php
        if ($logged){
          echo '
          <li>
            <a href="inserimento.php">Inserimento</a>
          </li>
          <li>
          <a href="logout.php">Logout</a>
          </li>';
        }
        else {
          echo '<li>
        <a href="login.php">Login</a>
      </li>';
        }
      ?>
    </ul>


  </body>




</html>
