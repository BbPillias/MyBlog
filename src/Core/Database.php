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
            $db = require __DIR__ . './../Config/config.database.php';
            return new PDO(
                'mysql:host=' . $db['db_host'] . ';dbname=' . $db['db_name'] . ';charset=utf8',
                $db['db_user'],
                $db['db_password'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
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
