<?php

namespace Berengere\Blog\Controller;

use Berengere\Blog\Controller\PostController;
use Berengere\Blog\Controller\CommentController;
use Berengere\Blog\Controller\ContactController;
use Berengere\Blog\Manager\PostManager;
use Berengere\Blog\Manager\CommentManager;
use Berengere\Blog\Manager\UserManager;
use Berengere\Blog\Manager\SessionManager;
use Berengere\Blog\Manager\MailManager;
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
            'cache' => false,
            // __DIR__ . /tmp,
        ));


        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $userManager = new UserManager();
        $mailManager = new MailManager('blog.berengere@gmail.com', 'MonBlog2022');
        $userController = new UserController();
        $postController = new PostController($postManager);
        $commentController = new CommentController($commentManager);
        $loginController = new LoginController($userManager);
        $mailController = new ContactController($mailManager);
        $defaultParams = ['session' => SessionManager::getInstance()->getAll()];
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

            case 'validComment':
                if (!empty($_GET['comment_id'])) {
                    $commentController->validComment($_GET['comment_id']);
                } else {
                    throw new Exception('Validation impossible !');
                }
                break;

            case 'showComment':
                [$twigTemplate, $params] = $commentController->showComment($_GET['comment_id']);
                break;

            case 'updateComment':
                if (!empty($_POST['comment_id']) && !empty($_POST['comment'])  && !empty($_POST['is_valid']) && !empty($_POST['posts_post_id']) && !empty($_POST['users_user_id'])) {
                    $commentController->editComment($_POST['comment_id'], $_POST['comment'], $_POST['is_valid'], $_POST['posts_post_id'], $_POST['users_user_id']);
                } else {
                    throw new Exception('Tous les champs doivent être remplis');
                }
                break;

            case 'updateFormComment':
                $twigTemplate = 'frontend/updateComment.html.twig';
                break;

            case 'addComment':
                if (!empty($_POST['comment'])) {
                    $commentController->addComment($_POST['comment'], $_POST['posts_post_id'], $_POST['users_user_id']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                break;

            case 'deleteComment':
                [$twigTemplate, $params] = $commentController->deleteComment($_GET['comment_id']);
                break;

            case 'contact':
                $twigTemplate = 'frontend/contact.html.twig';
                break;

            case 'contactForm':
                if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
                    $mailController->confirmEmail($_POST['name'], $_POST['email'], $_POST['message']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }

                break;

            case 'login':
                $twigTemplate = 'frontend/login.html.twig';
                break;

            case 'verifLogin':
                if (!empty($_POST['email']) && !empty($_POST['password'])) {

                    $loginController->connect($_POST['email'], $_POST['password']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                break;

            case 'addFormUser':
                $twigTemplate = 'frontend/addFormUser.html.twig';
                break;

            case 'addUser':
                if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                    $userController->addUser($_POST['username'], $_POST['email'], $_POST['password']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                break;

            case 'logout':
                $loginController->logout();
                break;

            default:
                header('HTTP/1.0 404 Not Found');
                break;
        }

        echo $twig->render($twigTemplate, $defaultParams + $params);
    }
}
