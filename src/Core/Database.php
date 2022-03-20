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
    protected function dbConnect()
    {
        if ($this->database === null) {
            $db = new \PDO('mysql:host=localhost;dbname=myblog;charset=utf8', 'root', 'root');
            return $db;
        }
        return $this->database;
    }

    /**
     * @param $sql
     * @param null $parameters
     * @param null $binds
     * @return bool|false|\PDOStatement
     */
    protected function sql($sql, $parameters = null)
    {

        if ($parameters) {
            $result = $this->dbConnect()->prepare($sql);

            $result->execute($parameters);

            return $result;
        } else {
            $result = $this->dbConnect()->query($sql);
            return $result;
        }
    }
}
