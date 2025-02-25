<?php
spl_autoload_register(function ($nomeClasse) {
    $nomeClasse = str_replace("\\", "/", $nomeClasse);
    $caminhos = [
        'Configs/',
        'Controllers/',
        'Core/',
        'Models/'
    ];

    foreach ($caminhos as $pasta) {
        // Remove a parte do namespace que já está no nome da classe
        $pastaArquivo = __DIR__ . '/' . $pasta . basename($nomeClasse) . '.php';
        if (file_exists($pastaArquivo)) {
            require_once $pastaArquivo;
            break;
        }
    }
});