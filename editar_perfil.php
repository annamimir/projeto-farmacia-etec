<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// pega dados da sessão
$nome = $_SESSION['usuario_nome'] ?? "";
$sobrenome = $_SESSION['usuario_sobrenome'] ?? "";
$email = $_SESSION['usuario_email'] ?? "";
$telefone = $_SESSION['usuario_telefone'] ?? "";
$cpf = $_SESSION['usuario_cpf'] ?? "";
$nascimento = $_SESSION['usuario_nascimento'] ?? "";
$genero = $_SESSION['usuario_genero'] ?? "";

$mensagem = "";

// se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $novoNome = trim($_POST["nome"]);
    $novoSobrenome = trim($_POST["sobrenome"]);
    $novoEmail = trim($_POST["email"]);
    $novoTelefone = trim($_POST["telefone"]);
    $novoCpf = trim($_POST["cpf"]);
    $novoNascimento = trim($_POST["nascimento"]);
    $novoGenero = trim($_POST["genero"]);

    // salva tudo na sessão por enquanto
    $_SESSION["usuario_nome"] = $novoNome;
    $_SESSION["usuario_sobrenome"] = $novoSobrenome;
    $_SESSION["usuario_email"] = $novoEmail;
    $_SESSION["usuario_telefone"] = $novoTelefone;
    $_SESSION["usuario_cpf"] = $novoCpf;
    $_SESSION["usuario_nascimento"] = $novoNascimento;
    $_SESSION["usuario_genero"] = $novoGenero;

    // redireciona
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Perfil</title>
    <link rel="stylesheet" href="CSS/editar_perfil.css">
</head>

<body>

<div class="container-perfil">

    <h2>Gerenciar Perfil</h2>

    <?php if (!empty($mensagem)): ?>
        <p class="msg-sucesso"><?= $mensagem ?></p>
    <?php endif; ?>

    <form method="POST" class="form-perfil">

        <div class="linha">
            <div class="campo">
                <label>Nome*</label>
                <input type="text" name="nome" value="<?= htmlspecialchars($nome) ?>" required>
            </div>

            <div class="campo">
                <label>Sobrenome*</label>
                <input type="text" name="sobrenome" value="<?= htmlspecialchars($sobrenome) ?>" required>
            </div>
        </div>

        <div class="linha">
            <div class="campo">
                <label>Email*</label>
                <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
            </div>

            <div class="campo">
                <label>Telefone*</label>
                <input type="text" name="telefone" value="<?= htmlspecialchars($telefone) ?>">
            </div>
        </div>

        <div class="linha">
            <div class="campo">
                <label>CPF*</label>
                <input type="text" name="cpf" value="<?= htmlspecialchars($cpf) ?>" required>
            </div>

            <div class="campo">
                <label>Data de nascimento*</label>
                <input type="date" name="nascimento" value="<?= htmlspecialchars($nascimento) ?>" required>
            </div>
        </div>

        <div class="linha">
            <div class="campo">
                <label>Gênero*</label>
                <select name="genero">
                    <option value="Masculino" <?= $genero === "Masculino" ? "selected" : "" ?>>Masculino</option>
                    <option value="Feminino" <?= $genero === "Feminino" ? "selected" : "" ?>>Feminino</option>
                    <option value="Outro" <?= $genero === "Outro" ? "selected" : "" ?>>Outro</option>
                </select>
            </div>
        </div>

        <button class="btn-salvar" type="submit">Salvar</button>

    </form>

</div>

</body>
</html>
