<?php

$servername = "localhost";
$username = "turnde";
$password = "e79w81gF0ssKlwG";
$dbname = "turnde_portfolio_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>