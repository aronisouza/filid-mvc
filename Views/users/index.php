<h4 class="mt-4">Lista de Usuários</h4>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['nome'] ?></td>
                <td><?= $user['email'] ?></td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="/users/edit/<?= fldCrip($user['id'], 0) ?>"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-outline-danger btn-sm" href="/users/delete/<?= fldCrip($user['id'], 0) ?>" onclick="return confirm('Tem certeza?')"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
    </tbody>
<?php endforeach; ?>
</table>

<a class="btn btn-success btn-sm" href="/users/create"><i class="bi bi-person-plus-fill"></i> Criar Novo Usuário</a>
