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

use Core\Router; // Importa o namespace Core

// Cria uma instância do Router com o caminho base
$router = new Router();

// Definindo rotas
$router->addRoute('GET', '/', 'Controllers\HomeController', 'index');
$router->addRoute('GET', '/users', 'Controllers\UserController', 'index'); // Listar usuários
$router->addRoute('GET', '/users/create', 'Controllers\UserController', 'create'); // Criar usuário (formulário)
$router->addRoute('POST', '/users/create', 'Controllers\UserController', 'store'); // Salvar usuário
$router->addRoute('GET', '/users/edit/{id}', 'Controllers\UserController', 'edit'); // Editar usuário (formulário)
$router->addRoute('POST', '/users/edit/{id}', 'Controllers\UserController', 'update'); // Atualizar usuário
$router->addRoute('GET', '/users/delete/{id}', 'Controllers\UserController', 'delete'); // Excluir usuário

// Executando o roteador
$router->dispatch();
