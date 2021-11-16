<?php

require_once 'vendor/autoload.php';

use Berengere\Blog\Controller\Router;

session_start();

$routeur = new Router();
$routeur->routerRequest();
