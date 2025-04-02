<?php 

  class UserController{

    public function showRegisterForm(){

      $data = [
        'title' => "Register"
      ];

      render('user/register', $data);

    }

    public function register(){


       $user = new User();
       $user->username = $_POST['username'];
       $user->email = $_POST['email'];
       $user->password = $_POST['password'];

       if($user->store()){
         redirect('/');
       } else {
         echo "There was an error";
       }
    }


  }