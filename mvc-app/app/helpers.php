<?php 

// BASE URL
function base_url($path = '') {

  // if(defined('BASE_URL')) {
  //   return BASE_URL . ltrim($path, '/');
  // }

  // https:// or http://
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 ? "https://" : "http://";

  //  server.com/
  $host = $_SERVER['HTTP_HOST'];

  // blog/
  $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

  return $protocol . $host . $base . '/' . ltrim($path, '/');
}

function base_path($path = '') {
  return realpath(__DIR__ . '/../' . '/' . ltrim($path, '/'));
}

function views_path($path = ''){
  return base_path('app/views/' . ltrim($path, '/'));

}

function redirect($path = '', $queryParams = []){
  $url = base_url($path);
  if(!empty($queryParams)){
    $url .= "?" . http_build_query($queryParams);
  }
  header("Location: " . $url);
  exit();
}




function render($view, $data = [], $layout = 'layout'){

  // extracting variables
  extract($data);

  ob_start();

  // including specific files inside view
  require views_path($view . '.php');

  $content = ob_get_clean();

  require views_path($layout . ".php");
}

function config($key){
  $config = require base_path('config/config.php');
  $key = explode('.', $key);
  $value = $config;

  foreach($keys as $k){
    if(!isset($value[$k])){
      throw new Exception("Config key '{$k}' not found");
    }
    $value = $value[$k];
  }
  return $value;
}

?>