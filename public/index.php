<?php

global $pdo;

use Alura\Mvc\Controller\{
    Controller,
    DeleteVideoController,
    EditVideoController,
    Error404Controller,
    NewVideoController,
    VideoFormController,
    VideoListController
};
use Alura\Mvc\Entity\User;
use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Repository\UserRepository;


    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . "/../src/conexao-bd.php";

    $routes = require_once __DIR__ . '/../config/routes.php';

    $videoRepository = new VideoRepository($pdo);
    $userRepository = new UserRepository($pdo);

    $pathInfo = $_SERVER['PATH_INFO'] ?? '/';
    $httpMethod = $_SERVER['REQUEST_METHOD'];

    $key = "$httpMethod|$pathInfo";
    if (array_key_exists($key, $routes)){
        $controllerClass = $routes[$key];
        if($key === 'POST|/login') {
            $controller = new $controllerClass($userRepository);
        } else {
        $controller = new $controllerClass($videoRepository);
        }
    } else {
        $controller = new Error404Controller();
    }
    /** @var Controller $controller */
    $controller->processaRequisicao();
