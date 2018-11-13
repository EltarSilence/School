<html>
  <head>
  <title>Home</title>
  <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <?php
      $logged = false;
      session_start();
      if (!isset($_SESSION['username'])) {
        echo '<div class="warning">
        Attenzione:
        Devi effettuare il login per inserire i prodotti.
        <a href="login.php">Vai qui</a>
        </div>';
      }
      else {
        $logged = true;
      }
    ?>
    <div class="page">
      <h4>Benvenuto nella Home Page.</h4>
      Da qui puoi accedere a tutte le funzionalit&agrave;
      del sito.
    </div>
    <ul>
      <li>
        <a href="login.php" target="_blank">Login</a>
      </li>
      <li>
        <a href="logout.php" target="_blank">Logout</a>
      </li>
      <li>
        <a href="elenco.php" target="_blank">Elenco</a>
      </li>
      <?php
        if ($logged){
          echo '<li>
            <a href="inserimento.php" target="_blank">Inserimento</a>
          </li>';
        }
      ?>
    </ul>


  </body>




</html>
