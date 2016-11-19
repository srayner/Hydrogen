<?php

namespace Hydrogen\View;

class JsonView extends Hydrogen\View\AbstractView
{
    public function render()
    {
        return json_encode($this->data);
    }
}