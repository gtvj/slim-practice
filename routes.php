<?php

// Render Twig template in route
$app->get('/', function ($request, $response, $args) {
    $page = new gtvj\Page('Hello world!');
    $this->logger->addInfo('Monolog lets PHP log to the browser console');
    return $this->view->render($response, 'home.html', [
        'page' => $page
    ]);
})->setName('home');