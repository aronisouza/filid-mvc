<h4 class="mt-4">Editar Usuário</h4>
<form class="form-floating" method="POST" action="/users/edit/<?= fldCrip($user[0]['id'], 0) ?>">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nome" name="nome"  placeholder="nome" value="<?= $user[0]['nome'] ?>">
            <label for="nome">Nome:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?= $user[0]['email'] ?>">
            <label for="email">Email:</label>
        </div>
        <button type="submit" class="btn btn-warning">Atualizar</button>

</form>