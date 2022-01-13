<?php

require_once 'vendor/autoload.php';

use Berengere\Blog\Controller\Router;


$router = new Router();
$router->routerRequest();
