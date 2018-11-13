<?php
  session_start();
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
    
  }

?>
