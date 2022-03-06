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
     * @var string $mail user eemail
     */
    private $email;

    /**
     * @var string $password password
     */
    private $password;

    /**
     * @var string $user_status user status
     */
    private $status;

    public function __construct($datas = [])
    {
        $this->userId = (int) $datas['user_id'];
        $this->username = $datas['username'];
        $this->email = $datas['email'];
        $this->password = $datas['password'];
        $this->status = $datas['user_status'];
    }

    /**
     * @param mixed $userid
     * @return User
     */
    public function setUserId($userid)
    {
        $this->userId = $userid;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return User
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
        return $this;
    }
}
