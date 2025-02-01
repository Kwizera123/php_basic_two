<?php

// FIRST WAY TO DO IT
  $file_name = "data.txt";
   //Open the file

  $file = fopen($file_name, "a");

  if($file){

    fwrite($file, "Hello! I am a new php lerner\n");
    fclose($file);
    echo "File written successfully";
  }else{
    echo "Enable to write a file";
  }