<?php

require_once 'vendor/autoload.php';

use Berengere\Blog\Controller\Router;

session_start();

$router = new Router();
$router->routerRequest();
