<ul>
  <li><a href="index.php">Homepage</a></li>
  <li><a href="login.php">Entra</a></li>
  <?php
    if (isset($_SESSION['username'])) {
      echo '<li><a href="logout.php">Esci</a></li>';
    }
  ?>
  <li><a href="elenchi.php">Elenchi</a></li>
</ul>
