<?php

namespace Berengere\Blog\Model;

class Post
{
    private $postId;

    private $title;

    private $chapo;

    private $content;

    private $dateCreation;

    private $dateUpdate;

    private $userId;

    public function getPostId()
    {
        return $this->postId;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function getChapo()
    {
        return $this->chapo;
    }

    public function setChapo(string $chapo)
    {
        $this->chapo = $chapo;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }

    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;
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
