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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/produtos.css">

    <style>
    </style>
</head>

<body>


<!--checkmenu lateral -->
<input type="checkbox" id="menu-toggle" style="display:none">

<header class="header">

    <div class="header-top">
        <label for="menu-toggle" class="menu-icon">☰</label>

       <a href="index.php"><img src="IMG/logo farmacia-1.png"  class="logo" alt=""></a>

        <div class="user-area">
            <img src="IMG/usuario.png" class="avatar" id="avatarBtn">
        </div>
    </div>

    <div class="search-box">
        <input type="text" placeholder="Pesquisar produtos...">
    </div>

    <div class="user-dropdown" id="userDropdown">
        <?php if ($logado): ?>
            <p style="padding: 12px 15px; font-weight:bold;">Olá, <?= htmlspecialchars($nomeExibicao) ?></p>
            <a href="editar_perfil.php">Editar Perfil</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>
 </div>
            <div class="carrinho-fixo">
            <a href="Carrinho.php"><img src="img/carrinho.png" alt=""  class="icone-carrinho" ></a>
        </div>
</header>   

<!-- MENU LATERAL -->
<nav class="side-menu">
    <label for="menu-toggle" class="close-btn">✖</label>

    <a href="promocoes.php">Promoções</a>
    <a href="produtos.php">Produtos</a>
    <a href="serviços.php">Serviços</a>
    <a href="contato.php">Contato</a>
</nav>

<!-- NAV abaixo do header -->
<nav class="top-nav">
    <a href="promocoes.php">Promoções</a>
    <a href="produtos.php">Produtos</a>
    <a href="serviços.php">Serviços</a>
    <a href="contato.php">Contato</a>
</nav>
<h1 class= "titulo">Produtos</h1>
<section class="cards">

    <div class="card">
        <img src="IMG/benegrip.png">
        <h3>Benegripe</h3>
        <p class="promocao">R$ 35.24 </p>
        <a href="Benegripe.php"><button class="btn-add">Ver Produto</button></a>
    </div>

    <div class="card">
        <img src="IMG/Cimegripe.png">
        <h3>Cimegripe</h3>
        <p class="promocao">R$ 14.99</p>
        <a href="Cimegripe.php"><button class="btn-add">Ver Produto</button></a>
    </div>

    <div class="card">
        <img src="IMG/Naldecon.png">
        <h3>Naldecon</h3>
        <p class="promocao">R$ 19.90</p>
        <a href="Naldecon.php"><button class="btn-add">Ver Produto</button></a>
    </div>

    <div class="card">
        <img src="IMG/Paracetamol 500mg.png">
        <h3>Paracetamol</h3>
        <p class="promocao">R$ 11.99 </p>
        <a href="Paracetamol.php"><button class="btn-add">Ver Produto</button></a>
    </div>

</section>

<section class="cards">

    <div class="card">
        <img src="IMG/Shampoo pantene Brilho extremo 200ml.jpg">
        <h3>Shampoo Pantene</h3>
        <p class="promocao">R$ 13.99</p>
        <a href="Shampoo pantene Brilho extremo 200ml.php"><button class="btn-add">Ver Produto</button></a>
    </div>

    <div class="card">
        <img src="IMG/Resfenol.png">
        <h3>Resfenol</h3>
        <p class="promocao">R$ 12.90</p>
        <a href="Resfenol.php"><button class="btn-add">Ver Produto</button></a>
    </div>

    <div class="card">
        <img src="IMG/protetorsolar.png">
        <h3>Protetor Solar Infantil</h3>
        <p class="promocao">R$ 47.94</p>
        <a href="Protetor Solar Infantil.php"><button class="btn-add">Ver Produto</button></a>
    </div>

    <div class="card">
        <img src="IMG/Fralda.png">
        <h3>Fralda</h3>
        <p class="promocao">R$ 78.90</p>
        <a href="fralda.php"><button class="btn-add">Ver Produto</button></a>
    </div>
</section>

</main>
<br><br><br><br>
<footer>
    <p>&copy; <?= date('Y') ?> Farmácia Saúde & Bem-Estar. Todos os direitos reservados.</p>
    <h2>Contato</h2>
    <p>Endereço: Rua da Saúde, 123, Centro, Cidade - Estado</p>
    <p>Telefone: (11) 1234-5678</p>
    <p>Email: contato@farmaciasaude.com</p>
</footer>
</body>
</html>
