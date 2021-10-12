<?php

include 'vendor/autoload.php';

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

// On instancie un Carnet
$car = new List();
try {
    // le dossier ou on trouve les templates
    $loader = new Twig\Loader\FilesystemLoader('view');

    // initialiser l'environement Twig
    $twig = new Twig\Environment($loader);

    // load template
    $template = $twig->load('listPosts.html.twig');

    // on va instancier le modele
    // et préparer les variables
    // qu'on va passer au template
    require_once("postManager.php");
    $posts = new listPosts();
    $list = $posts->getPosts();
    $titre = "Liste des articles";

    // render template
    echo $template->render(array(
        'titre' => $titre,
        'liste' => $posts,
    ));

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}
// function post()
// {
//     $postManager = new \Berengere\Blog\Model\PostManager();
//     $commentManager = new \Berengere\Blog\Model\CommentManager();

//     $post = $postManager->getPost($_GET['id']);
//     $comments = $commentManager->getComments($_GET['id']);

//     require('view/post.html.twig');
// }
// function listPosts()
// {
//     $postManager = new \Berengere\Blog\Model\PostManager();
//     $posts = $postManager->getPosts();

//     require('view/listPosts.html.twig');
// }
