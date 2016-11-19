<?php

/* 
 * Http request.
 */

namespace Hydrogen\Http;

class Request
{
    protected $method;
    protected $uri;
    
    public function __construct()
    {
        $this->method = filter_var($_SERVER['REQUEST_METHOD'], FILTER_SANITIZE_STRING);
        $this->uri = substr(filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL), 1);
    }
    
    public function method()
    {
        return $this->method;
    }
    
    public function query($param, $default = null)
    {
        $value = filter_input(INPUT_GET, $param, FILTER_SANITIZE_STRING);
        return $value ? $value : $default;
    }
    
    public function param($param, $default = null)
    {
        $value = filter_input(INPUT_POST, $param, FILTER_SANITIZE_STRING);
        return $value ? $value : $default;
    }
    
    public function uri()
    {
        return $this->uri;
    }
    
    public function isGet()
    {
        return ($this->method == 'GET');
    }
    
    public function isPost()
    {
        return ($this->method == 'POST');
    }
    
    public function isPut()
    {
        return ($this->method == 'PUT');
    }
    
    public function isPatch()
    {
        return ($this->method == 'PATCH');
    }
    
    public function isDelete()
    {
        return ($this->method == 'DELETE');
    }
}

