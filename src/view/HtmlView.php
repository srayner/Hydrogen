<?php

namespace Hydrogen\View;

use Exception;

class HtmlView extends AbstractView
{
    protected $templatePath  = 'templates/';
    protected $template = 'default';
    
    public function setTemplatePath($templatePath)
    {
        $this->templatePath = $templatePath;
        return $this;
    }
    
    public function getTemplatePath()
    {
        return $this->templatePath;
    }
    
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }
    
    public function getTemplate()
    {
        return $this->template;
    }
    
    public function render()
    {
        if (file_exists($this->templatePath.$this->template)) {
            include $this->templatePath.$this->template;
        } else {
            throw new Exception('no template named ' . $this->template . ' present in directory ' . $this->templatePath);
        }
    }  
}
