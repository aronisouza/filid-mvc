<h4 class="mt-4">Editar Usuário</h4>
<form class="form-floating" method="POST" action="/users/create">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nome" name="nome"placeholder="name" required>
            <label for="nome">Nome:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email"placeholder="name@example.com" required>
            <label for="email">Email:</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="name@example.com" required>
            <label for="password">Senha:</label>
        </div>

        <button type="submit" class="btn btn-warning">Criar</button>

</form>