<?php

/**
 * A class to represent an MVC application.
 * 
 * @author Steve Rayner (srayner02@gmail.com)
 */

namespace Hydrogen\Mvc;

use Hydrogen\Http\Request;
use Hydrogen\Router\Router;

class Application
{   
    /**
     * Constructor
     * 
     * @param Router $router
     * @param Request $request
     */
    public function __construct(Router $router, Request $request)
    {
        $this->router = $router;
        $this->request = $request;
    }
    
    /**
     * Runs the MVC application.
     */
    public function run()
    {
        $routeMatch = $this->router->route($this->request);
        if ($routeMatch) {
            $controllerClass = __NAMESPACE__ . '\\Controller\\' . $routeMatch->controller . 'Controller';
            $action = $routeMatch->action . 'Action';
            $controller = new $controllerClass();
            $controller->$action();
        }
    }
}