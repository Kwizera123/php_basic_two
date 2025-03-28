<?php 

  class UserController{

    public function showRegisterForm(){

      $data = [
        'title' => "Register"
      ];

      render('user/register', $data);


    }

    public function register(){

      var_dump($_POST);
    }


  }