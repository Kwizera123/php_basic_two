<?php
  session_start();

  if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true){
    header("Location: login.php");
    exit;
  }
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>
<body>
  <h2>Welcome <?php echo $_SESSION['username'] ?> to Admin Page</h2>

  <a href="logout.php">Logout</a>
</body>
</html>