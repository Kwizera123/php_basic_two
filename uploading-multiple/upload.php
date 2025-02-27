<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $upload_dir = "uploads/";

  if(!is_dir($upload_dir)){
    mkdir($upload_dir, 0777, true);
  }

  foreach ($_FILES['files']['name'] as $key => $file_name){

    $file_tmp = $_FILES['files']['tmp_name'][$key];
    $file_size = $_FILES['files']['size'][$key];
    $file_error = $_FILES['files']['error'][$key];
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $target_file = $upload_dir . basename($file_name);

    if($file_error === UPLOAD_ERR_OK){
      if($file_size > 5 * 1024 * 1024){
        echo "Error too big";
      }
      elseif(!in_array($file_type,['jpg', 'jpeg','png','gif','pdf'])){
        echo "ERROR file type $files_name is not allowed";
      }
      else{
        if(move_uploaded_file($file_tmp, $target_file)){
          echo "File {$file_name} uploaded successfully";
        }else{
          echo "Error: There was an time issue uploading $file_name </br>";
        }
      
      }
    }else{ // Checking for errors if statement
      echo "Error: File $file_name failed to upload due to error $file_error<br>";
    }
  }// For Loop
}else{
  echo "No files were uploaded";
}