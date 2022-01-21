<?php

namespace Berengere\Blog\Controller;

use Exception;
use \Berengere\Blog\Manager\UserManager;
use \Berengere\Blog\Manager\SessionManager;

class LoginController
{
    private UserManager $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function connect($email, $password)
    {
        $loginUser = $this->userManager->login($email, $password);
       

        if ($loginUser === false) {
            throw new Exception('email ou mot de passe incorrect !');
        } else {
            $session = SessionManager::getInstance();

            $session->set('email', $email);
            $session->set('username', $loginUser['username']);
            $session->set('user_status', $loginUser['user_status']);
            $session->set('user_id', $loginUser['user_id']);
            
            header('Location: index.php?action=home');
        }
    }

    public function logout()
    {
        $session = SessionManager::getInstance();
        $session->destroy();

        header('Location: index.php?action=home');
    }
}
