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

    public function editPost($postId, $title, $chapo, $content)
    {
        $postManager = new PostManager();

        $modifiedPost = $postManager->updatePost($postId, $title, $chapo, $content);

        if ($modifiedPost === false) {

            throw new Exception('Impossible de modifier l\'article !');
        } else {
            header('Location: index.php?action=post&post_id=' . $postId);
        }
    }

    public function delete(int $postId)
    {
        $postManager = new PostManager();

        $postManager->delete($postId);

        header('Location: index.php?action=listPosts');
    }

    public function comment($postId)
    {
        $commentManager = new CommentManager();

        $comment = $commentManager->getComments($postId);

        return ['frontend/addFormComment.html.twig', compact('comment')];
    }

    public function addComment($comment, $valid, $postId, $userId)
    {
        $commentManager = new CommentManager();
        $newComment = $commentManager->addComment($comment, $valid, $postId, $userId);

        if ($newComment === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&post_id=' . $postId);
        }
    }

    public function showComment($commentId)
    {
        $commentManager = new CommentManager();

        $comment = $commentManager->getComment($commentId);

        return ['frontend/updateComment.html.twig', compact('comment')];
    }

    public function editComment($commentId, $comment, $valid, $postId, $userId)
    {
        $commentManager = new CommentManager();

        $modifiedComment = $commentManager->updateComment($commentId, $comment, $valid, $postId, $userId);
        
        if ($modifiedComment === false) {
            throw new Exception('Impossible de modifier le commentaire !');
        } else {
            header('Location: index.php?action=post&post_id=' . $postId);
        }
    }

    public function deleteComment(int $commentId)
    {
        $commentManager = new CommentManager();

        $commentManager->deleteComment($commentId);

        header('Location: index.php?action=listPosts');
    }
}
