<?php

namespace Berengere\Blog\Core;

use \PDO;

class Database
{
    /**
     * @var
     */
    protected $database;

    /**
     * @return PDO
     */
    // protected function dbConnect()
    // {
    //     $db = new \PDO('mysql:host=localhost;dbname=myblog;charset=utf8', 'root', 'root');
    //     // array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    //     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    //     return $db;
    // }
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=myblog;charset=utf8', 'root', 'root');
        return $db;
    }
}