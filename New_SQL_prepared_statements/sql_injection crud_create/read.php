<?php 
  include"db.php";

  $stmt = mysqli_prepare($conn, "SELECT id, username FROM users WHERE id = ?");

  if($stmt){
    $user_id = 1;
  

  mysqli_stmt_bind_param($stmt, "i", $user_id);

  mysqli_stmt_execute($stmt);

  mysqli_stmt_bind_result($stmt, $id, $username);

  if(mysqli_stmt_fetch($stmt)){
    echo "ID: {$id} <br>";
    echo "The Username: $username";
  } else {
    echo "No user found";
  }
    mysqli_stmt_close($stmt);
} else {
  echo "Error: " . mysqli_error($conn);
}
?>