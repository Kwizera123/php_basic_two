<?php

$username = 'kwizera';

  $conn = mysqli_connect('localhost','root','root','sql_injection');
  $sql = "SELECT * FROM users WHERE username = '$username' OR '1' = '1'";
  $result = mysqli_query($conn, $sql);

  // AVOID SQL INJECTION with prepared statements
  $sql_prepare = "SELECT * FROM users WHERE username = ?";
  $stmt = mysqli_prepare($conn, $sql_prepare);
  // Bind the param
  mysqli_stmt_bind_param($stmt, "s", $username);
  // Execute
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);



?>

<ul>
  <?php while($user = mysqli_fetch_assoc($result)): ?>
      <li><?php echo $user['username']?></li>
    <?php endwhile; ?>
</ul>