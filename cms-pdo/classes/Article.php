<?php 

  class Article {
    
    private $conn;
    private $table = 'articles';
    public function __construct()
    {
      $database = new Databse();
      $this->conn = $database->getConnection();
    }

    public function getExcerpt($content, $length = 100)
    {
      if(strlen($content) > $length){
        return substr($content, 0, $length) . "...";
      }
      return $content;
    }

    public function get_all()
    {
      $query = " SELECT * FROM " . $this->table . " ORDER BY id DESC";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getArticleById($id)
    {
      $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $article = $stmt->fetch(PDO::FETCH_OBJ);// magic happens here

      if($article){
        if($article->user_id == $_SESSION['user_id']){
          return $article;
        } else {
          redirect("admin.php");
        }

      } else {
        return false;
      }
    }

    public function deleteWithImage($id)
    {
      $article = $this->getArticleById($id);

      if($article){
        // Check for user ownship
        if($article->user_id == $_SESSION['user_id']){

        if(!empty($article->image) && file_exists($article->image)){

          if(!unlink($article->image)){
            return false;
          }
        }

        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();

        } else {
          redirect("admin.php");
        }
      }
      return false;
    }

    public function getArticleWithOwnerById($id)
    {
      $query = "SELECT 
                  articles.id,
                  articles.title,
                  articles.content,
                  articles.image,
                  articles.created_at,
                  users.username As author,
                  users.email AS author_email
                FROM " . $this->table . "
                JOIN users ON articles.user_id = users.id
                WHERE articles.id = :id LIMIT 1";

      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $article = $stmt->fetch(PDO::FETCH_OBJ);// magic happens here

      if($article){
        return $article;
      } else {
        return false;
      }


      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $article = $stmt->fetch(PDO::FETCH_OBJ);// magic happens here

      if($article){
        return $article;
      } else {
        return false;
      }

    }

      public function getArticlesByUser($userId){
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }

    public function formatCreatedAt($date)
    {
      return date('F j, Y', strtotime($date));
    }
    
    public function create($title, $content, $author_id, $created_at, $image)
    {
      $query = "INSERT INTO " . $this->table . " (title, content, user_id, created_at, image)
                VALUES (:title, :content, :user_id, :created_at, :image)";

                $stmt = $this->conn->prepare($query);

                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':content', $content);
                $stmt->bindParam(':user_id', $author_id);
                $stmt->bindParam(':created_at', $created_at);
                 $stmt->bindParam(':image', $image);

                return $stmt->execute();

       
    }

    public function uploadImage($file)
    {

      $targetDir = 'uploads/';

      if(!is_dir($targetDir)){
          mkdir($targetDir, 0755, true);
      }
  
      if(isset($file) && $file['error'] === 0){
  
          $targetFile = $targetDir . basename($file['name']);
          $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
          $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
  
          if(in_array($imageFileType, $allowedTypes)){
  
              $uniqueFileName = uniqid() . "_" . time() . "." . $imageFileType;
              $targetFile = $targetFile . "_" . $uniqueFileName;
  
              if(move_uploaded_file($file['tmp_name'], $targetFile)){
                  return $targetFile;
              } else {
                  return "There was an error uploading the file";
              }
  
          } else {
              return "Only JPG, JPEG, PNG, and GIF files are allowed";
          }
  
      }

      return '';

    }

    public function update($id, $title, $content, $author_id, $created_at, $imagePath = null)
    {
      $query = "UPDATE " . $this->table . "
                SET title = :title, content = :content, user_id = :user_id, created_at = :created_at";

        if($imagePath){
          $query .= ", image = :image";
        }

        $query .= " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':user_id', $author_id);
        $stmt->bindParam(':created_at', $created_at);

        if($imagePath){
          $stmt->bindParam(':image', $imagePath, PDO::PARAM_STR);
        }
          return $stmt->execute();
    }
    
    public function generateDummyData($num = 1)
    {
      $query = "INSERT INTO " . $this->table . " (title, content, user_id, created_at, image)
        VALUE (:title, :content, :user_id, :created_at, :image)";

        $stmt = $this->conn->prepare($query);

        $dummy_titles = [
            'The Dramatically recaptiualize', 'Proactively plagiarize.',
            'Uniquely matrix.', 'Appropriately grow excellent..',
            'Appropriately drive reliable.', 'Seamlessly reinvent premium..',
            'Interactively deliver inexpensive', 'Enthusiastically conceptualize focused.',
            'Quickly strategize 24/365.', 'Assertively exploit effective.'
        ];

        $dummy_content = "Holisticly expedite go forward e-services without team driven benefits. Authoritatively monetize 2.0 web-readiness vis-a-vis e-business customer service. Phosfluorescently administrate inexpensive value vis-a-vis fully tested models. Proactively visualize business experiences without.";
        $dummy_image = "https://placehold.co/350x200";
        $user_id = 11;
        $created_at = date('Y-m-d H:i:s');

        for($i = 0; $i < $num; $i++){

          $title = $dummy_titles[array_rand($dummy_titles)];
          $stmt->bindParam(':title', $title);
          $stmt->bindParam(':content', $dummy_content);
          $stmt->bindParam(':user_id', $user_id);
          $stmt->bindParam(':created_at', $created_at);
          $stmt->bindParam(':image', $dummy_image);

          $stmt->execute();

        }
        return true;
    }

    public function reorderAndResetAutoIncrement(){

      // Transaction as whole (Big unit of steps
      try{
        // DB Transaction
        $this->conn->beginTransaction();

        $query = "SELECT id FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Update each Articles ID's sequentially
        $newId = 1;

        foreach($articles as $article){
          $updateQuery = "UPDATE " . $this->table . " SET id = :newId WHERE id = :old_id";
          $updateStmt = $this->conn->prepare($updateQuery);
          $updateStmt->bindParam(':newId', $newId, PDO::PARAM_INT);
          $updateStmt->bindParam(':old_id', $article->id, PDO::PARAM_INT);
          $updateStmt->execute();
          $newId++;
        }

        // Reset Auto_Increment

        $nextAutoIncrementId = $newId;

        $resetQuery = "ALTER TABLE " . $this->table . " AUTO_INCREMENT = :next_auto_increment";
        $resetStmt = $this->conn->prepare($resetQuery);
        $resetStmt->bindParam(':next_auto_increment', $nextAutoIncrementId, PDO::PARAM_INT);
        $resetStmt->execute();

        $this->conn->commit();
        return true;

      } catch (Exception $exception){

        $this->conn->rollBack();
        throw $exception;
      }
    }

    public function deleteMultiple($artcleIds)
    {
      $placeholders = implode(',', array_fill(0, count($artcleIds), '?'));
      $query = "DELETE FROM " . $this->table . " WHERE id IN ($placeholders)";
      $stmt = $this->conn->prepare($query);
      return $stmt->execute($artcleIds);
    }


  }




?>