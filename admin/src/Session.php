<?php

namespace App;

/**
 * Session
 * Extends SessionHandler and implement mcript and session expire
 * 
 * @property array $settings
 * @property bool $locked
 */
class Session extends \SessionHandler
{
    
    /**
     * @var array $settings
     */
    protected $settings;
    
    /**
     * @var bool $locked
     */
    private $locked;
    
    /**
     * Construct
     * @param array $settings Session settings
     */
    public function __construct ($settings) {
        
        // default settings
        $defaults = array(
            'expires' => '20 minutes',
            'secret' => '__SECRET_SECRET_SECRET__',
            'name' => 'MY_SESSION'
        );
        
        // merge settings
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
    
    /**
     * Setup session settings
     */
    private function setup () {
        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        session_name($this->settings['name']);
    }
    
    /**
     * Start session
     */
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
    
    /**
     * Check if session has expired
     * @return bool
     */
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
    
    /**
     * Lock session to write
     */
    private function lock() {
        if (!$this->locked) {
            session_start();
            $this->locked = true;
        }
    }
        
    /**
     * Unlock session
     */
    private function unlock () {
        session_write_close();
        $this->locked = false;
    }
    
    /**
     * Unset all session data
     */
    public function forget () {
        if (session_id() === '') {
            return false;
        }
        $_SESSION = [];
        $this->unlock();
    }
    
    /**
     * Get
     * @param string $name Session key
     * @return mixed Session value if found NULL if not found
     */
    public function get($name) {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }
    
    /**
     * Put
     * @param string $name Session key
     * @param mixed Session value
     */
    public function put($name, $value) {
        $this->lock();
        $_SESSION[$name] = $value;
        $this->unlock();
    }
       
    /**
     * Remove
     * @param string $name Session key
     */
    public function remove ($key) {
        $this->lock();
        unset($_SESSION[$key]);
        $this->unlock();
    }
    
}
