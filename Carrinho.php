<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>

    <!-- CSS da página -->
    <link rel="stylesheet" href="css/carrinho.css">
</head>
<body>

<!-- Cabeçalho -->
<header class="cabecalho">
    <a href="index.php"><img src="img/logo farmacia-1.png" alt="" class="logo"></a>
</header>

<!-- Menu superior -->
<nav class="menu-navegacao">
    <a href="index.php">Início</a>
    <a href="produtos.php">Produtos</a>
    <a href="promocoes.php">Promoções</a>
    <a href="carrinho.php">Carrinho</a>
</nav>

<!-- Conteúdo principal -->
<main class="conteudo-carrinho">

    <h2 class="titulo-carrinho">Seu Carrinho</h2>

    <!-- Lista de produtos adicionados -->
    <div id="lista-carrinho" class="lista-carrinho">
    </div>
   
    <!-- Resumo do carrinho (valor total + botão) -->
    <aside class="resumo-carrinho">
        <h3>Resumo</h3>

        <p class="texto-total">
            Total: <span id="total-carrinho">R$ 0,00</span>
        </p>
        
        <button class="btn-finalizar" id="btn-finalizar">Finalizar Compra</button>
    </aside>

</main>

<!-- Script que controla o carrinho via localStorage -->
<script src="js/carrinho.js"></script>

</body>
</html>
