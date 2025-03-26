<?php
  
  require_once __DIR__ . '/../app/init.php';

  $routes = [
    '' => 'HomeController@index',
    'testing' => 'HomeController@index@testing',
  ];

  if(array_key_exists('testing', $routes)){
    echo "TRUE IT DOES EXIST";
  } else {
    echo "It does not exist";
  }

 ?>