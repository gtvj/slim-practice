<?php

// Provide concise aliases for the Request and Response classes
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'config.php';
require 'vendor/autoload.php';

$app = new \Slim\App(["settings" => $config]);

// Route registration
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello");
    return $response;
});

$app->run();