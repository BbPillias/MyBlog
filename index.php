<?php

// require_once 'vendor/autoload.php';

// $loader = new \Twig\Loader\FilesystemLoader('view');
// $twig = new \Twig\Environment($loader);

// echo $twig->render('home.html.twig');

require_once 'vendor/autoload.php';

//routing
$page = 'home';
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}

$loader = new \Twig\Loader\FilesystemLoader('view');
$twig = new \Twig\Environment($loader, array(
    'cache' => false,
));

switch ($page) {

    case 'home':
        echo $twig->render('home.html.twig');
        break;

    case 'listPosts':
        echo $twig->render('listPosts.html.twig');
        break;

    case 'contact':
        echo $twig->render('contact.html.twig');
        break;

    case 'login':
        echo $twig->render('login.html.twig');
        break;

    case 'register':
        echo $twig->render('register.html.twig');
        break;

    case 'addPost':
        echo $twig->render('addPost.html.twig');
        break;

    case 'post':
        echo $twig->render('post.html.twig');
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        break;
}
