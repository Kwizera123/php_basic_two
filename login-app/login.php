<?php

include "partials/header.php";
include "partials/navigation.php";
if(is_user_logged_in()){
  header("Location: admin.php");
  exit;
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);


  $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);

    if(password_verify($password, $user['password'])) {
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $user['username'];
      redirect("admin.php");
      exit;
    } else {
      $error = "Invalid password";
    }

    // Mysqli num rows
  } else {
    $error = "Invalid username";
  }
}

?>
<div class="container">
 


    <div class="form-container">
      
  <form method="POST" action="">
  <h2>Login</h2>
  <?php if ($error): ?>
<p style="color:red">
  <?php echo $error; ?>
</p>
<?php endif; ?>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" placeholder="Enter Username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter Password"required>
    <input type="submit" value="Login">
  </form>
  </div>
  </div>
  <?php
include "partials/footer.php";
?>

<?php
mysqli_close($conn);
?>