<?php

namespace App;
use  \Slim\Slim;

/**
 * Database
 *
 * @property string $host
 * @property string $dbname
 * @property string $user
 * @property string $pass
 */
class Database
{
    /**
     * @var string DB host
     */
    protected $host;
    
    /**
     * @var string DB name
     */
    protected $dbname;
    
    /**
     * @var string DB user
     */
    protected $user;
    
    /**
     * @var string DB password
     */
    protected $pass;
    
    /**
     * Constructor
     * @param array $config Setting for DB connection
     */
    public function __construct($config) {
        $this->host   = $config['host'];
        $this->dbname = $config['dbname'];
        $this->user   = $config['user'];
        $this->pass   = $config['pass'];
    }
    
    /**
     * Connect to DB
     * @return \PDO
     */
    public function connect () {
        
        try {
            
            // initialize PDO
            $pdo = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
            
            // prevent PDO to turn all data to str 
            $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            
            // set character set to utf8
            $pdo->exec("SET CHARACTER SET utf8");
            
            return $pdo;
            
        } catch (\PDOException $e) {
            
            // get app instance
            $app = Slim::getInstance();
        
            // write log message
            $app->log->error($e->getMessage());
            
            //throw exeption with user message
            throw new \Exception('Could not connect to database');
            
        }
        
    }
}
