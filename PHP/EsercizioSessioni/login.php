<?php
  require "Utente.php";
  session_start();
?>

<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <?php
      if (isset($_SESSION['username'])){
        echo '<div class="error">
        <b>Errore:</b> Sei gi&agrave; loggato.
        </div>';
        die();
      }
    ?>
    <form action="" method="post" name="loginForm">
      <table class="login-box">
        <tr>
          <td>Username</td>
          <td><input name="unm" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="pwd"/></td>
        </tr>
        <tr>
          <td><input type="submit" value="Login" /></td>
        </tr>
      </table>
    </form>

    <?php
      if (isset($_POST['unm'])){

        $username = $_POST['unm'];
        $password = $_POST['pwd'];

        $file = fopen('utenti.csv', 'r');
        $userlist = fread($file, filesize('utenti.csv')-1);
        $lines = explode("\n", $userlist);
        $utenti = array();

        foreach ($lines as $line) {
          $utente = new Utente('','','','');
          $utente->getByCSV($line);
          array_push($utenti, $utente->username);
        }

        var_dump($lines);
        fclose($file);
      }

    ?>

  </body>

</html>
