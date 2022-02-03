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
        $req = $this->dbConnect()
            ->prepare('INSERT INTO users (username, email, password) VALUES ( ?, ?, ?)');

        return $req->execute([$username, $email, $password]);
    }

    public function login($email, $password)
    {
        $req = $this->dbConnect()
            ->prepare('SELECT user_id, email, username, user_status FROM users WHERE email = :email AND password = :password');

        $req->execute(compact('email', 'password'));
       
        return  $req->fetch();
        
    }
}
