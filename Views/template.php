<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Sistema</title>
    <!-- CSS -->
    <link rel="stylesheet" href="/Public/Css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Css/bootstrap-icons.min.css">
    <script src="/Public/Js/sweetalert2.js" nonce="<?= $_SESSION['csp_nonce'] ?>"></script>
    <script src="/Public/Js/alertas.js"  nonce="<?= $_SESSION['csp_nonce'] ?>"></script>
</head>
<body class="bg-success-subtle">
    <!-- Menu -->
    <?php include __DIR__ . '/components/navbar.php'; ?>

    <!-- Conteúdo Dinâmico -->
    <div class="container">
        <?php require_once $content; ?>
    </div>

    <!-- JavaScript -->
    <script src="/Public/Js/jquery-3.6.4.min.js"  nonce="<?= $_SESSION['csp_nonce'] ?>"></script>
    <script src="/Public/Js/bootstrap.bundle.min.js"  nonce="<?= $_SESSION['csp_nonce'] ?>"></script>
    <script src="/Public/Js/Chartjs-v4.4.7.js"  nonce="<?= $_SESSION['csp_nonce'] ?>"></script>
</body>
</html>