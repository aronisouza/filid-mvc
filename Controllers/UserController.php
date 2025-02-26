<?php

namespace Controllers;

use Core\Controller;
use Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        // Lista todos os usuários
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        $this->render('users/index', ['users' => $users]);
    }

    public function create()
    {
        // Mostra o formulário para criar um novo usuário
        $this->render('users/create');
    }

    public function store()
    {
        // Valida o token CSRF
        if (!$this->validateCsrfToken($_POST['csrf_token'] ?? '')) {
            http_response_code(403);
            echo "Requisição inválida.";
            return;
        }

        if (empty($_POST['nome']) || empty($_POST['email'])) {
            http_response_code(400);
            echo "Todos os campos são obrigatórios.";
            return;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo "Email inválido.";
            return;
        }

        // Remove o campo csrf_token dos dados
        unset($_POST['csrf_token']);

        $_POST['password'] = fldCrip($_POST['password'], 0);
        $data = $_POST;
        $userModel = new UserModel();
        $userModel->createUser($data);

        header('Location: /users');
        exit;
    }

    public function edit($idg)
    {
        $id = fldCrip($idg, 1);
        // Recupera o usuário pelo ID
        $userModel = new UserModel();
        $user = $userModel->getUserById($id);

        if (!$user) {
            http_response_code(404);
            echo "Usuário não encontrado.";
            return;
        }

        // Passa o usuário para a view
        $this->render('users/edit', ['user' => $user]);
    }

    public function update($idg)
    {
        // Valida o token CSRF
        if (!$this->validateCsrfToken($_POST['csrf_token'] ?? '')) {
            http_response_code(403);
            echo "Requisição inválida.";
            return;
        }

        if (empty($_POST['nome']) || empty($_POST['email'])) {
            http_response_code(400);
            echo "Todos os campos são obrigatórios.";
            return;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo "Email inválido.";
            return;
        }

        // Remove o campo csrf_token dos dados
        unset($_POST['csrf_token']);
        $id = fldCrip($idg, 1);
        // Atualiza um usuário no banco de dados
        $data = $_POST;
        $userModel = new UserModel();
        $userModel->updateUser($id, $data);

        header('Location: /users');
        exit;
    }

    public function delete($idg)
    {
        $id = fldCrip($idg, 1);
        // Exclui um usuário do banco de dados
        $userModel = new UserModel();
        $userModel->deleteUser($id);

        header('Location: /users');
        exit;
    }

    protected function generateCsrfToken()
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
}
