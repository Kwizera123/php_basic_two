<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if($_FILES["file"]["error"] === 0){
    $uploaddir = "upload/";

   // /upload/image_name.jpg
    $file_name = basename($_FILES["file"]["name"]);
    $target_file = $uploaddir . $file_name;


    $file_size = $_FILES["file"]["size"];
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    // defines allewed files types
    $allowed_types = ['jpg','gif'.'png','jpeg'];

    // code checking files size (limit 4MB)
    if($file_size > 4 * 1024 * 1024){
      $fileErr = "The file is too larger {$file_size}";
    }
    // code checking files types
    elseif(!in_array($file_type, $allowed_types)){
      $fileErr = "Only JPG, JPEG, PNG, and GIF files are allowed";

      // If no errors, move the file to the target directory.
    }else{

       if(!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
        $fileErr = "Sorry there was an error to upload your file.";
      }
    }
    // Handle when file does not upload
  }else{
    switch ($_FILES['file']['error']){
      case UPLOAD_ERR_INI_SIZE;
      $fileErr = "The uploaded files exceeds the maximum size allowed by the server";
    }
  }

  if(empty($fileErr)){
    echo "The file has been uploaded";
  }else{
    echo $fileErr . "<br>";
  }
}
?>