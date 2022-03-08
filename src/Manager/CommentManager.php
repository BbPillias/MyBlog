<?php

namespace Berengere\Blog\Manager;

use Berengere\Blog\Core\Database;
use Berengere\Blog\Model\Comment;

class CommentManager extends Database
{
    /**
     * Return Comments from a post
     *
     * @param $postId
     */
    public function getComments($postId)
    {
        $req = 'SELECT * FROM comments WHERE posts_post_id = :postId ORDER BY comment_date DESC';
        $parameters = [':postId' => $postId];

        $result = $this->sql($req, $parameters);
        $custom_array = [];

        while ($datas = $result->fetch(\PDO::FETCH_ASSOC)) {
            array_push($custom_array, new Comment($datas));
        }
        return $custom_array;
    }

    /**
     * Add Comment from a user
     *
     * @param $postId
     * @param $userId
     * @param $comment
     * @return bool|false|\PDOStatement
     */
    public function addComment($comment, $postId, $userId)
    {
        $newComment = 'INSERT INTO comments (comment, comment_date, posts_post_id, users_user_id) VALUES(:comment, NOW(), :postId, :userId )';
        $parameters = [
            ':comment' => $comment,
            ':postId' => $postId,
            ':userId' => $userId,
        ];

        $this->sql($newComment, $parameters);
    }

    /**
     * Return Comment from ID
     *
     * @param $commentId
     * @return bool|false|\PDOStatement
     */
    public function getComment($commentId)
    {
        $comment = 'SELECT comment_id, comment, is_valid, posts_post_id, users_user_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE comment_id = :commentId';
        $parameters = [':commentId' => $commentId];
        $result = $this->sql($comment, $parameters);
        $datas = $result->fetch(\PDO::FETCH_ASSOC);

        return new Comment($datas);
    }

    /**
     * Update Comment from ID
     *
     * @param $isVallid
     * @param $comment
     * @param $commentId
     * @return bool|false|\PDOStatement
     */
    public function updateComment($commentId, $comment, $isValid)
    {
        $modifiedComment = 'UPDATE comments SET comment = :comment, comment_date = NOW(), is_valid = :isValid WHERE comment_id = :commentId';
        $parameters = [
            ':comment_id' => $commentId,
            ':comment' => $comment,
            ':is_valid' => $isValid,
        ];

        $this->sql($modifiedComment, $parameters);
    }

    /**
     * Valid Comment from ID
     *
     * @param $commentId
     * @return bool|false|\PDOStatement
     */
    public function validComment($commentId)
    {
        $validate = 'UPDATE comments SET is_valid = :isValid WHERE comment_id = :commentId';
        $parameters = [':commentId' => $commentId, ':isValid' => 1];

        $this->sql($validate, $parameters);
    }

    /**
     * Delete Comment from ID
     *
     * @param $commentId
     * @return bool|false|\PDOStatement
     */
    public function deleteComment($commentId)
    {
        $comment = 'DELETE FROM comments WHERE comment_id = :commentId';
        $parameters = [':commentId' => $commentId];

        $this->sql($comment, $parameters);
    }
}
