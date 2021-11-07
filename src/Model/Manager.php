<?php

namespace Berengere\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=myblog;charset=utf8', 'root', 'root');
        return $db;
    }
}
