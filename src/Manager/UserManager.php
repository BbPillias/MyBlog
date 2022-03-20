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
    public function newUser($username, $email, $password)
    {
        $newUser = 'INSERT INTO users (username, email, password) VALUES ( :username, :email, :password)';
        $parameters = [
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
        ];

        $this->sql($newUser, $parameters);
    }

    /**
     * Return User Information
     *
     * @param $email
     * @param $password
     * @return mixed
     */
    public function login(string $email, string $password): ?User
    {
        $login = $this->dbConnect()
            ->prepare('SELECT user_id, email, username, user_status FROM users WHERE email = :email AND password = :password');

        $login->execute(compact('email', 'password'));
        $result = $login->fetch();
        if (!$result) {
            return null;
        }
        return new User($result);
    }
}
