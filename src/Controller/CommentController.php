<?php

namespace Berengere\Blog\Controller;

use Exception;
use \Berengere\Blog\Manager\CommentManager;
use \Berengere\Blog\Manager\SessionManager;

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

    public function showComment(int $commentId)
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
            header('Location: index.php?action=post&post_id=' . $postId);
        }
    }

    public function validComment($commentId)
    {
        $session = SessionManager::getInstance();

        if (!$session->get('user_status') == 'admin') {
            header('HTTP/1.0 401 Unauthorized');
        }
        $postId = $this->commentManager->validComment($commentId);

        header('Location: index.php?action=post&post_id=' . $postId);
    }
   
    public function deleteComment(int $commentId)
    {
        $this->commentManager->deleteComment($commentId);

        header('Location: index.php?action=listPosts');
    }
}
