<?php

namespace Berengere\Blog\Controller;

use Berengere\Blog\Manager\PostManager;
use Exception;
use \Berengere\Blog\Manager\UserManager;

class UserController
{
    private UserManager $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function newUser($username, $email, $password)
    {
        $newUser = $this->userManager->newUser($username, $email, $password);
        
        
        // if ($newUser === false) {
        //     throw new Exception('Impossible d\'ajouter le nouvel utilisateur !');
        // } else {
            header('Location: index.php?action=login');
        // }
    }
}
