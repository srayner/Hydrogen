<?php

namespace Hydrogen\Mvc;

use Hydrogen\Http\Request;
use Exception;

class Router
{
    protected $request;
    protected $controllerNamespace;
    
    public function __construct(Request $request, $controllerNamespace)
    {
        $this->request = $request;
        $this->controllerNamespace = $controllerNamespace;
    }
    
    public function route()
    {
        $urlParts = explode('/', rtrim($this->request->uri(), "/"));
        
        $controller = $urlParts[0];
        if ($controller == '') {
            $controller = 'index';
        }
        $controllerClass = '\\' . $this->controllerNamespace . '\\' . ucfirst($controller) . "Controller";
        
        $action = 'index';
        if (count($urlParts) > 1) {
            $action = $urlParts[1];
        }
        $controllerAction = $action . 'Action';
        
        if (!class_exists($controllerClass)) {
            throw new Exception('Cannot route request - Controller not found.');
        }
        
        if (!method_exists($controllerClass, $controllerAction)) {
            throw new Exception('Cannot route request - Action not found.');
        }
        
        $c = new $controllerClass($this->request);
        $c->{$controllerAction}();
    }
}