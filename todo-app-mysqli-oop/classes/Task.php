<?php

  class Task {

    private $conn;
    private $table = 'tasks';
    public $id;
    public $task;
    public $is_completed;

    public function __construct($db){
      $this->conn = $db;
    }

    public function create()
    {
      $query = "INSERT INTO " . $this->table . " (task) VALUES (?)";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("s", $this->task);
      return $stmt->execute();
    }

    public function read()
    {
      $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
      $result = $this->conn->query($query);
      return $result;
    }

  }

 ?>