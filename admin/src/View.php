<?php

namespace App;

/**
 * View
 * Simple view class to allow use of layouts
 * 
 * @property string $layout
 */
class View extends \Slim\View
{
    /**
     * @var string Layout
     */
    private $layout = 'layout.php';
    
    /**
     * Set layout
     * @param string $layout
     */
    public function setlayout ($layout) {
        $this->layout = $layout;
    }
    
    /**
     * Render
     * @param string $template
     * @param string $data Data to bind to template
     * @return string Template html
     */
    public function render ($template, $data = null) {
        
        $content = parent::render($template, $data);
        
        // skip layout render if not set
        if ($this->layout) {
            return parent::render($this->layout, [
                'content' => $content
            ]);
        }
        
        return $content;
        
    }
}
