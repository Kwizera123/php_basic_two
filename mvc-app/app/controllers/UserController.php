<?php 

  class UserController{

    private $userModel;

    public function __construct() {
      $this->userModel = new User();
    }

    public function showLoginForm(){

      $data = [
        'title' => "Login"
      ];

      render('user/login', $data);

    }

    public function loginUser(){
      $this->userModel->email = $_POST['email'];
      $this->userModel->password = $_POST['password'];

      if($this->userModel->login()){
        $_SESSION['id'] = $this->userModel->id;
        $_SESSION['username'] = $this->userModel->username;
        redirect('/');
      } else {
        echo "There was an error";
      }
    }

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