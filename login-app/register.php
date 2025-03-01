<?php

include "db.php";

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

  if ($password !== $confirm_password) {
    $error = "Password do not match";
  } else {

    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) === 1){
      $error = "Username already exists, Please choose another"; 
    }



    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if (mysqli_query($conn, $sql)) {
      echo "Data Inserted Successfully";
    } else {
      echo "Opoos! Data were not Inserted, error: " . mysqli_error($conn);
    };
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>Register</h2>

  <?php if($error): ?>

    <p style="color:red">
      <?php echo $error; ?>
    </p>
    <?php endif; ?>

  <form method="POST" action="">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <label for="confirm_password">Confirm Password:</label><br>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>
    <input type="submit" value="Register">
  </form>
</body>

</html>