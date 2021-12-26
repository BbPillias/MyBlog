<?php

namespace Berengere\Blog\Controller;

use Exception;
use \Berengere\Blog\Manager\CommentManager;

class CommentController
{
    public function comment($postId)
    {
        $commentManager = new CommentManager();

        $comment = $commentManager->getComments($postId);

        return ['frontend/addFormComment.html.twig', compact('comment')];
    }

    public function addComment($comment, $postId, $userId)
    {
        $commentManager = new CommentManager();
        $newComment = $commentManager->addComment($comment, $postId, $userId);

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
            header('Location: index.php?action=post&post&id=' . $postId);
        }
    }

    public function deleteComment(int $commentId)
    {
        $commentManager = new CommentManager();

        $commentManager->deleteComment($commentId);

        header('Location: index.php?action=listPosts');
    }
}