<?php

namespace Berengere\Blog\Core;

use \PDO;

class Database
{

    /**
     * @return PDO
     */
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=myblog;charset=utf8', 'root', 'root');
        return $db;
    }
}