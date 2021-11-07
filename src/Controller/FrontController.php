<?php
namespace Berengere\Blog\Controller;

use Exception;

class FrontController {

public function listPosts()
{
    $postManager = new \Berengere\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    return ['frontend/listPosts.html.twig', $posts];
}

public function post()
{
    $postManager = new \Berengere\Blog\Model\PostManager();
    $post = $postManager->getPost($_GET['post_id']);
    echo var_dump($_GET['post_id']);

    $commentManager = new \Berengere\Blog\Model\CommentManager();  
    $comments = $commentManager->getComments($_GET['post-id']);
    

    return['frontend/post.html.twig', $post,$comments];
}

public function addComment($postId, $author, $comment)
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
 
    require('backend/updateComment.html.twig');
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
}