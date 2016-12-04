<?php

// Create a Dependency Injection Container
$container = $app->getContainer();

// Register view component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('../templates', ['cache' => false]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

// Register logging component on container
$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('GJ');
    $console_handler = new \Monolog\Handler\BrowserConsoleHandler();
    $logger->pushHandler($console_handler);
    return $logger;
};