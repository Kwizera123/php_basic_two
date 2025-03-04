<?php

include "partials/header.php";
include "partials/navigation.php";



$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

  // Check of the password and confirm match
  if ($password !== $confirm_password) {
    $error = "Password do not match";
  } else {
  //Checo if username already exist
    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) === 1){
      $error = "Username already exists, Please choose another"; 
    } else{

      $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$passwordHash', '$email')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: admin.php");
        exit;
    } else {
      $error = "Opoos! Data were not Inserted, error: " . mysqli_error($conn);
    };

    }

  }
}

?>

  <div class="container">
    <div class="form-container">
  
    <form method="POST" action="">
    <h2>Create Your Account</h2>
    <?php if($error): ?>
    <p style="color:red">
      <?php echo $error; ?>
    </p>
    <?php endif; ?>
    <label for="username">Username:</label>
    <input value="<?php echo isset($username) ? $username : ''; ?>" type="text" id="username" name="username" placeholder="Enter username" required>
    <label for="email">Email:</label>
    <input value="<?php echo isset($email) ? $email : ''; ?>" type="email" id="email" name="email" placeholder="Enter Email" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter password" required>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter confirm password" required>
    <input type="submit" value="Register">
  </form>
    </div>
  </div>
  <?php 
  include "partials/footer.php";
?>

<?php
mysqli_close($conn);
  ?>