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
    <link rel="stylesheet" href="css/produto.css">

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

    <a href="produtos.php">Produtos</a>
    <a href="servicos.php">Serviços</a>
    <a href="contato.php">Contato</a>
</nav>

<!-- NAV abaixo do header -->
<nav class="top-nav">
    <a href="produtos.php">Produtos</a>
    <a href="servicos.php">Serviços teste</a>
    <a href="contato.php">Contato</a>
</nav>
<main class="container mt-5">

 
    <div class="row align-items-center">

        <!-- IMAGEM DO PRODUTO -->
        <div class="col-md-5 text-center">
            <img src="IMG/Benegrip.png" alt="Nome do Produto" class="produto-img">
        </div>

        <!-- INFORMAÇÕES DO PRODUTO -->
        <div class="col-md-7">
            <h2>Benegrip Multi Solução Oral Sabor Frutas Vermelhas 240ml</h2>

            <p class="preco">R$ 35,24</p>

            <p>
                Benegrip Multi alivia dor, febre e congestão nasal em um só produto, tratando os sintomas da gripe. Sua fórmula exclusiva permite doses ajustáveis para crianças a partir de 2 anos.
            </p>

            <ul>
                <li>Marca: Benegrip</li>
                <li>Categoria: Antigripais</li>
                <li>Disponível na loja e para entrega</li>
            </ul>

                <button class="add-carrinho"
                data-id="1"
                data-name="Benegripe"
                data-preco="35.24"
                data-img="IMG/Benegrip.png">
                Adicionar ao carrinho
                </button>
        </div>
    </div>

    <hr class="my-5">

    <!-- ==============================
         PRODUTOS RELACIONADOS
    ==================================== -->
    <section>
        <h3>Produtos Relacionados</h3>

         <div class="esteira-4">

            <div class="ProdRel">
                <div class="card-prod">
                    <img src="IMG/Naldecon.png" class="img-fluid" alt="">
                    <h6 class="mt-2">Naldecon Dia – 20 Comprimidos</h6>
                    <p class="preco">R$ 19,90</p>
                    <a href="Naldecon.php" class="btn btn-outline-success w-100">Ver Produto</a>
                </div>
            </div>

            <div class="ProdRel">
                <div class="card-prod">
                    <img src="IMG/Cimegripe.png" class="img-fluid" alt="">
                    <h6 class="mt-2">Cimegripe – 20 Capsulas</h6>
                    <p class="preco">R$ 14,99</p>
                    <a href="Cimegripe.php" class="btn btn-outline-success w-100">Ver Produto</a>
                </div>
            </div>

            <div class="ProdRel">
                <div class="card-prod">
                    <img src="IMG/Resfenol.png" class="img-fluid" alt="">
                    <h6 class="mt-2">Resfenol – 20 Cápsulas</h6>
                    <p class="preco">R$ 12,90</p>
                    <a href="Resfenol.php" class="btn btn-outline-success w-100">Ver Produto</a>
                </div>
            </div>

            <div class="ProdRel">
                <div class="card-prod">
                    <img src="IMG/Paracetamol 500mg.png" class="img-fluid" alt="">
                    <h6 class="mt-2">Paracetamol 500mg - 20 Comprimidos</h6>
                    <p class="preco">R$ 8,99</p>
                    <a href="Paracetamol.php" class="btn btn-outline-success w-100">Ver Produto</a>
                </div>
            </div>

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
<script>
document.addEventListener("DOMContentLoaded", () => {

    // Quando clicar no botão
    document.querySelector(".add-carrinho").addEventListener("click", function () {

        // 1️⃣ PEGAR DADOS DO PRODUTO
        const nome   = this.dataset.name;
        const preco  = parseFloat(this.dataset.preco);
        const imagem = this.dataset.img;

        // 2️⃣ PUXAR CARRINHO ATUAL OU CRIAR UM NOVO
        let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

        // 3️⃣ VERIFICAR SE O PRODUTO JÁ ESTÁ NO CARRINHO
        let itemExistente = carrinho.find(item => item.nome === nome);

        if (itemExistente) {
            itemExistente.quantidade++;
            itemExistente.subtotal = itemExistente.quantidade * itemExistente.preco;
        } else {
            carrinho.push({
                nome: nome,
                preco: preco,
                quantidade: 1,
                imagem: imagem,
                subtotal: preco
            });
        }

        // 4️⃣ SALVAR
        localStorage.setItem("carrinho", JSON.stringify(carrinho));

        alert("Produto adicionado ao carrinho!");
    });

});
</script>

</body>
</html>
