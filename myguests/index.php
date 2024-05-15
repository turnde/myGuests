<?php
    session_start();
    require_once 'db.php';
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Guests</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container"><div class="row"><div class="col-md-12">
    <h1>My Guests Application</h1>
<?php
if(isset($_SESSION['message'])){
  if($_SESSION['message'] == 'guestadded'){
    echo '<div class="alert alert-success">
    <strong>Success!</strong> Guest Added.
  </div>';
  }
  if($_SESSION['message'] == 'guestdeleted'){
    echo '<div class="alert alert-danger">
    <strong>Success!</strong> Guest Deleted.
  </div>';
  }
  if($_SESSION['message'] == 'guestupdated'){
    echo '<div class="alert alert-warning">
    <strong>Success!</strong> Guest Updated.
  </div>';
  }
  unset($_SESSION['message']);
}

if(isset($_POST['updateguest'])) {


?>

  <form action="updateguest.php" method="post">
    <input type="hidden" name="id" value="<?=$_POST['id']?>">
First Name: <br><input type="text" name="firstname" required value="<?=$_POST['firstname']?>"><br><br>
Last Name: <br><input type="text" name="lastname" required value="<?=$_POST['lastname']?>"><br><br>
Email: <br><input type="email" name="email" required value="<?=$_POST['email']?>"><br><br>
<button type="info" name="updateguest" class="btn btn-info">Update Guest</button><br><br>
</form>

<?php
} else {
?>


    <form action="addguest.php" method="post">
<label>First Name:<br><input type="text" name="firstname" required value="Danny"></label><br><br>
<label>Last Name: <br><input type="text" name="lastname" required value="Turner"></label><br><br>
<label>Email: <br><input type="email" name="email" required value="Danny@danny.com"></label><br><br>
<button type="submit" name="addguest" class="btn btn-success">Add Guest</button><br><br>
</form>
<?php
}
?>
    <table class="table table hover table-striped">
    <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Registration Date</th>
    <th></th>
    <th></th>
</tr
    <?php
require_once 'db.php';

$sql = "SELECT id, firstname, lastname, email, reg_date FROM myGuestsTable";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
?>

<tr>
<td><?=$row['id']?></td>
<td><?=$row['firstname']?></td>
<td><?=$row['lastname']?></td>
<td><?=$row['email']?></td>
<td><?=$row['reg_date']?></td>
<td><form action="deleteguest.php" method="post"><input type="hidden" name='id'value="<?=$row['id']?>"><button type="submit" name="deleteguest" class="btn btn-sm btn-danger">X</button></form></td>
<td><form action="index.php" method="post">
  <input type="hidden" name="id" value="<?=$row['id']?>">
  <input type="hidden" name="firstname" value="<?=$row['firstname']?>">
  <input type="hidden" name="lastname" value="<?=$row['lastname']?>">
  <input type="hidden" name="email" value="<?=$row['email']?>">
  <button type="submit" name="updateguest" class="btn btn-sm btn-success">edit</button></form></td>
</tr>

<?php
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>


</table>

</div></div></div>
</body>








<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>