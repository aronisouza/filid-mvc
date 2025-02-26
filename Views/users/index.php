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
                        <?= fldIco("editar", 'text-primary', 20) ?>
                    </a>
                    <a href="#" class="btn btn-outline-link" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="<?= fldCrip($user['id'], 0) ?>">
                        <?= fldIco("lixeira", 'text-danger', 20) ?>
                    </a>
                    
                </td>
            </tr>
    </tbody>
<?php endforeach; ?>
</table>

<a class="btn btn-success btn-sm" href="/users/create"><?= fldIco("addUser", 'text-light', 20) ?> Criar Novo Usuário</a>

<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza de que deseja excluir este usuário?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a id="botaoExcluir" href="#" class="btn btn-danger">Confirmar</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
if (document.getElementById('confirmDeleteModal')) {
    document.getElementById('confirmDeleteModal').addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;
        const dataid = button.getAttribute('data-id');
        const botaoExcluir = document.getElementById('confirmDeleteModal').querySelector('#botaoExcluir');
        botaoExcluir.setAttribute('href', `/users/delete/${dataid}`);
    });
}
</script>
