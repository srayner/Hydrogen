<?php

namespace Hydrogen\Http;

use InvalidArgumentException;

class Response
{
    protected $code;
    protected $message = array(
        200 => 'OK',
        301 => 'Moved Permanently',
        403 => 'Forbidden',
        404 => 'Not found',
        500 => 'Internal Server Error'
    );

    public function __construct($code = null)
    {
        $this->code = 200;
        if ($code) {
            if (array_key_exists($code, $this->message)) {
                $this->code = $code;
            } else {
                throw new InvalidArgumentException;
            }
        }
    }

    public function getCode()
    {
        return $this->code;
    }
    
    public function getMessage()
    {
        return $this->message[$this->code];
    }
}

