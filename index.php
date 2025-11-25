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

  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<!--checkmenu lateral -->
<input type="checkbox" id="menu-toggle" style="display:none">

<header class="header">

    <div class="header-top">
        <label for="menu-toggle" class="menu-icon">☰</label>

        <img src="IMG/logo farmacia-1.png"  class="logo" alt="">

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
    <a href="serviços.php">Serviços </a>
    <a href="contato.php">Contato</a>
</nav>



<section class="destaques-home">
    <div class="destaque-card">
        <h3>💊 Preços Acessíveis</h3>
        <p>Medicamentos com valores que cabem no seu bolso.</p>
    </div>

    <div class="destaque-card">
        <h3>🩺 Serviços Profissionais</h3>
        <p>Aplicação de injeção, aferição e muito mais.</p>
    </div>

    <div class="destaque-card">
        <h3>🚚 Entrega Rápida</h3>
        <p>Receba seus medicamentos no conforto da sua casa.</p>
    </div>
</section>
<main>
<br>
    <section id="promocoes">
         <h2 class="text-center mb-3">Promoções</h2><br>
        <div class="cards">
            <div class="card">
                <a href="Cimegripe.php"><img src="img/cimegripe.png" alt="Promoções"><br>
                <h2 class="promocao">R$ 8.99</h2></a>
            </div>
            <div class="card">
                <a href="Resfenol.php"><img src="img/Resfenol.png" alt="Promoções"><br>
                <h2 class="promocao">R$ 12.90</h2></a>
            </div>
        </div>
    </section>

<!--        CARROSSEL AQUI           -->

<section id="carrossel" class="my-4"><br>
    <h2 class="text-center mb-3">Destaques da Semana</h2><br>

    <div id="carouselExampleIndicators" 
         class="carousel slide" 
         data-bs-ride="carousel" 
         data-bs-interval="3000"
         data-bs-wrap="true">

        <!-- Indicadores -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"></button>
        </div>

        <!-- Imagens -->
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="IMG/bons preços.png" class="d-block mx-auto rounded-slide" alt="Imagem 1">
            </div>

            <div class="carousel-item">
                <img src="IMG/servicos.png" class="d-block mx-auto rounded-slide" alt="Imagem 2">
            </div>

            <div class="carousel-item">
                <img src="IMG/carrossel_imagem1.jpg" class="d-block mx-auto rounded-slide" alt="Imagem 3">
            </div>

        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</section>

</section>
</section>
<section class="newsletter-expandida my-5 p-4">

    <h2 class="text-center mb-3">Participe e Ajude a Melhorar Nossa Farmácia!</h2>

    <p class="text-center mb-4">
        Queremos oferecer o melhor atendimento possível.  
        Deixe suas informações, receba promoções exclusivas e nos envie sugestões de produtos e serviços!
    </p>

    <form class="newsletter-form container">

        <div class="row">

            <div class="col-md-4 mb-3">
                <label class="form-label">Seu nome</label>
                <input type="text" class="form-control" placeholder="Digite seu nome">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" placeholder="seuemail@gmail.com">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Telefone (opcional)</label>
                <input type="text" class="form-control" placeholder="(00) 00000-0000">
            </div>

        </div>

        <div class="row">

            <div class="col-12 mb-3">
                <label class="form-label">Sugestões de produtos ou serviços que você gostaria que tivéssemos</label>
                <textarea class="form-control" rows="3" placeholder="Conte sua ideia..."></textarea>
            </div>

        </div>

        <div class="text-center mt-3">
            <button type="submit" class="btn btn-success px-4 py-2">
                Enviar e participar
            </button>
        </div>

    </form>

</section>
</main>
<br><br>
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
