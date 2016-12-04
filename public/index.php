<?php

// Provide concise aliases for the Request and Response classes
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';

$settings = require __DIR__ . '/../settings.php';
$app = new \Slim\App($settings);

require __DIR__ . '/../dependencies.php';
require __DIR__ . '/../routes.php';

$app->run();