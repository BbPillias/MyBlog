<?php

namespace Berengere\Blog\Manager;

use Berengere\Blog\Core\Database;

class UserManager extends Database
{

    /**
     * Add a User
     *
     * @param $user
     * @return bool|false|\PDOStatement
     */
    public function user($username, $email, $password)
    {
        $db = $this->dbConnect();
        $newUser = $db->prepare('INSERT INTO users ( username, email, password) VALUES ( ?, ?, ?');
        $affectedLines = $newUser->execute(array($username, $email, $password));

        return $affectedLines;
    }

}