<?php
  class User {

  }

  $classes = get_declared_classes();

  foreach($classes as $class){
    // echo $class . "<br>";
  }

  $date = new DateTime();

  $timezone = new DateTimeZone('Africa/Kigali');

  $date->setTimezone($timezone );

  echo $date->gettimezone()->getName();
?>