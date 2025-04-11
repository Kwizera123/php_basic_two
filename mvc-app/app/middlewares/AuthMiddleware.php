<?php 

class AuthMiddleware{

  public static function isAuthenticated() {
    if(session_status() == PHP_SESSION_NONE){
      session_start();
    }
    return isset($_SESSION['id']) && !empty($_SESSION['id']);
  }

  public static function requiredLogin(){
    if(!self::isAuthenticated()){
      redirect('/user/login');
    }
  }

}