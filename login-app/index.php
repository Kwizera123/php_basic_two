<?php 
include "db.php";

session_start();
?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login App with SQL and PHP </title>
  </head>
  <body>
    <h2>Welcome to the Home Page</h2>
    <p>
      <a href="register.php">Register</a>
    </p>


    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
    <p>
      <a href="admin.php">Admin</a>
    </p>

    <p>
      <a href="logout.php">Logout</a>
    </p>

    <?php else: ?>
      <p>
      <a href="login.php">Login</a>
    </p>
    <?php endif; ?>


  </body>
  </html>

