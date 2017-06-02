<?php

namespace App;

class Session extends \SessionHandler
{
    
    protected $settings;
    private $locked;
    
    public function __construct ($settings) {
        
        $defaults = array(
            'expires' => '20 minutes',
            'secret' => 'SECRET',
            'name' => 'MY_SESSION'
        );
        
        $this->settings = array_merge($defaults, (array)$settings);
        
        //convert expires string to time period
        $this->settings['expires'] = strtotime($this->settings['expires']) - time();
        
        $this->setup();
        $this->start();
        
        // check if session has expired
        if ($this->isExpired()) {
            $this->forget();
        }
        
    }
    
    private function setup () {
        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        session_name($this->settings['name']);
    }
    
    public function start() {
        if (session_id() === '') {
            if (session_start()) {
                return true;
            }
        }
        return false;
    }
    
    public function read($id) {
        return mcrypt_decrypt(MCRYPT_3DES, $this->settings['secret'], parent::read($id), MCRYPT_MODE_ECB);
    }
    
    public function write($id, $data) {
        $result = parent::write($id, mcrypt_encrypt(MCRYPT_3DES, $this->settings['secret'], $data, MCRYPT_MODE_ECB));
        $this->unlock();
        return $result;
    }
    
    public function isExpired() {
        
        $last_activity = isset($_SESSION['_last_activity']) ? $_SESSION['_last_activity'] : false;

        // if expires is different than zero check session
        if ($this->settings['expires'] !== 0) {
            if ($last_activity !== false && (time() - $last_activity) > $this->settings['expires']) {
                return true;
            }
        }

        $_SESSION['_last_activity'] = time();
        $this->unlock();
        return false;
    }
    
    private function lock() {
        if (!$this->locked) {
            session_start();
            $this->locked = true;
        }
    }
        
    private function unlock () {
        session_write_close();
        $this->locked = false;
    }
    
    public function forget () {
        if (session_id() === '') {
            return false;
        }
        $_SESSION = [];
        $this->unlock();
    }
    
    public function get($name) {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }
    
    public function put($name, $value) {
        $this->lock();
        $_SESSION[$name] = $value;
        $this->unlock();
    }
        
    public function remove ($key) {
        $this->lock();
        unset($_SESSION[$key]);
        $this->unlock();
    }
    
}
