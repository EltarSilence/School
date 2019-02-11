<?php
  session_start();
  require_once 'config.php';
  require 'Utente.php';
?>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
  <title>Sistema Accessi</title>
</head>
<body>
  <?php
  if (isset($_SESSION['username'])) {
    header("Location: index.php");
  }
  else {
    //mostra menu in alto
    include 'menu.php';
    //mostra form login
    ?>

    <?php

    if (isset($_POST['pwd'])) {
      //submit login
      $utente = new Utente();
      $utente->setNickname($_POST['unm']);
      $utente->setPassword($_POST['pwd']);
      if($utente->login()){
        $_SESSION['nickname'] = $utente->getNickname();
        $nick = $_SESSION['nickname'];
        $now = date('Y-m-d H:i:s');
        $sql = "INSERT INTO accessi (user, inizio) VALUES ('$nick', '$now')";
        var_dump($sql);
        $result = $conn->query($sql);
        header('Location: index.php');
      }
    }
    else {
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
    }
  }
  ?>
</body>



</html>
