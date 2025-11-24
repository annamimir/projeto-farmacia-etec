<?php
session_start();
$usuario = $_SESSION['usuario_nome'] ?? null;
$nomeExibicao = $usuario ?? "Visitante";
$logado = (bool)$usuario;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmacia</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>

<!-- Checkbox invisível do menu lateral -->
<input type="checkbox" id="menu-toggle" style="display:none">

<header class="header">

    <div class="header-top">
        <label for="menu-toggle" class="menu-icon">☰</label>

      <img src="IMG/logo farmacia-1.png" alt="">

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

</header>   


<nav class="side-menu">

    <label for="menu-toggle" class="close-btn">✖</label>

    <a href="promocoes.php">Promoções</a>
    <a href="produtos.php">Produtos</a>
    <a href="servicos.php">Serviços</a>
    <a href="contato.php">Contato</a>
</nav>


<nav class="top-nav">
    <a href="promocoes.php">Promoções</a>
    <a href="produtos.php">Produtos</a>
    <a href="servicos.php">Serviços teste</a>
    <a href="contato.php">Contato</a>
</nav>

<main>
    <section id="promocoes">
        <h2>promocoes</h2>
        <div class="cards">
            <div class="card">
                <a href="modelpagprod.php">fralda de bebe</a><br><br>
            </div>
            <div class="card">
                <a href="#">fralda de velhos</a><br><br>
            </div>
        </div>
    </section>

    <section id="carrossel">
        <h2>Destaques da Semana</h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    
        </div>
    </section>

    <section id="produtos">
        <h2>Produtos em Destaque</h2>
        <ul>
            <li>Medicamentos para resfriados e gripes</li>
            <li>Produtos de higiene pessoal</li>
            <li>Vitaminas e suplementos</li>
            <li>Cosméticos e cuidados com a pele</li>
        </ul>
    </section>

    <section id="servicos">
        <h2>Serviços Oferecidos</h2>
        <ul>
            <li>Consultoria farmacêutica</li>
            <li>Entrega a domicílio</li>
            <li>Testes de pressão arterial</li>
            <li>Vacinação</li>
        </ul>
    </section>
</main>

<footer>
    <p>&copy; <?= date('Y') ?> Farmácia Saúde & Bem-Estar. Todos os direitos reservados.</p>
    <h2>Contato</h2>
    <p>Endereço: Rua da Saúde, 123, Centro, Cidade - Estado</p>
    <p>Telefone: (11) 1234-5678</p>
    <p>Email: contato@farmaciasaude.com</p>
</footer>

<script>

const avatar = document.getElementById("avatarBtn");
const dropdown = document.getElementById("userDropdown");

avatar.addEventListener("click", (e) => {
    e.stopPropagation();
    dropdown.classList.toggle("show");
});

document.addEventListener("click", () => {
    dropdown.classList.remove("show");
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
