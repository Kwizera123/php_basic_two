<?php

$conn = mysqli_connect("localhost", "root", "root","login_app");

if($conn){
  echo "Connected";
}else{
  echo "Not Connected" . mysqli_error($conn);
};