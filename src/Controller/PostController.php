<?php

namespace Berengere\Blog\Controller;

use Exception;
use \Berengere\Blog\Manager\PostManager;
use \Berengere\Blog\Manager\CommentManager;


class PostController
{
    private PostManager $postManager;

    public function __construct(PostManager $postManager)
    {
        $this->postManager = $postManager;
    }

    /**
     * Posts view from the post manager
     */
    public function listPosts()
    {
        $listPosts = $this->postManager->getPosts();

        return ['frontend/listPosts.html.twig', compact('listPosts')];
    }

    /**
     * Post view from the post manager
     *
     * @param $postId
     */
    public function post($postId)
    {
        $commentManager = new CommentManager();

        $post = $this->postManager->getPost($postId);
        $comments = $commentManager->getComments($postId);

        return ['frontend/post.html.twig', compact('post', 'comments')];
    }

    /**
     * Add a Post using post manager
     */
    public function addPost($title, $chapo, $content)
    {
        $newPost = $this->postManager->post($title, $chapo, $content);
        if ($newPost === false) {
            throw new Exception('Impossible d\'ajouter l\'article !');
        } else {
            header('Location: index.php?action=listPosts');
        }
    }

    /**
     * view update a Post using post manager
     * @param $postId
     */
    public function showPost($postId)
    {
        $post = $this->postManager->getPost($postId);

        return ['backend/updatePost.html.twig', compact('post')];
    }

    /**
     * Update a Post using post manager
     */
    public function editPost($postId, $title, $chapo, $content)
    {
        $modifiedPost = $this->postManager->updatePost($postId, $title, $chapo, $content);

        if ($modifiedPost === false) {

            throw new Exception('Impossible de modifier l\'article !');
        } else {
            header('Location: index.php?action=post&post_id=' . $postId);
        }
    }

    /**
     * Delete a Post from ID using post manager
     *
     * @param $postId
     */
    public function delete(int $postId)
    {
        $this->postManager->delete($postId);

        header('Location: index.php?action=listPosts');
    }
}
