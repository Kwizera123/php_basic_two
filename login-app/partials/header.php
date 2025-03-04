<?php
  include "db.php";
  include "functions.php";

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

  session_start();
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login App with SQL and PHP </title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="<?php echo getPageClass() ?>">