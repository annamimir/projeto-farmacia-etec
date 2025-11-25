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
    <link rel="stylesheet" href="CSS/contato.css">

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
            <p style="padding:12px 15px; font-weight:bold;">
                Olá, <?= htmlspecialchars($nomeExibicao) ?>
            </p>
            <p style="padding: 12px 15px; font-weight:bold;">Olá, <?= htmlspecialchars($nomeExibicao) ?></p>
            <a href="editar_perfil.php">Editar Perfil</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>
            <div class="carrinho-fixo">
            <a href="Carrinho.php"><img src="img/carrinho.png" alt=""  class="icone-carrinho" ></a>
        </div>
</header>   

<!-- MENU LATERAL -->
<nav class="side-menu">
    <label for="menu-toggle" class="close-btn">✖</label>

    <a href="produtos.php">Produtos</a>
    <a href="serviços.php">Serviços</a>
    <a href="contato.php">Contato</a>
</nav>

<!-- NAV abaixo do header -->
<nav class="top-nav">
    <a href="produtos.php">Produtos</a>
    <a href="serviços.php">Serviços</a>
    <a href="contato.php">Contato</a>
</nav>

   <!-- BLOCO ESQUERDO -->
        <section class="info-contato">
            <h2>Informações da Farmácia</h2>

            <p><strong>Endereço:</strong><br>
            Rua da Saúde, 123 – Centro</p>

            <p><strong>Telefone:</strong><br>
            (11) 1234-5678</p>

            <p><strong>Email:</strong><br>
            contato@asclepium.com</p>

            <p><strong>Horários:</strong><br>
            Segunda a Sábado: 8h às 21h <br>
            Domingo: 9h às 18h</p>

            <a href="#" class="whatsapp">Enviar mensagem no WhatsApp</a>
        </section>


        <!-- FORMULÁRIO -->
        <section class="formulario">
            <h2>Envie sua mensagem</h2>

            <form>
                <label>Nome:</label>
                <input type="text" required>

                <label>Email:</label>
                <input type="email" required>

                <label>Assunto:</label>
                <input type="text" required>

                <label>Mensagem:</label>
                <textarea rows="5" required></textarea>

                <button type="submit">Enviar</button>
            </form>
        </section>

    </main>

    <section class="mapa">
        <h2>Como chegar</h2>

        <iframe 
            src="https://www.google.com/maps?q=Rua%20da%20Saúde%20123&output=embed"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </section>

</body>
</html>


<footer>
    <p>&copy; <?= date('Y') ?> Farmácia Saúde & Bem-Estar. Todos os direitos reservados.</p>
    <h2>Contato</h2>
    <p>Endereço: Rua da Saúde, 123, Centro, Cidade - Estado</p>
    <p>Telefone: (11) 1234-5678</p>
    <p>Email: contato@farmaciasaude.com</p>
</footer>