<?php

namespace Berengere\Blog\Controller;

use Berengere\Blog\Controller\PostController;
use Exception;

class Router
{

    public function routerRequest()
    {
        //routing
        $action = 'home';
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }

        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, array(
            'cache' => false, // __DIR__ . /tmp,
        ));

        $postController = new PostController;
        $page = null;

        switch ($action) {

            case 'home':
                $page = $twig->render('frontend/home.html.twig');
                break;

            case 'listPosts':
                [$twigTemplate, $listPosts] = $postController->listPosts();
                $page = $twig->render($twigTemplate, compact('listPosts'));
                break;

            case 'post':
                [$twigTemplate, $post] = $postController->post($_GET['post_id']);
                [$twigTemplate, $comments] = $postController->post($_GET['post_id']);
                $page = $twig->render($twigTemplate, compact('post'));
                break;

            case 'contact':
                $page = $twig->render('frontend/contact.html.twig');
                break;

            case 'login':
                $page = $twig->render('frontend/login.html.twig');
                break;

            case 'register':
                $page = $twig->render('frontend/register.html.twig');
                break;

            case 'addPost':
                if (!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content'])) {
                    $postController->addPost($_POST['title'], $_POST['chapo'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                break;

            case 'addFormPost':
                echo $twig->render('backend/addFormPost.html.twig');
                break;

            case 'updateComment':
                echo $twig->render('backend/updateComment.html.twig');
                break;

            default:
                header('HTTP/1.0 404 Not Found');
                break;
        }
        echo $page;
    }
}
