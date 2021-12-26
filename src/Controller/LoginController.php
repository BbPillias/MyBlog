<?php

namespace Berengere\Blog\Controller;

use Exception;
use \Berengere\Blog\Manager\PostManager;
use \Berengere\Blog\Manager\CommentManager;
use \Berengere\Blog\Manager\UserManager;
use \Berengere\Blog\Manager\SessionManager;

class LoginController
{
    
    public function connect($email, $password)
    {
        $userManager = new UserManager();

        $loginUser = $userManager->login($email, $password);
        var_dump($loginUser);
        if ($loginUser === false) {
            throw new Exception('email ou mot de passe incorrect !');
        } else {
            $session = SessionManager::getInstance();
            
            $session->set('email', $email);
            $session->set('username', $loginUser ['username']);
                 
            header('Location: index.php?action=home');
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php?action=home');
    }
}
