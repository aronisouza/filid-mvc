<?php

class Controller {
    protected function render($view, $data = []) {
        // Extrai os dados para variáveis no escopo local
        extract($data);

        // Define o caminho para a view
        $viewPath = __DIR__ . "/../Views/{$view}.php";

        // Verifica se a view existe
        if (file_exists($viewPath)) {
            // Define a variável $content com o caminho da view
            $content = $viewPath;
            // Carrega o template
            require_once __DIR__ . "/../Views/template.php";
        } else {
            // Se a view não existir, carrega a página de erro 404
            require_once __DIR__ . "/../Views/errors/404.php";
        }
    }
    protected function generateCsrfToken() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    
    protected function validateCsrfToken($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
}