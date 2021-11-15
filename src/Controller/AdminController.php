<?php

namespace Berengere\Blog\Controller;

use Exception;
use \Berengere\Blog\Manager\PostManager;

class AdminController
{
    public function addPost( $title, $chapo, $content, $date_creation, $date_update, $users_user_id)
    {
        $postManager = new PostManager();

        $newPost = $postManager->addPost( $title, $chapo, $content, $date_creation, $date_update, $users_user_id);

        return ['frontend/post.html.twig', $newPost];
    }
}
