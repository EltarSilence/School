<ul>
  <li><a href="index.php">Homepage</a></li>

  <?php
    if (isset($_SESSION['nickname'])) {
      echo '<li><a href="newuser.php">Nuovo Utente</a></li>';
      echo '<li><a href="elenchi.php">Elenchi</a></li>';
      echo '<li><a href="logout.php">Esci</a></li>';
    }
    else {
      echo '<li><a href="login.php">Entra</a></li>';
    }
  ?>


  <li style="float: right;">

    <a href="index.php">
    <?php
    if (isset($_SESSION['nickname'])){
      echo $_SESSION['nickname'];
    }
    else {
      echo 'Non loggato';
    }
     ?>
   </a>
  </li>
</ul>
