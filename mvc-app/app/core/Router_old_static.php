<?php

    class Router {
      
        protected static $routes = [
            'GET' => [],
            'POST' => [],
        ];

        public static function get($path, $handler){
            self::$routes['GET'][self::formatRoute($path)] = $handler;
        }

        public static function post($path, $handler){
          self::$routes['POST'][self::formatRoute($path)] = $handler;
        }

        protected static function formatRoute($route){
            return '/' . trim($route, '/');
        }

        public static function dispatch() {
            $method = $_SERVER['REQUEST_METHOD'];
            $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $cleanedRequest = self::formatRoute($requestUri);
            if(self::match($method, $cleanedRequest)){
                $handler = self::match($method, $cleanedRequest);
                list($controller, $action) = explode('@', $handler['handler']);
                $params = $handler['params'];
                self::callAction($controller, $action, $params);


            }

        }

        public static function match($method, $requestUri){
            
            foreach (self::$routes[$method] as $route => $handler) {
                $pattern = preg_replace('#\{[a-zA-Z0-9_]+}#', '([a-zA-Z0-9_]+)', $route);
 
                if(preg_match('#^' . $pattern . '$#',$requestUri, $matches)){
 
                 array_shift($matches);
                 
                 return [
                     'handler' => $handler,
                     'params' => $matches
                 ];
                 
                 };
             }
             return false;
        }

        protected static function callAction($controller, $action, $params = [])
        {
            require_once base_path('/app/controllers/') . '/' . $controller . '.php';
            $controllerInstance = new $controller();
            call_user_func_array( [$controllerInstance, $action], $params);
        }
    }

?>