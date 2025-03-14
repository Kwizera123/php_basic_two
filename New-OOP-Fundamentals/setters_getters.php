<?php

    class User {
     private $name;
     private $email;

     public function __construct($name, $email)
     {
        $this->setEmail($email);
      // $this->email = $email;
      // $this->name = $name;
     }

      public function getEmail()
     {
        return $this->email;
     }

      public function setEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
          $this->email = $email;
        } else {
          echo "Not a valid email";
        }
      }

      public function displayUserInfo()
      {
          return "User: " . $this->getEmail();
      }


    }

    $user = new User('Kwizera Theo', 'kwizera@gmail.com');
 
    $user->setEmail('kwizeratheo@gmail.com');

    //echo $user->getEmail();
    echo $user->displayUserInfo() . "<br>";

    $user->setEmail('kwizeratheoagain@gmail.com');
    echo $user->displayUserInfo();
 ?>