<?php

class Core{
    protected $controller = 'Page';
    protected $method = 'index';
    protected $params = [];
    
    public function __construct() {
        //-> url //
        if(isset($_GET['url'])){
            $url = explode('/', $_GET['url']);
            $this->controller = ucfirst($url[0]); 
            unset($url[0]);
            $this->method = $url[1];
            unset($url[1]);
            $this->params = array_values($url);
        }  //-> Autoload //`
        spl_autoload_register(function($class){
            $controllerPath = "../app/Controllers/".$class.".php";
            $modelPath = "../app/Models/".$class.".php";
            $libPath = "../app/Lib/".$class.".php";
            if(file_exists($controllerPath)){
                include_once $controllerPath;   
            }
            if(file_exists($modelPath)){
                include_once $modelPath;   
            }
            if(file_exists($libPath)){
                include_once $libPath;   
            }
        });

        $controller = $this->controller."Controller";
        if (class_exists($controller)) {
            $ctrl = new $controller();
            if (method_exists($ctrl, $this->method)) {
                call_user_func_array([$ctrl, $this->method], $this->params);
            } else {
                $this->redirectTo404();
            }
        } else {
            $this->redirectTo404();
        }
    }

    private function redirectTo404() {
        header("Location: ".APPURL.'page/error');
        exit();
    }
}