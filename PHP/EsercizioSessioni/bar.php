<ul>
  <li><a href="homepage.php">Homepage</a></li>
  <li><a href="inserimento.php">Inserimento</a></li>
  <li><a href="elenco.php">Magazzino</a></li>
  <li><a href="buy.php">Negozio</a></li>
<?php

  if (isset($_SESSION['username'])){
    echo '<li><a href="inserimento.php">Inserimento</a></li>';
    echo '<li><a href="logout.php">Logout</a></li>';
  }
  else {
    echo '<li><a href="login.php">Login</a></li>';
  }

?>
</ul>
