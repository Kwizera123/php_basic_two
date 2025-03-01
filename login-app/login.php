<?php

include "db.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);


  $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) === 1){
      $user = mysqli_fetch_assoc($result); 
    } else{
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
  <h2>Login</h2>

  <?php if($error): ?>

    <p style="color:red">
      <?php echo $error; ?>
    </p>
    <?php endif; ?>

  <form method="POST" action="">
    <label for="username">Username:</label><br>

    <input type="email" id="email" name="email" required><br><br>
    <label for="password">Password:</label><br>

    <input type="password" id="confirm_password" name="confirm_password" required><br><br>
    <input type="submit" value="Register">
  </form>
</body>
</html>

<?php
mysqli_close($conn);
  ?>