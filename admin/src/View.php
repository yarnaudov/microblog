<?php

namespace App;

use \App\Models\UserModel;

/*
 * Simple view class to allow use of layouts
 */
class View extends \Slim\View
{
    private $layout = 'layout.php';
    
    public function setlayout ($layout) {
        $this->layout = $layout;
    }
    
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