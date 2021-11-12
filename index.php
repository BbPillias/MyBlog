<?php

require_once 'vendor/autoload.php';

//routing
$action = 'home';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$loader = new \Twig\Loader\FilesystemLoader('view');
$twig = new \Twig\Environment($loader, array(
    'cache' => false, // __DIR__ . /tmp,
));

$frontController = new Berengere\Blog\Controller\FrontController;
$backController = new Berengere\Blog\Controller\AdminController;
$page = null;

switch ($action) {

    case 'home':
        $page = $twig->render('frontend/home.html.twig');
        break;

    case 'listPosts':
        [$twigTemplate, $listPosts] = $frontController->listPosts();
        $page = $twig->render($twigTemplate, compact('listPosts'));
        break;
    
    case 'post':
        [$twigTemplate, $post, $comments] = $frontController->post($_GET['post_id']);
        $page = $twig->render($twigTemplate, compact('post'));
        break;

    case 'contact':
        $page = $twig->render('frontend/contact.html.twig');
        break;

    case 'login':
        $page = $twig->render('frontend/login.html.twig');
        break;

    case 'register':
        echo $twig->render('frontend/register.html.twig');
        break;

    case 'addPost':
        [$twigTemplate, $post] = $backController->addPost($_POST['post_id'],$_POST['title'],$_POST['chapo'],$_POST ['content'],$_POST ['date_creation'], $_POST['date_update'],$_POST ['users-user-id']);
        $page = $twig->render($twigTemplate, compact('addPost'));
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        break;
}


echo $page;
