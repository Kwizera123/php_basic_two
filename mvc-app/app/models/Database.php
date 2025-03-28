<?php 

  class Database {

    public function __construct(){
      $config = require base_path('config/config.php');

      $dbConfig = $config['database'];

      $host = $dbConfig['host'];
      $dbname = $dbConfig['database'];
      $username = $dbConfig['username'];
      $password = $dbConfig['password'];
      $port = $dbConfig['port'];
      $charset = $dbConfig['charset'];

    }
  }