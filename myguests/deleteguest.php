<?php
session_start();

if(isset($_POST['id'])){

//delete from database
require_once 'db.php';

// sql to delete a record
$sql = "DELETE FROM myGuestsTable WHERE id ='{$_POST['id']}'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] ="guestdeleted";
    header("Location: index.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

} else {
    header("Location: index.php");
}

?>