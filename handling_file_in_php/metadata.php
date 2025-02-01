<?php
 $file_name = "data.txt";

 if(file_exists($file_name)){

  echo "File Size: " . $filesize . ($file_name) . " bytes\n";
  
  echo "Last modified: " . date("F d Y H:i:s.", filemtime($file_name)) . "\n";

  if(is_readable($file_name)){
    echo "It is readeable.\n";
  }

   if(is_writeable($file_name)){
    echo "It is writeable.\n";
  }

 }else{
  echo "File does not exist.";
 }

 ?>