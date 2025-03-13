<?php
// 179 Properties

class User {

  //property is just variable
  public $username;

  public function __construct($username)
  {
    $this->username = $username;
  }

  public function setUsername()
  {
    echo $this->username;
  }

}

$user = new User('Sinapy');
echo $user->username;
//$user->setUsername();