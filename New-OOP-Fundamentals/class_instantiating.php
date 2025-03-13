<?php 

class User{
  public function create(){
      //echo "creating user";
      return "creating user";
  }
}
// This is an instance of this User blueprint
$user = new User();
$admin = new User();

// $user->create();
echo $user->create();
echo "<br>";
echo $admin->create();