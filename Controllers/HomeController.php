<?php
namespace Controllers;

use Core\Controller;

class HomeController extends Controller {
    public function index() {
        // Renderiza a view 'home' dentro da template
        $this->render('home');
    }
}