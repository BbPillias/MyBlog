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

            case 'showPost':
                [$twigTemplate, $params] = $postController->showPost($_GET['post_id']);
                break;

            case 'updatePost':
                if (!empty($_POST['post_id']) && !empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content'])) {
                    $postController->editPost($_POST['post_id'], $_POST['title'], $_POST['chapo'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs doivent être remplis');
                }
                break;

            case 'updateFormPost':
                $twigTemplate = 'backend/updatePost.html.twig';
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

            case 'deletePost':
                [$twigTemplate, $params] = $postController->delete($_GET['post_id']);
                break;

            case 'showComment':
                [$twigTemplate, $params] = $postController->showComment($_GET['comment_id']);
                break;

            case 'updateComment':
                if (!empty($_POST['comment_id']) && !empty($_POST['comment'])  && !empty($_POST['is_valid']) && !empty($_POST['posts_post_id'])&& !empty($_POST['user_user_id'])) {
                    $postController->editComment($_POST['comment_id'], $_POST['comment'], $_POST['is_valid'], $_POST['posts_post_id'], $_POST['user_user_id']);
                } else {
                    throw new Exception('Tous les champs doivent être remplis');
                }
                break;

            case 'updateFormComment':
                $twigTemplate = 'frontend/updateComment.html.twig';
                break;

            case 'addComment':
                if (!empty($_POST['comment'])) {
                    $postController->addComment($_POST['comment'], $_POST['is_valid'], $_POST['posts_post_id'], $_POST['users_user_id']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                break;

            case 'deleteComment':
                [$twigTemplate, $params] = $postController->deleteComment($_GET['comment_id']);
                break;

            case 'contact':
                $twigTemplate = 'frontend/contact.html.twig';
                break;

            case 'login':
                $twigTemplate = 'frontend/login.html.twig';
                break;

            case 'register':
                $twigTemplate = 'frontend/register.html.twig';
                break;

            default:
                header('HTTP/1.0 404 Not Found');
                break;
        }

        echo $twig->render($twigTemplate, $params);
    }
}
