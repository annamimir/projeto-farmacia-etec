<?php
session_start();

// linkar com BD
$conn = new mysqli("localhost", "root", "", "farmacia");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$erro = "";

// Mandando formulario 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $senha = $_POST["password"];

    // procura user no BD
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verifica 
    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // Verificar senha
        if (password_verify($senha, $usuario["senha"])) {
            // Login OK  dps→ criar sessão
            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["usuario_nome"] = $usuario["nome"];

            header("Location: index.php"); // redirecionar para página inicial logado
            exit;
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "E-mail não encontrado.";
    }
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