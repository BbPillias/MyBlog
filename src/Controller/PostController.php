<?php

namespace Berengere\Blog\Controller;

use Exception;
use \Berengere\Blog\Manager\PostManager;
use \Berengere\Blog\Manager\CommentManager;

class PostController
{
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        return ['frontend/listPosts.html.twig', $posts];
    }

    public function post(int $postId)
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($postId);
        $comments = $commentManager->getComments($postId);

        return ['frontend/post.html.twig', $post, $comments];
        var_dump($comments);
    }

    public function addPost($title, $chapo, $content)
    {
        $postManager = new PostManager();

        $newPost = $postManager->post($title, $chapo, $content);
        if ($newPost === false) {
            throw new Exception('Impossible d\'ajouter l\'article !');
        } else {
            header('Location: index.php?action=listPosts');
        }
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function showComment($commentId)
    {
        $commentManager = new CommentManager();

        $comment = $commentManager->getComment($commentId);

        return ['backend/updateComment.html.twig', $comment];
    }

    public function editComment($id, $comment, $postId)
    {
        $commentManager = new CommentManager();

        $modifiedComment = $commentManager->updateComment($id, $comment, $postId);

        if ($modifiedComment === false) {
            // Permet de remonter l'erreur jusqu'au bloc try du routeur index.php
            throw new Exception('Impossible de modifier le commentaire !');
        } else {
            echo 'commentaire : ' . $_POST['comment'];
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
}
