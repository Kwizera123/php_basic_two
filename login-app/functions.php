<?php

function is_user_logged_in() {
  return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

function redirect($location){
  header("Location: login.php");
  exit;
}

function setActiveClass($pageName){
  $current_page = basename($_SERVER['PHP_SELF']); 
  return ($current_page === $pageName) ? "active": '';
}

function getPageClass(){
  return basename($_SERVER['PHP_SELF'],".php"); 
}

function full_month_date($date){
  return  $date = date("F j", strtotime($date));
}

