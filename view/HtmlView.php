<?php

namespace Hydrogen\View;

class HtmlView extends AbstractView
{
    protected $templatePath  = 'templates/';
    
    public function setTemplatePath($templatePath)
    {
        $this->templatePath = $templatePath;
        return $this;
    }
    
    public function getTemplatePath()
    {
        return $this->templatePath;
    }
    
    public function render($template)
    {
        if (file_exists($this->templatePath.$template)) {
            include $this->templatePath.$template;
        } else {
            throw new Exception('no template named ' . $template . ' present in directory ' . $this->templatePath);
        }
    }  
}
