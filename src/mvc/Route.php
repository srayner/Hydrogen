<?php

namespace Hydrogen\Mvc;

class Route
{
    public $method;
    public $pattern;
    public $controller;
    public $action;
    
    public function __construct($method, $pattern, $controller = null, $action = null)
    {
        $this->method = $method;
        $this->pattern = $pattern;
        $this->controller = $controller;
        $this->action = $action;
    }   
}
