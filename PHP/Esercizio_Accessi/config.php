<?php
/*
  CONNESSIONE AL DATABASE
*/
  $conn = new mysqli("localhost", "root", "", "esercizio_1");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>
