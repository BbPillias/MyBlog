<?php

namespace Berengere\Blog\Manager;

use Berengere\Blog\Core\Database;

class PostManager extends Database
{
    /**
     * Return All Posts
     *
     * @return array
     */
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM posts');
        return ($req->fetchAll());
    }

    /**
     * Return one Post from ID
     *
     * @param $postId
     * @return mixed
     */
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post_id, title, chapo, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS created_at_fr FROM posts WHERE post_id = ?');
        $req->execute(array($postId));

        $post = $req->fetch();

        return $post;
    }

    /**
     * Add a Post
     *
     * @param $post
     * @return bool|false|\PDOStatement
     */
    public function addPost( $title, $chapo, $content, $date_creation, $date_update, $author)
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts (title, chapo, content, date_creation, date_update, users_user_id) VALUES (?, ?, ?, NOW(),NOW(), ?');
        $affectedLines = $newPost->execute(array( $title, $chapo, $content, $date_creation, $date_update, $author));

        return $affectedLines;
    }
}
