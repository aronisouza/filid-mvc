<style>
    body {
        background-color: #0f0c29;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: 'Arial', sans-serif;
    }

    .container {
        text-align: center;
    }

    .rocket {
        font-size: 5rem;
        margin-bottom: 20px;
        transition: transform 3s ease-in-out;
    }

    .rocket.fly {
        transform: translateY(-100vh) rotate(45deg);
    }

    .btn-primary {
        margin-top: 20px;
        background-color: #ff6f61;
        border: none;
        padding: 10px 20px;
        font-size: 1.2rem;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #ff4a3d;
    }
</style>

<div class="container">
    <div class="rocket">🚀</div>
    <h1 class="display-1">404</h1>
    <p class="lead">Oops! Página não encontrada.</p>
    <p>Parece que você se perdeu no espaço. Vamos te levar de volta!</p>
    <button id="launchRocket" class="btn btn-primary">Decolar Foguete</button>
</div>


<!-- Script para interação -->
<script>
    document.getElementById('launchRocket').addEventListener('click', function() {
        const rocket = document.querySelector('.rocket');
        rocket.classList.add('fly'); // Adiciona a animação de voo

        // Redireciona após a animação terminar
        setTimeout(() => {
            window.location.href = '/'; // Altere para o URL da sua página inicial
        }, 2000); // Tempo da animação (2 segundos)
    });
</script>