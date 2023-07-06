<?php
$dbServername = "localhost";
$dbUsername = "fypmhpbs";
$dbPassword = "iDRIS@976";
$dbName = "sdmarrio_mhpbs";

// Create connection
$con = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

?>