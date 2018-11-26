<?php
/*
  Se e' gia' loggato non fa loggare e reindirizza a homepage
  Tramite il metodo della classe verifico se il login va a buon fine
*/
  require "Utente.php";
  session_start();
  if (isset($_SESSION['username'])){
    echo '<div class="error">
    <b>Errore:</b> Sei gi&agrave; loggato.
    </div>';
    header("Location: homepage.php");
    die();
  }
?>

    <html>
      <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css" />
      </head>
      <body>
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
        $utente = new Utente('utenti.csv');

        if ($utente->login($username, md5($password))){
          //loggato
          $_SESSION['username'] = $username;
          header("Location: inserimento.php");
        }
        else {
          //non loggato
          echo '<div class="error">
          <b>Errore:</b> Credenziali errate.
          </div>';
        }

      }

    ?>

  </body>

</html>
