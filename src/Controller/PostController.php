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
        $listPosts = $postManager->getPosts();

        return ['frontend/listPosts.html.twig', compact('listPosts')];
    }

    public function post(int $postId)
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($postId);
        $comments = $commentManager->getComments($postId);

        return ['frontend/post.html.twig', compact('post', 'comments')];
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

    public function showPost($postId)
    {
        $postManager = new PostManager();

        $post = $postManager->getPost($postId);

        return ['backend/updatePost.html.twig', compact('post')];
    }


    public function editPost($postId, $title, $chapo, $content, $date)
    {
        $postManager = new PostManager();

        $modifiedPost = $postManager->updatePost($postId, $title, $chapo, $content, $date);

        if ($modifiedPost === false) {
            // Permet de remonter l'erreur jusqu'au bloc try du routeur index.php
            throw new Exception('Impossible de modifier l\'article !');
        } else {
            // header('Location: index.php?action=listPosts');
            return ['frontend/post.html.twig', compact('post')];
            // header('Location: index.php?action=post&id=' . $postId);
        }
    }


    public function delete(int $postId)
    {
        $postManager = new PostManager();

        $postManager->delete($postId);

        header('Location: index.php?action=listPosts');
    }


    // public function addComment($postId, $author, $comment)
    // {
    //     $commentManager = new CommentManager();
    //     $affectedLines = $commentManager->postComment($postId, $author, $comment);

    //     if ($affectedLines === false) {
    //         throw new Exception('Impossible d\'ajouter le commentaire !');
    //     } else {
    //         header('Location: index.php?action=post&id=' . $postId);
    //     }
    // }

    public function showComment($commentId)
    {
        $commentManager = new CommentManager();

        $comment = $commentManager->getComment($commentId);

        return ['backend/updateComment.html.twig', compact('comment')];
    }

    // public function editComment($id, $comment, $postId)
    // {
    //     $commentManager = new CommentManager();

    //     $modifiedComment = $commentManager->updateComment($id, $comment, $postId);

    //     if ($modifiedComment === false) {
    //         // Permet de remonter l'erreur jusqu'au bloc try du routeur index.php
    //         throw new Exception('Impossible de modifier le commentaire !');
    //     } else {
    //         echo 'commentaire : ' . $_POST['comment'];
    //         header('Location: index.php?action=post&id=' . $postId);
    //     }
    // }

    public function deleteComment(int $commentId)
    {
        $commentManager = new CommentManager();

        $commentManager->deleteComment($commentId);

        header('Location: index.php?action=listPosts');
    }
}
