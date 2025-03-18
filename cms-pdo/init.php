<?php

// Auto loader classes
require_once "autoloader.php";

// Start Session
session_start();

// Include the main configuration file
require_once "config/config.php";

// Load Database
require_once "classes/Databse.php";


// Include helper function
  require_once "helpers.php";

  // Define global constants
  define("APP_NAME", "CMS PDO System");


?>