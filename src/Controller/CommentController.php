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

    /**
     * Comment view using comment manager
     * 
     * @param $postId
     */
    public function comment($postId)
    {
        $comment = $this->commentManager->getComments($postId);

        return ['frontend/addFormComment.html.twig', compact('comment')];
    }

    /**
     * Add a Comment using comment manager
     */
    public function addComment($comment, $postId, $userId)
    {
        $newComment = $this->commentManager->addComment($comment, $postId, $userId);

        if ($newComment === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&post_id=' . $postId);
        }
    }

    /**
     * view update Comment using comment manager
     * 
     * @param $commentId
     */
    public function showComment(int $commentId)
    {
        $comment = $this->commentManager->getComment($commentId);

        return ['frontend/updateComment.html.twig', compact('comment')];
    }

    /**
     * Update Comment using comment manager
     */
    public function editComment($commentId, $comment, $valid, $postId, $userId)
    {
        $modifiedComment = $this->commentManager->updateComment($commentId, $comment, $valid, $postId, $userId);

        if ($modifiedComment === false) {
            throw new Exception('Impossible de modifier le commentaire !');
        } else {
            header('Location: index.php?action=post&post_id=' . $postId);
        }
    }

    /**
     * Valid Comment using comment manager
     * 
     * @param $commentId
     */
    public function validComment($commentId)
    {
        $session = SessionManager::getInstance();

        if (!$session->get('user_status') == 'admin') {
            header('HTTP/1.0 401 Unauthorized');
        }
        $validComment = $this->commentManager->validComment($commentId);

        if ($validComment === false) {
            throw new Exception('Impossible de valider le commentaire !');
        } else {
            header('Location: index.php?action=listPosts');
        }
    }

    /**
     * Delete a Comment from ID using comment manager
     *
     * @param $commentId
     */
    public function deleteComment(int $commentId)
    {
        $this->commentManager->deleteComment($commentId);

        header('Location: index.php?action=listPosts');
    }
}
