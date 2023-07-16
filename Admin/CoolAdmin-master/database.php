<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "654321";
$dbName = "mhpbs";
//sudo cp -R /home/ec2-user/MHPBS-main /var/www/html/
// Create connection
$connection = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
