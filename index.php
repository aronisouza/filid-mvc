<?php
session_start();

header("Content-Security-Policy: " .
    "default-src 'self'; " .
    "script-src 'self' https://cdn.jsdelivr.net 'unsafe-inline'; " .
    "style-src 'self' https://cdn.jsdelivr.net 'unsafe-inline'; " .
    "img-src 'self' data:;"
);
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");

require_once __DIR__ . '/autoload.php'; // Carrega o autoload
require_once __DIR__ . '/functions.php'; // Carrega funções auxiliares

loadEnv();

$router = new Router();

// Carrega as rotas do arquivo de configuração
$routes = require_once __DIR__ . '/Configs/routes.php';

// Registra as rotas
foreach ($routes as $route) {
    $router->addRoute($route[0], $route[1], $route[2], $route[3]);
}

$router->dispatch();
