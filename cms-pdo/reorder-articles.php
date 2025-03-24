<?php 
require 'init.php';

if(isPostRequest()){
  


    if(isset($_POST['reorder_articles'])){
      $article = new Article();

      try{
        $article->reorderAndResetAutoIncrement();
        redirect("admin.php");
      } catch (Exception $e) {
        redirect("admin.php");
      }

      

      // if($article->generateDummyData($_POST['article_count'])){
      //   redirect('admin.php');
      // } else {
      //   echo "Something happed, it's failed!";
      // }

    }


  
}

?>
