<?php

namespace Hydrogen\View;

class JsonView extends AbstractView
{
    public function render()
    {
        return json_encode($this->data);
    }
}