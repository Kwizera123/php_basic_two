<?php 
require 'init.php';

if(isPostRequest()){
  
  $article = new Article();

    if(isset($_POST['reorder_articles'])){

      $article->reorderAndResetAutoIncrement();
      redirect("admin.php");
      

      if($article->generateDummyData($_POST['article_count'])){
        redirect('admin.php');
      } else {
        echo "Something happed, it's failed!";
      }

    }


  
}

?>
