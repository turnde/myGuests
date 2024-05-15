<?php
session_start();

if(isset($_POST['updateguest'])){

//update guest info in database
require_once 'db.php';

$sql = "UPDATE myGuestsTable SET firstname='{$_POST['firstname']}',lastname='{$_POST['lastname']}',email='{$_POST['email']}' WHERE id='{$_POST['id']}'";

if ($conn->query($sql) === TRUE) {
  $_SESSION['message'] ="guestupdated";
  header("Location: index.php");
} else {
  echo "Error updating record: " . $conn->error;
}

} else {
    header("Location: index.php");
}

?>