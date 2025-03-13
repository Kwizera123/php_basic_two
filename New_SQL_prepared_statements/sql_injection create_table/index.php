<?php



  $conn = mysqli_connect('localhost','root','root','prepare_stmt_db');


   $sql = "CREATE TABLE users(
   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(50) NOT NULL UNIQUE,
   email VARCHAR(100) NOT NULL UNIQUE,
   password VARCHAR(255) NOT NULL,
   reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   )";
  $result = mysqli_query($conn, $sql);

  