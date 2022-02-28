<?php

namespace Berengere\Blog\Model;

class Comment
{
    private $commentId;

    private $comment;

    private $commentDate;

    private $valid;

    private $postId;

    private $userId;

    
    public function getCommentId()
    {
        return $this->commentId;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment(string $comment)
    {
        $this->comment = $comment;
        return $this;
    }

    public function getCommentDate()
    {
        return $this->commentDate;
    }

    public function setCommentDate(string $commentDate)
    {
        $this->commentDate = $commentDate;
        return $this;
    }


    public function getValid()
    {
        return $this->valid;
    }

    public function setValid(int $valid)
    {
        $this->valid = $valid;
        return $this;
    }

    public function getPostId()
    {
        return $this->postId;
    }

    public function setPostId(int $postId)
    {
        $this->postId = $postId;
        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
        return $this;
    }
}
