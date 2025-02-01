<?php

// FIRST WAY TO DO IT
  $file_name = "data.txt";

  //Open the file and
/*
  $file = fopen($file_name, "r");

  if($file){
    $content = fread($file, filesize($file_name));
    echo nl2br($content);
    fclose($file);
  }else{
    echo "Enable to open a file";
  }
    */

    // SECOND ANS EASYEST TO DO IT 
    $content = file_get_contents("data.txt");
    echo nl2br($content);	
?>
