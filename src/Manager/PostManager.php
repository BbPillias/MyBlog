<?php

namespace Berengere\Blog\Manager;

use Berengere\Blog\Core\Database;
use Berengere\Blog\Model\Post;

/**
 * PostManager Queries for Posts
 */
class PostManager extends Database
{
    /**
     * Return All Posts
     *
     */
    public function getPosts()
    {
        $posts = 'SELECT * FROM posts';
        $result = $this->sql($posts);
        $custom_array = [];

        while ($datas = $result->fetch(\PDO::FETCH_ASSOC)){
            array_push($custom_array, new Post($datas));
        }

        return $custom_array;
    }

    /**
     * Return one Post from ID
     *
     * @param $postId
     * @return mixed
     */
    public function getPost($postId)
    {
        $post = 'SELECT post_id, title, chapo, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS created_at_fr FROM posts WHERE post_id = :postId';
        $parameters = [':postId' => $postId];
        $result = $this->sql($post, $parameters);
        $datas = $result->fetch(\PDO::FETCH_ASSOC);

        return new Post($datas);
        var_dump($datas);
    }

    /**
     * Add a Post
     *
     * @param $post
     * @return bool|false|\PDOStatement
     */
    public function post($post)
    {
        $newPost = 'INSERT INTO posts (title, chapo, content, date_creation, date_update) VALUES ( :title, :chapo, :content, NOW(),NOW())';
        $parameters = [
            ':title' => $post['title'],
            ':chapo' => $post['chapo'],
            ':content' => $post['content'],
        ];

        $this->sql($newPost, $parameters);
    }

    /**
     * Update a Post
     *
     * @param $postId
     * @return bool|false|\PDOStatement
     */
    public function updatePost($postId, $datas)
    {
        $modifiedPost = 'UPDATE posts SET  title = :title, chapo = :chapo, content = :content, date_update = NOW() WHERE post_id = :post_id';
        $parameters = [
            ':post_id' => $postId,
            ':title' => $datas['title'],
            ':chapo' => $datas['chapo'],
            ':content' => $datas['content'],

        ];

        $this->sql($modifiedPost, $parameters);
    }

    /**
     * Delete a Post
     *
     * @param $postId
     * @return bool|false|\PDOStatement
     */
    public function delete($postId)
    {
        $post = 'DELETE FROM posts WHERE post_id = :post_id';
        $parameters = [':post_id' => $postId];

        $this->sql($post, $parameters);
    }
}
