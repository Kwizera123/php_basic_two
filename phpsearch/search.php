<?php  

    if($_SERVER['REQUEST_METHOD'] == "GET"){

      $search_query = htmlspecialchars(trim($_GET["query"]));

      if(!empty($search_query)){
        echo "Search: " . $search_query;

      }else{
        echo "Please enter a search query";
      }

    }