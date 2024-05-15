<?php
session_start();
require_once 'db.php';

/*if(isset($_POST['addguest'])){
header("Location: index.php");
}

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
*/
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];

$sql = "INSERT INTO myGuestsTable (firstname, lastname, email)
VALUES ('$firstname', '$lastname', '$email')";

if (mysqli_query($conn, $sql)) {
  $_SESSION['message'] ="guestadded";
  header("Location: index.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>