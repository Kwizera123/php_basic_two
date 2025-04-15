<?php

    class Router {
      
        protected static $routes = [
            'GET' => [],
            'POST' => [],
        ];

        protected static $nameRoutes = [];
        protected static $lastAddedRoute = null;
        public static function get($path, $handler){

            $formattedPath = self::formatRoute($path);
            self::$routes['GET'][$formattedPath] = $handler;
            self::$lastAddedRoute = $formattedPath;
            return new static;
        }

        public static function post($path, $handler){
            $formattedPath = self::formatRoute($path);
            self::$routes['POST'][$formattedPath] = $handler;
            self::$lastAddedRoute = $formattedPath;
            return new static;

        }

        public static function name($routeName){

            if(self::$lastAddedRoute !== null){
                self::$nameRoutes[$routeName] = self::$lastAddedRoute;
                self::$lastAddedRoute = null;
            } else {
                throw new Exception("No route available for named $routeName");
            }

            return new static;
        }

        public static function route($name, $params = []){
            if(!isset(self::$nameRoutes[$name])){
                throw new Exception("Route $name does not exist");
            }
            $route = self::$nameRoutes[$name];

            foreach($params as $key => $value){
                $route = str_replace('{'.$key.'}', $value, $route);
            }
            return $route;
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
            } else {
                http_response_code(404);
                self::error404();
            }

        }

        protected static function error404(){
            $data = [
                'title' => '404 - Not Found',
                'message' => 'Sorry! The page you are looking for could not be found'
            ];
            render('errors/404', $data);
        }

        protected static function render404(){
            require_once views_path('errors/404.php');
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