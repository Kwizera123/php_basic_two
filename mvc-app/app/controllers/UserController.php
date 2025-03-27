<?php 

  class UserController{

    public function register(){

      $data = [
        'title' => "Register"
      ];

      render('user/register', $data);


    }

    public function registerUser(){

      var_dump($_POST);
    }
  }