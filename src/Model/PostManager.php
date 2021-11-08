<?php

namespace Berengere\Blog\Model;


class PostManager extends Manager
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

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post_id, title, chapo, content, DATE_FORMAT(date-creation, \'%d/%m/%Y à %Hh%imin%ss\') AS created_at_fr FROM posts WHERE post_id = ?');
        //$req = $db->query('SELECT * FROM posts') ;
        $req->execute(array($postId));
        
        $post = $req->fetchAll();
        var_dump($post);
        
        return $post;
    }
}
