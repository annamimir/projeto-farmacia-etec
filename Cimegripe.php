<?php
// Inicia a sessão para verificar login
session_start();

// Inclui conexão com o banco
require_once "conexao.php";

// Verifica se o usuário está logado
$usuario = $_SESSION['usuario_nome'] ?? null;
$nomeExibicao = $usuario ?? "Visitante";
$logado = (bool)$usuario;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto | Farmácia</title>

    <!-- Bootstrap e CSS do produto -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/produto.css">
</head>
<body>

<!-- Checkbox do menu lateral -->
<input type="checkbox" id="menu-toggle" style="display:none">

<header class="header">

    <div class="header-top">
        <label for="menu-toggle" class="menu-icon">☰</label>

        <a href="index.php"><img src="IMG/logo farmacia-1.png" class="logo" alt=""></a>

        <div class="user-area">
            <img src="IMG/usuario.png" class="avatar" id="avatarBtn">
        </div>
    </div>

    <!-- Barra de pesquisa -->
    <div class="search-box">
        <input type="text" placeholder="Pesquisar produtos...">
    </div>

    <!-- Dropdown de usuário -->
    <div class="user-dropdown" id="userDropdown">
        <?php if ($logado): ?>
            <p style="padding:12px 15px; font-weight:bold;">
                Olá, <?= htmlspecialchars($nomeExibicao) ?>
            </p>
            <a href="editar_perfil.php">Editar Perfil</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <!-- Ícone fixo do carrinho -->
    <div class="carrinho-fixo">
        <a href="carrinho.php"><img src="img/carrinho.png" alt="" class="icone-carrinho"></a>
    </div>
</header>
