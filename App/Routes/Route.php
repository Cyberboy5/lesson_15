<?php
namespace App\Routes;


class Route{


    public $request;
    public static array $routes = [];

    public function __construct(Request $requests){
        $this->request = $requests;
    }

    public static function get($path, $action){
        self::$routes['get'][$path] = $action;
    }

    public static function post($path, $action){
        self::$routes['post'][$path] = $action;
    }
    
    
    
    public function action(){
        $path = $this->request->url();
        $method = $this->request->method();
        echo '<pre>';
        print_r($method);
        // print_r(self::$routes['get'][$path]);
        print_r(self::$routes[$method][$path]);
        echo '</pre>';


        $action = self::$routes[$method][$path] ?? false;

        if(!$action){
            echo "404 Not Found:" . $path; 
        }

        if(is_array($action)){
            $controller = new $action[0]();
            $controller->{$action[1]}();
        }
    }
    }



?>