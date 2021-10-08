<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new \Berengere\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \Berengere\Blog\Model\PostManager();
    $commentManager = new \Berengere\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \Berengere\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function showComment($commentId)
{  
    $commentManager = new \Berengere\Blog\Model\CommentManager();
 
    $comment = $commentManager->getComment($_GET['id']);
 
    require('view/frontend/updateCommentView.php');
}
    
function editComment($id, $comment, $postId)
{
    $commentManager = new \Berengere\Blog\Model\CommentManager();
 
    $modifiedComment = $commentManager->updateComment($id, $comment, $postId);
 
    if($modifiedComment === false)
    {
        // Permet de remonter l'erreur jusqu'au bloc try du routeur index.php
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else
    {
        echo 'commentaire : ' . $_POST['comment'];
        header('Location: index.php?action=post&id=' . $postId);
    }
}
