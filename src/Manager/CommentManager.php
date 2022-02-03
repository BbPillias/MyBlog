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

        return $req->fetchAll();
    }

    /**
     * Add a Comment
     *
     * @param $comment
     * @return bool|false|\PDOStatement
     */
    public function addComment($comment, $postId, $userId)
    {
        $req = $this->dbConnect()
            ->prepare('INSERT INTO comments (comment, comment_date, posts_post_id, users_user_id) VALUES(?, NOW(), ?, ? )');

        return $req->execute(array($comment, $postId, $userId));
    }


    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT comment_id, comment, is_valid, posts_post_id, users_user_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE comment_id = ?');
        $req->execute(array($commentId));

        return  $req->fetch();
    }

    public function updateComment($commentId, $comment, $valid)
    {
        $modifiedComment = $this->dbConnect()
            ->prepare('UPDATE comments SET comment = ?, comment_date = NOW(), is_valid = ? WHERE comment_id = ?');
        return $modifiedComment->execute(array($comment, $valid, $commentId));
    }

    public function validComment($commentId)
    {
        $req = $this->dbConnect()
        ->prepare('UPDATE comments SET is_valid = 1  WHERE comment_id = ?');
         $req->execute(array($commentId));

         $reqPost = $this->dbConnect()
         ->prepare('SELECT posts_post_id FrOM comments WHERE comment_id = ?');
          $reqPost->execute(array($commentId));
          return $reqPost->fetchColumn();

         


    }

    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE comment_id =?');

        return $req->execute([$commentId]);
    }
}
