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

        return $req->fetchAll();
    }

    /**
     * Return one Post from ID
     *
     * @param $postId
     * @return mixed
     */
    public function getPost($postId)
    {
         $req = $this->dbConnect()
            ->prepare('SELECT post_id, title, chapo, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS created_at_fr FROM posts WHERE post_id = ?');
        $req->execute([$postId]);

        return $req->fetch();
    }

    /**
     * Add a Post
     *
     * @param $post
     * @return bool|false|\PDOStatement
     */
    public function post($title, $chapo, $content)
    {
        $newPost = $this->dbConnect()
              ->prepare('INSERT INTO posts (title, chapo, content, date_creation, date_update) VALUES ( ?, ?, ?, NOW(),NOW())');
              
        return $newPost->execute(array($title, $chapo, $content));
    }  

    public function updatePost( $postId, $title, $chapo, $content)
    {
        $modifiedPost = $this->dbConnect()
            ->prepare('UPDATE posts SET  title = ?, chapo = ?, content = ?, date_update = NOW() WHERE post_id = ?');
        
        return $modifiedPost->execute(array($title, $chapo, $content, $postId));
    }

    public function delete($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE post_id =?');

        return $req->execute([$postId]);
    }
}
