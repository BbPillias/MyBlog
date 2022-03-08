<?php

namespace Berengere\Blog\Manager;

use Berengere\Blog\Core\Database;
use Berengere\Blog\Model\User;

class UserManager extends Database
{

    /**
     * Add a User
     *
     * @param $newUser
     * @return bool|false|\PDOStatement
     */
    public function user($username, $email, $password)
    {
        $req = $this->dbConnect()
            ->prepare('INSERT INTO users (username, email, password) VALUES ( ?, ?, ?)');

        return $req->execute([$username, $email, $password]);
    }

    /**
     * Return User Information
     *
     * @param $email
     * @param $password
     * @return mixed
     */
    public function login($email, $password)
    {
        $req = $this->dbConnect()
            ->prepare('SELECT user_id, email, username, user_status FROM users WHERE email = :email AND password = :password');

        $req->execute(compact('email', 'password'));

        return  $req->fetch();
    }
}
