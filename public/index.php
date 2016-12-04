<?php

// Provide concise aliases for the Request and Response classes
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';

$settings = require __DIR__ . '/../settings.php';

$app = new \Slim\App($settings);

require __DIR__ . '/../dependencies.php';

// Render Twig template in route
$app->get('/', function ($request, $response, $args) {
    $page = new gtvj\Page();
    $this->logger->addInfo('Monolog lets PHP log to the browser console');
    return $this->view->render($response, 'home.html', [
        'name' => $page->name
    ]);
})->setName('home');

$app->run();