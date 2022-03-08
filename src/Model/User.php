<?php

namespace Berengere\Blog\Model;

class User
{
    /**
     * @var int $user_id user ID
     */
    private $userId;

    /**
     * @var string $username user name
     */
    private $username;

    /**
     * @var string $mail user email
     */
    private $email;

    /**
     * @var string $password password
     */
    private $password;

    /**
     * @var string $user_status user status
     */
    private $userStatus;

    public function __construct($datas = [])
    {
        $this->userId = (int) $datas['user_id'];
        $this->username = $datas['username'];
        $this->email = $datas['email'];
        $this->password = $datas['password'];
        $this->userStatus = $datas['user_status'];
    }

    /**
     * @param mixed $userid
     * @return User
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return User
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword(int $password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserStatus()
    {
        return $this->userStatus;
    }

    /**
     * @param string $userStatus
     * @return User
     */
    public function setUserStatus(int $userStatus)
    {
        $this->status = $userStatus;
        return $this;
    }
}
