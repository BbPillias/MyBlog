<?php
// on inclus le modele
include 'postManager.php';

require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('view');
$twig = new \Twig\Environment($loader, array(
    'cache' => false,
));

echo $twig->render('listPosts.html.twig');

// on inclus le modele
//include 'postManager.php';

//try {
// le dossier ou on trouve les templates
//$loader = new Twig\Loader\FilesystemLoader('view');

// initialiser l'environement Twig
//$twig = new Twig\Environment($loader);

// load template
//$template = $twig->load('listPosts.html.twig');

//$postManager = new \Berengere\Blog\Model\PostManager();
//$posts = $postManager->getPosts();

// render template
// echo $template->render(array(
//   'posts' => $posts
//));

//} catch (Exception $e) {
die('ERROR: ' . $e->getMessage());
//}