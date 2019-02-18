<?php
/*
  DISTRUGGE LA SESSIONE 
  MODIFICA IL DATABASE
*/
require 'config.php';
session_start();
session_destroy();
$nick = $_SESSION['nickname'];
$now = date('Y-m-d H:i:s');
$sql = "UPDATE accessi SET fine = '$now' WHERE fine IS NULL";
var_dump($sql);
$result = $conn->query($sql);
header('location: index.php');
?>
