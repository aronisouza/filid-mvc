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
}
