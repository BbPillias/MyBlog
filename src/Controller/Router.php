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
        $params = [];

        switch ($action) {

            case 'home':
                $twigTemplate = 'frontend/home.html.twig';
                break;

            case 'listPosts':
                [$twigTemplate, $params] = $postController->listPosts();
                break;

            case 'post':
                [$twigTemplate, $params] = $postController->post($_GET['post_id']);
                break;

            case 'deletePost':
                [$twigTemplate, $params] = $postController->delete($_GET['post_id']);
                break;

            case 'contact':
                $twigTemplate = 'frontend/contact.htm.twig';
                break;

            case 'login':
                $twigTemplate = 'frontend/login.html.twig';
                break;

            case 'register':
                $twigTemplate = 'frontend/register.html.twig';
                break;

            case 'addPost':
                if (!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content'])) {
                    $postController->addPost($_POST['title'], $_POST['chapo'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                break;

            case 'addFormPost':
                $twigTemplate = 'backend/addFormPost.html.twig';
                break;

            case 'editPost':
                $twigTemplate = 'backend/updateComment.html.twig';
                break;

            case 'addComment':
                $twigTemplate = 'backend/updateComment.html.twig';
                break;

            case 'showComment':
                [$twigTemplate, $params] = $postController->showComment($_GET['comment_id']);
                break;

            case 'editComment':
                $twigTemplate = 'backend/updateComment.html.twig';
                break;

            case 'deleteComment':
                [$twigTemplate, $params] = $postController->deleteComment($_GET['comment_id']);
                break;

            default:
                header('HTTP/1.0 404 Not Found');
                break;
        }

        echo $twig->render($twigTemplate, $params);;
    }
}
