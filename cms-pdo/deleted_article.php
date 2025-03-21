<?php 

require_once "init.php";

checkUserLoggedIn();

if(isPostRequest()){
  
  $id = $_POST['id'];
  $artcle = new Article();


  if($artcle->deleteWithImage($id)){
    redirect("admin.php");
  } else {
    echo "Failed to delete the article";
  }
}