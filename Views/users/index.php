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
                <td><?= htmlspecialchars($user['nome']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td>
                    <a class="btn btn-outline-link btn-sm" href="/users/edit/<?= fldCrip($user['id'], 0) ?>">
                        <?=fldIco("editar",'text-primary',20)?>
                    </a>
                    <a class="btn btn-outline-link btn-sm" href="/users/delete/<?= fldCrip($user['id'], 0) ?>" onclick="return confirm('Tem certeza?')">
                        <?=fldIco("lixeira",'text-danger',20)?>
                    </a>
                </td>
            </tr>
    </tbody>
<?php endforeach; ?>
</table>

<a class="btn btn-success btn-sm" href="/users/create"><?=fldIco("addUser",'text-light',20)?> Criar Novo Usuário</a>
