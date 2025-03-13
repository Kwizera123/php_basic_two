<?php



  $conn = mysqli_connect('localhost','root','root','prepare_stmt_db');


   $sql = "INSERT INTO users (username, email, password)
   VALUES
   ('kwizera','kwizera@gmail.com','hashed 123'),
   ('sinapy','sinapy@gmail.com','hashed 123'),
   ('theo','theo@gmail.com','hashed 123'),
   ('bebe','beb@gmail.com','hashed 123'),
   ('kaka','kaka@gmail.com','hashed 123')";
  $result = mysqli_query($conn, $sql);

  