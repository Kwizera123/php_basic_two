<?php

    class Route {
      
        protected $routes = [
            'GET' => [],
            'POST' => [],
        ];

        public function get($path, $handler){
            
            $this->routes['GET'][$this->formatRoute($path)] = $handler;

        }

        public function post($path, $handler){
            $this->routes['GET'][$this->formatRoute($path)] = $handler;
        }

        protected function formatRoute($route){
            return '/' . trim($route, '/');
        }

        public function dispatch() {
            $method = $_SERVER['REQUEST_METHOD'];
            $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $cleanedRequest = $this->formatRoute($requestUri);

            if($this->match($method, $cleanedRequest)){
                $handler = $this->match($method, $cleanedRequest);

                echo "<pre>";
                print_r($handler);
                echo "</pre>";

                var_dump($handler);
            }

        }

        public function match($method, $requestUri){
            
            foreach ($this->routes[$method] as $route => $handler) {
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
    }

?>