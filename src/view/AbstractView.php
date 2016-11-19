<?php

namespace Hydrogen\View;

use Hydrogen\Http\Response;

abstract class AbstractView
{
    protected $data = array();
    
    protected $response;
   
    public function __construct(array $data = null)
    {
        if ($data)
        {
            $this->data = $data;
        }
    }
    
    public function __get($name)
    {
        return $this->data[$name];
    }
    
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
        return $this;
    }
    
    public function setResponse(Response $response)
    {
        $this->response = $response;
        return $this;
    }
    
    public function getResponse()
    {
        return $this->response;
    }
    
    public abstract function render();
}