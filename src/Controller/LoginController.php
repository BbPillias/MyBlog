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

    /**
     * Connect using user manager session manager
     */
    public function connect($email, $password)
    {
        $loginUser = $this->userManager->login($email, $password);

        if ($loginUser === null) {
            throw new Exception('email ou mot de passe incorrect !');
        } else {
            $session = SessionManager::getInstance();

            $session->set('email', $email);
            $session->set('username', $loginUser->getUsername());
            $session->set('user_status', $loginUser->getUserStatus());
            $session->set('user_id', $loginUser->getUserId());

            header('Location: index.php?action=home');
        }
    }

    /**
     * logout using session manager
     */
    public function logout()
    {
        $session = SessionManager::getInstance();
        $session->destroy();

        header('Location: index.php?action=home');
    }
}
