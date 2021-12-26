<?php

namespace Berengere\Blog\Manager;



class SessionManager
{

    private bool $isStarted = false;
    private static $instance;

    private function __construct()
    {
        
    }

    /**
    *    Returns THE instance of 'Session'.
    *    The session is automatically initialized if it wasn't.
    *   
    *    @return    object
    **/
   
    public static function getInstance()
    {
        if ( !isset(self::$instance))
        {
            self::$instance = new self;
        }
       
        self::$instance->start();
       
        return self::$instance;
    }

    public function start()
    {
        if (!$this->isStarted) {
            $this->isStarted = session_start();
        }
    }

    public function set(string $name, $value)
    {
        $_SESSION[$name] = $value;

    }

    public function get(string $name)
    {
        if ( isset($_SESSION[$name]))
        {
            return $_SESSION[$name];
        }
    }
}
