<?php

namespace App;
use  \Slim\Slim;

class Database
{
    
    protected $host;
    protected $dbname;
    protected $user;
    protected $pass;
    
    public function __construct($config) {
        $this->host   = $config['host'];
        $this->dbname = $config['dbname'];
        $this->user   = $config['user'];
        $this->pass   = $config['pass'];
    }
    
    public function connect () {
        
        // get app instance
        $app = Slim::getInstance();
        
        try {
            
            $pdo = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
            
            // prevent PDO to turn all data to str 
            $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            
            $pdo->exec("SET CHARACTER SET utf8");
            return $pdo;
            
        } catch (\PDOException $e) {
            
            // write log message
            $app->log->error($e->getMessage());
            
            //throw exeption with user message
            throw new \Exception('Could not connect to database');
            
        }
        
    }
}
