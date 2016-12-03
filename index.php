<?php

// Provide concise aliases for the Request and Response classes
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'config.php';
require 'vendor/autoload.php';

$app = new \Slim\App(["settings" => $config]);

// Create a Dependency Injection Container
$container = $app->getContainer();

// Register view component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('templates', ['cache' => false]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

// Render Twig template in route
$app->get('/', function ($request, $response, $args) {
    $page = new gtvj\Page();
    return $this->view->render($response, 'home.html', [
        'name' => $page->name
    ]);
})->setName('home');

$app->run();