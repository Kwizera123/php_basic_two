<?php 

function render($view, $data = [], $layout = 'layout'){

  // extracting variables
  extract($data);

  ob_start();

  // including specific files inside view
  require __DIR__ . '/views/' . $view . '.php';

  $content = ob_get_clean();

  require __DIR__ ."/views/" . $layout . ".php";


}

?>