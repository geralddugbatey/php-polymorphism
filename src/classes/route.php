<?php
require_once 'error.php';
require_once 'home.php';
require_once __DIR__.'/../dbclasses/addAmount.php';
require_once(__DIR__ . '/../connect/db.php');
class Router{

    private array $routes;

    public function register(string $method,string $route, callable|array $action):self  {
        $this->routes[$method][$route]=$action;

        return $this;
    }

    public function post(string $route, callable|array $action):self  {
       

        return $this->register('post',$route,$action);
    }
    public function get(string $route, callable|array $action):self  {
       
            
        return $this->register('get',$route,$action);
    }

    public function resolve(string $url,string $method){
        try{
            $route = explode('?',$url)[0];
            $action= $this->routes[$method][$route] ?? null;
    
            if(!$action){
            
                throw new RouterNotFoundException();
            }
    if(is_callable($action)){
        call_user_func($action);
    }

    if(is_array($action)){
        [$class,$method]=$action;
        
        if(class_exists($class)){
            $class=new $class();
            return call_user_func_array([$class,$method],[]);

        }
    }
    
       
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
      


    }

}