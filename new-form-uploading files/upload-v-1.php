<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if($_FILES["file"]["error"] === 0){
    $uploaddir = "upload/";

   // /upload/image_name.jpg
    $file_name = basename($_FILES["file"]["name"]);
    $target_file = $uploaddir . $file_name;

   if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
     echo "The file ". basename($_FILES["file"]["name"]). " has been uploaded successfully.";
   }else{
    echo "Sorry, There was an error uploading the file.";
   }

     
  }
}
?>