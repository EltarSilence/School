<?php
  if (isset($_SESSION['username'])){
    echo ' <img class="icona" src="img/usericon.png"> Benvenuto, '.$_SESSION['username'];
  }
  else {
    echo '<div class="head">Non sei loggato!</div>';
  }
?>
