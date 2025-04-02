<?php 
  class User {

    private $table = 'users';
    public $id;
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $birthday;
    public $organization;
    public $location;
    public $profile_image;
    public $created_at;
    public $updated_at;

    private $conn;

    public function __construct(){
      $this->conn = Database::getInstance()->getConnection();

    }

    public function store(){
      $query = "INSERT INTO $this->table (username, email, password) VALUES (:username, :email, :password)";
      $stmt = $this->conn->prepare($query);
      $this->username = htmlspecialchars(strip_tags($this->username));
      $this->email = htmlspecialchars(strip_tags($this->email));
      $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);

      $stmt->bindParam(':username', $this->username);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':password', $hashedPassword);

      if($stmt->execute()){
        return true;
      }
      return false;

    }


  }
?>