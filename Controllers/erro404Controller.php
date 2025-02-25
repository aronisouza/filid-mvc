<?php
namespace Controllers;

use Core\Controller;

class erro404Controller extends Controller {
    public function index() {
        $this->render('erro404');
    }
}