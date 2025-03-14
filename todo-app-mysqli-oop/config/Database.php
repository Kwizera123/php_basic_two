<?php 

class Database {


  private $db_host = 'localhost';
  private $db_user = 'root';
  private $db_password = 'root';
  private $db_name = 'todo_app_mysqli_oop';

  public $conn;

    public function connect(){
    $this->conn = null;
    try {
      $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
      if($this->conn->connect_error){
        die("Connection failed" . $this->conn->connect_error);
      }
    } catch (Exception $error){
        echo "Connection Error" . $error->getMessage();
    }
    return $this->conn;
  }
}