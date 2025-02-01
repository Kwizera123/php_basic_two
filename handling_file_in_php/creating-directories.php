<?php 

$directory = "uploads";

if(is_dir($directory)){
  $files = scandir($directory);
  foreach($files as $file){
    if($file !== "." && $file !== ".."){
      echo "File: $file\n"."<br>";
    }
  }
}

// code to create Diretory
/*
if(!file_exists($directory)){
  mkdir($directory, 0777, true);
  echo "Directory created";
}else{
  echo "directory already exists";
}
  */
  