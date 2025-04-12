<?php 

class AuthMiddleware{

  public static function isAuthenticated() {
    if(session_status() == PHP_SESSION_NONE){
      session_start();
    }
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
  }

  public static function requiredLogin(){
    if(!self::isAuthenticated()){
      redirect('/user/login');
    }
  }

}