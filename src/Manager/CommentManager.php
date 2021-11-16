<?php

namespace Berengere\Blog\Manager;

use Berengere\Blog\Core\Database;

class CommentManager extends Database
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments WHERE posts_post_id = ? ORDER BY comment_date DESC');
        $req->execute(array($postId));
        $comments = $req->fetchAll();

        return $comments;
    }

    public function postComment($postId, $comment, $idUser)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments (comment, comment_date, posts_post_id, users_user_id) VALUES(?, NOW(), ?,? )');
        $affectedLines = $comments->execute(array($comment, $postId, $idUser));

        return $affectedLines;
    }

    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT comment_id, comment, is_valid, posts_post_id, users_user_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE comment_id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }

    public function updateComment($id, $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment = ?, comment_date = NOW() WHERE id = ?');
        $modifiedComment = $req->execute(array($comment, $id));

        return $modifiedComment;
    }
}
