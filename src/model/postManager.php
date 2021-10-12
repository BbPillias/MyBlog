<?php

namespace Berengere\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT idPost, title, chapô, content, DATE_FORMAT(created_at, \'%d/%m/%Y à %Hh%imin%ss\'AS creation_date_fr, User_idUser FROM post  ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($idPost)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT idPost, title, chapô, content, DATE_FORMAT(created_at, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post WHERE idPost = ?');
        $req->execute(array($idPost));
        $post = $req->fetch();

        return $post;
    }
}

