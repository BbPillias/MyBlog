<?php

require_once 'vendor/autoload.php';

use Berengere\Blog\Controller\Router;
use Berengere\Blog\Manager\SessionManager;

$session = SessionManager::getInstance();
$router = new Router();

try {
$router->routerRequest();
}
catch (Exception $e) {
    // echo 'Exception reçue : ',  $e->getMessage(), "\n";
    $session->set('error', $e->getMessage());

    header('Location: '. $_SERVER['HTTP_REFERER']);

    
}