<?php

namespace App;

class Session
{
    
    public function __construct ($path, $name) {
        session_start();
    }
    
    public function read ($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
        session_write_close();
    }
    
    public function write ($key, $data) {
        $_SESSION[$key] = $data;
        session_write_close();
    }
    
    public function remove ($key) {
        unset($_SESSION[$key]);
        session_write_close();
    }


    public function destroy () {
        session_destroy();
    }
    
}
