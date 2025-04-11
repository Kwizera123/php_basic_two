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
        $_SESSION['first_name'] = $this->userModel->first_name;
        $_SESSION['last_name'] = $this->userModel->last_name;
        redirect('/dashboard');
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
         redirect('/dashboard');
       } else {
         echo "There was an error";
       }
    }

    public function logout(){
      $_SESSION = [];
      session_destroy();
      redirect('/user/login');
    }


  }