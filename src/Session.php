<?php

namespace App;

class Session
{
    
    public function __construct ($path, $name, $expire) {
        
        if ($path) {
            session_save_path($path);
        }
        if ($name) {
            session_name($name);
        }
        if ($expire) {
            session_cache_expire($expire);
        }
        
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
