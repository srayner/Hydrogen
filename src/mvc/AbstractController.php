<?php

namespace Hydrogen\Mvc;

use Hydrogen\Http\Request;
use Hydrogen\Http\Response;

abstract class AbstractController
{
    protected $request;
    
    protected $response;
    
    public function setRequest(Request $request)
    {
        $this->request = $request;
        return $this;
    }
    
    public function getRequest()
    {
        return $this->request;
    }
    
    public function setResponse(Response $response)
    {
        $this->response = $response;
        return $this;
    }
}