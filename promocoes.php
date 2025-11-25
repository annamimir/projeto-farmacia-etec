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
    <title>Farmacia</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
    <header>
        <h1>Asclephium</h1><br>
        <input type="text" placeholder="Pesquisar produtos..." class="form-control w-75 mx-auto">
    </header>
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
        <section id="contato">
            <h2>Contato</h2>
            <p>Endereço: Rua da Saúde, 123, Centro, Cidade - Estado</p>
            <p>Telefone: (11) 1234-5678</p>
            <p>Email: contato@farmaciasaude.com</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Farmácia Saúde & Bem-Estar. Todos os direitos reservados.</p>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</body>
</html>