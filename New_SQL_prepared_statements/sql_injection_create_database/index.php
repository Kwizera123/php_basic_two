<?php



  $conn = mysqli_connect('localhost','root','root',);
  $sql = "CREATE DATABASE prepare_stmt_db";
  $result = mysqli_query($conn, $sql);

  