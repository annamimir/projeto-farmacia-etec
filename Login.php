<?php
session_start();
require "conexao.php"; // Conexão com o banco (variável $pdo)

$erro = "";

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // 🧼 Sanitização dos campos
    $email = trim($_POST["email"]);
    $senha = trim($_POST["password"]);

    // 🔍 Busca o usuário pelo e-mail usando PDO
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $sql->execute([$email]);
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    // Se encontrou o usuário
    if ($usuario) {

        // 🔐 Verifica senha criptografada
        if (password_verify($senha, $usuario['senha'])) {

            // Salva dados na sessão
            $_SESSION["usuario_id"] = $usuario['id'];
            $_SESSION["usuario_nome"] = $usuario['nome'];

            header("Location: index.php");
            exit;
        }
    }

    // Se deu errado
    $erro = "E-mail ou senha incorretos";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<header class="top-header">
    <a href="index.php"><img src="img/logo farmacia-1.png" class="logo" alt="Logo"></a>
</header>

<div class="login-wrapper">
    <h2>Entrar</h2>
    <p class="subtitulo">Use seu e-mail e senha para acessar sua conta</p>

    <?php if ($erro): ?>
        <p style="color: #0a6569; text-align:center; margin-bottom: 10px;">
            <?= $erro ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="email">E-mail ou CPF</label>
            <input type="text" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <div class="password-box">
                <input type="password" id="password" name="password" required>
            </div>
        </div>

        <button type="submit" class="login-btn">Entrar</button>

        <p class="signup">
            Não tem conta? <a href="registrar.php">Cadastre-se</a>
        </p>
    </form>
</div>

</body>
</html>