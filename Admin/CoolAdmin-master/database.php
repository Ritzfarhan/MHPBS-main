<?php
$dbServername = "localhost";
$dbUsername = "fypmhpbs";
$dbPassword = "iDRIS@976";
$dbName = "sdmarrio_mhpbs";

// Create connection
$connection = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

?>