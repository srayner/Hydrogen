<?php

namespace Hydrogen\Mvc;

use Hydrogen\Http\Request;
use Hydrogen\Http\Response;

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
        $response = $this->doRouting();
        $response->render();
    }
    
    protected function doRouting()
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
            return $this->response(404, 'Controller not found.');
        }
        
        if (!method_exists($controllerClass, $controllerAction)) {
            return $this->response(404, 'Action not found.');
        }
        
        // Retrun a response object containing the output buffer as the body.
        $response = New Response(200);
        ob_start();
        $c = new $controllerClass($this->request);
        $c->{$controllerAction}();
        $response->setContent(ob_get_clean());
        return $response;
    }
    
    protected function response($code, $message)
    {
        $response = new Response($code);
        $response->setContent($message);
        return $response;
    }
}