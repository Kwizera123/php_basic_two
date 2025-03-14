<?php

  class User {
    // Public propert: accessible from anywhere
    public $name = "Kwizera";

    // Protected propert: accessible within the class and subclasses
    protected $email = "kwizera@gmail.com";

    // Private propert: accessible only within this class
    private $password = "secret123";

    public function displayEmail()
    {
      return $this->email;
    }

    public function displayPassword()
    {
      return $this->password;
    }
  }

 

 // echo $user->displayEmail();

 class AdminUser extends User {

  public function getEmailagain()
  {
    return $this->email . "FROM ADMIN CLASS";
  }

  public function displayFromAdmin()
  {
    return $this->password;
  }
 }


  // $user = new User();
  // echo $user->displayPassword();

     $admin = new AdminUser();
     echo $admin->displayFromAdmin();

  //  echo $admin->getEmailagain();
 ?>