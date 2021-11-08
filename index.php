<?php


require_once 'vendor/autoload.php';

//routing
$page = 'home';
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}

$loader = new \Twig\Loader\FilesystemLoader('view');
$twig = new \Twig\Environment($loader, array(
    'cache' => false, // __DIR__ . /tmp,
));

$frontController = new Berengere\Blog\Controller\FrontController;

switch ($page) {

    case 'home':
        echo $twig->render('frontend/home.html.twig');
        break;

    case 'listPosts':
        [$twigTemplate, $listPosts] = $frontController->listPosts();
        echo $twig->render($twigTemplate, compact('listPosts'));
        break;

    case 'contact':
        echo $twig->render('frontend/contact.html.twig');
        break;

    case 'login':
        echo $twig->render('frontend/login.html.twig');
        break;

    case 'register':
        echo $twig->render('frontend/register.html.twig');
        break;

    case 'addPost':
        echo $twig->render('backend/addPost.html.twig');
        break;

    case 'post':
        [$twigTemplate, $post] = $frontController->post();
        echo $twig->render($twigTemplate, compact('post'));
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        break;
}
