<?php

namespace Berengere\Blog\Controller;

use Exception;
use \Berengere\Blog\Manager\UserManager;

class UserController
{
    public function addUser($username, $email, $password)
    {
        $userManager = new UserManager();

        $newUser = $userManager->user($username, $email, $password);
        if ($newUser === false) {
            throw new Exception('Impossible d\'ajouter le nouvel utilisateur !');
        } else {
            header('Location: index.php?action=listPosts');
        }
    }
}