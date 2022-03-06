<?php

namespace Berengere\Blog\Model;

class Comment
{
    /**
     * @var int $comment_id comment id
     */
    private $commentId;

    /**
     * @var string $comment comment 
     */
    private $comment;

    /**
     * @var string $comment_date comment date update
     */
    private $commentDate;

    /**
     * @var bool $is_valid comment status
     */
    private $isValid;

    /**
     * @var int $posts_post_id post id
     */
    private $postId;

    /**
     * @var int $users_user_id user id
     */
    private $userId;

    public function __construct($datas = [])
    {
        $this->commentId = (int) $datas['comment_id'];
        $this->comment = $datas['comment'];
        $this->commentDate = $datas['comment_date'];
        $this->isValid = $datas['is_valid'];
        $this->postId = $datas['posts_post_id'];
        $this->userId = $datas['users_user_id'];
    }

    public function getCommentId(): int
    {
        return $this->commentId;
    }

    /**
     * @param int $commentId
     * @return Comment
     */
    public function setCommentId(int $commentId)
    {
        $this->commentId = $commentId;
        return $this;
    }

    /**
     * @return int
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @return string
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param string $commentDate
     * @return Comment
     */
    public function setCommentDate(string $commentDate)
    {
        $this->commentDate = $commentDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsValid(): int
    {
        return $this->isValid;
    }

    /**
     * @param mixed $isValid
     * @return Comment
     */
    public function setValid(int $isValid)
    {
        $this->valid = $isValid;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

     /**
     * @param mixed $posts_post_id
     * @return Comment
     */
    public function setPostId(int $postId)
    {
        $this->postId = $postId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

     /**
     * @param mixed $users_user_id
     * @return Comment
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
        return $this;
    }
}
