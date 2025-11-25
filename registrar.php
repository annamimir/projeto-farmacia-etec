<?php
session_start();

// 🔗 Importa o arquivo de conexão com o banco
require "conexao.php";

/*  
$erro e $sucesso serão usados para exibir mensagens na tela
*/
$erro = "";
$sucesso = "";

// 🟦 Quando o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recebe e limpa os dados
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = $_POST["password"];
    $confirmar = $_POST["confirmPassword"];

    // 1 — Verifica se as senhas são iguais
    if ($senha !== $confirmar) {
        $erro = "As senhas não coincidem.";
    } 
    else {

        // 2 — Verifica se o e-mail já existe
        $sql = "SELECT id FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $erro = "Este e-mail já está cadastrado.";
        } 
        else {

            // 3 — Criptografa a senha antes de salvar
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // 4 — Insere o novo usuário
            $insert = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
            $stmt2 = $conn->prepare($insert);
            $stmt2->bind_param("sss", $nome, $email, $senhaHash);

            if ($stmt2->execute()) {
                $sucesso = "Conta criada com sucesso! Redirecionando...";
                header("refresh:2;url=login.php");
            } else {
                $erro = "Erro ao cadastrar. Tente novamente.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>

    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<header class="top-header">
    <a href="index.php"><img src="img/logo farmacia-1.png" class="logo" alt="Logo"></a>
</header>

<div class="login-wrapper">
    <h2>Criar conta</h2>
    <p class="subtitle">Preencha suas informações para continuar</p>

    <!-- 🔴 Mensagem de erro -->
    <?php if ($erro): ?>
        <p style="color: red; text-align:center; margin-bottom: 10px;"><?= $erro ?></p>
    <?php endif; ?>

    <!-- 🟢 Mensagem de sucesso -->
    <?php if ($sucesso): ?>
        <p style="color: green; text-align:center; margin-bottom: 10px;"><?= $sucesso ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        
        <div class="form-group">
            <label for="nome">Nome completo</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail ou CPF</label>
            <input type="text" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirmar senha</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
        </div>

        <button type="submit" class="login-btn">Cadastrar</button>

        <p class="signup">
            Já tem uma conta? <a href="login.php">Entrar</a>
        </p>
    </form>
</div>

</body>
</html>