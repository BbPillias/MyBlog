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

        if (!$loginUser) {
            throw new Exception('user inconnu !');
            header('Location: index.php?action=login');
        } else {
            $isPasswordCorrect = password_verify($password, $loginUser->getPassword());

            if ($isPasswordCorrect == false) {
                throw new Exception('Mot de passe incorrect');
                header('Location: index.php?action=login');
            } else {
                $session = SessionManager::getInstance();

                $session->set('email', $email);
                $session->set('username', $loginUser->getUsername());
                $session->set('user_status', $loginUser->getUserStatus());
                $session->set('user_id', $loginUser->getUserId());

                header('Location: index.php?action=home');
            }
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
