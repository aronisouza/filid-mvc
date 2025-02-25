<?php
namespace Core;

class Controller {
    protected function render($view, $data = []) {
        // Extrai os dados para variáveis no escopo local
        extract($data);

        // Define o caminho para a view
        $viewPath = siteUrl() . "/../Views/{$view}.php";

        // Verifica se a view existe
        if (file_exists($viewPath)) {
            // Define o conteúdo dinâmico para ser incluído na template
            $content = $viewPath;

            // Carrega a template principal
            require_once siteUrl() . "/../Views/template.php";
        } else {
            $viewPath = siteUrl() . "/../Views/erro404.php";
        }
    }
}