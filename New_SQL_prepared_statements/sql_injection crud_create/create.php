<?php
include"db.php";

$stmt = mysqli_prepare($conn, "INSERT INTO users(username, email, password, reg_date) VALUES (?,?,?,?)");

if($stmt){
 $username = "coko";
 $email = "coco@gmail.com";
 $password = "123";
 $reg_date = date('Y-m-d');

mysqli_stmt_bind_param($stmt, "ssss",$username, $email, $password, $reg_date);

mysqli_stmt_execute($stmt);

echo "New user created successfully";

mysqli_stmt_close($stmt);
} else {
 echo "Error:" . mysqli_error($conn);
}

