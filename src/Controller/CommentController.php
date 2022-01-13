<?php

namespace Berengere\Blog\Controller;

use Exception;
use \Berengere\Blog\Manager\CommentManager;

class CommentController
{
    private CommentManager $commentManager;

    public function __construct(CommentManager $commentManager)
    {
        $this->commentManager = $commentManager;
    }

    public function comment($postId)
    {
        $comment = $this->commentManager->getComments($postId);

        return ['frontend/addFormComment.html.twig', compact('comment')];
    }

    public function addComment($comment, $postId, $userId)
    {
        $newComment = $this->commentManager->addComment($comment, $postId, $userId);

        if ($newComment === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&post_id=' . $postId);
        }
    }

    public function showComment($commentId)
    {
        $comment = $this->commentManager->getComment($commentId);

        return ['frontend/updateComment.html.twig', compact('comment')];
    }

    public function editComment($commentId, $comment, $valid, $postId, $userId)
    {
        $modifiedComment = $this->commentManager->updateComment($commentId, $comment, $valid, $postId, $userId);

        if ($modifiedComment === false) {
            throw new Exception('Impossible de modifier le commentaire !');
        } else {
            header('Location: index.php?action=post&post&id=' . $postId);
        }
    }

    public function deleteComment(int $commentId)
    {
        $this->commentManager->deleteComment($commentId);

        header('Location: index.php?action=listPosts');
    }
}
