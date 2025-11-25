<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="CSS/servicos.css">
</head>
<body>
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
<body>

    <header class="titulo-box">
        <h1>Serviços da Farmácia Saúde & Cuidado</h1>
    </header>

    <section class="servicos">
        <h2>Aplicação de Injetáveis</h2>
        <p>
            Realizamos aplicações de medicamentos injetáveis com total segurança e profissionais habilitados.
            Ideal para quem precisa manter tratamentos recorrentes e deseja praticidade.
        </p>

        <h2>Aferição de Pressão Arterial</h2>
        <p>
            A aferição de pressão é rápida e eficiente, ajudando no controle da hipertensão e na prevenção de doenças cardiovasculares.
        </p>

        <h2>Teste de Glicemia</h2>
        <p>
            Com aparelhos modernos, oferecemos testes de glicemia precisos e imediatos, essenciais para diabéticos e pessoas em acompanhamento.
        </p>

        <h2>Entrega de Medicamentos</h2>
        <p>
            Entregamos medicamentos com rapidez e segurança, oferecendo conforto e praticidade, principalmente para idosos.
        </p>

        <h2>Cuidados Domiciliares para Idosos</h2>
        <p>
            Serviço especializado para cuidados básicos, administração de medicamentos, acompanhamento diário e organização da rotina.
            Ideal para famílias que buscam mais segurança e qualidade de vida aos seus idosos.
        </p>
    </section>

    <section class="tabela-section">
        <h2>Melhorias Observadas nos Idosos com Cuidados Domiciliares</h2>

        <table>
            <tr>
                <th>Condição</th>
                <th>Sem Cuidados</th>
                <th>Com Cuidados</th>
                <th>Melhoria (%)</th>
            </tr>

            <tr>
                <td>Adesão aos remédios</td>
                <td>50%</td>
                <td>92%</td>
                <td>+42%</td>
            </tr>

            <tr>
                <td>Redução de quedas</td>
                <td>3 quedas/ano</td>
                <td>1 queda/ano</td>
                <td>66%</td>
            </tr>

            <tr>
                <td>Níveis de ansiedade</td>
                <td>Alta</td>
                <td>Baixa</td>
                <td>—</td>
            </tr>

            <tr>
                <td>Higiene e rotina pessoal</td>
                <td>Irregular</td>
                <td>Estável</td>
                <td>—</td>
            </tr>

            <tr>
                <td>Independência nas atividades</td>
                <td>Baixa</td>
                <td>Moderada/Alta</td>
                <td>—</td>
            </tr>

            <tr>
                <td>Qualidade do sono</td>
                <td>Ruim</td>
                <td>Boa</td>
                <td>—</td>
            </tr>
        </table>
    </section>

</body>
</html>
    </main>
    <footer>
        <section id="contato">
            <h2>Contato</h2>
            <p>Endereço: Rua da Saúde, 123, Centro, Cidade - Estado</p>
            <p>Telefone: (11) 1234-5678</p>
            <p>Email: contato@farmaciasaude.com</p>
        </section>
        <p>&copy; 2023 Farmácia Saúde & Bem-Estar. Todos os direitos reservados.</p>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</body>
</html>