<?php

namespace Berengere\Blog\Controller;

use Exception;
use \Berengere\Blog\Manager\PostManager;

class AdminController
{
    public function addPost($postId, $title, $chapo, $content, $date_creation, $date_update, $users_user_id)
    {
        $postManager = new PostManager();

        $newPost = $postManager->addPost($postId, $title, $chapo, $content, $date_creation, $date_update, $users_user_id);


            return ['frontend/post.html.twig', $newPost];
        
    }
}

