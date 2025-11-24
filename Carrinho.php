<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>

    <link rel="stylesheet" href="css/carrinho.css">
</head>
<body>

<header class="cabecalho">
    <a href="index.php"><img src="img/logo farmacia-1.png" alt="" class= "logo"></img></a>
</header>

<nav class="menu-navegacao">
    <a href="index.php">Início</a>
    <a href="produtos.php">Produtos</a>
    <a href="promocoes.php">Promoções</a>
    <a href="carrinho.php">Carrinho</a>
</nav>

<main class="conteudo-carrinho">

    <h2 class="titulo-carrinho">Seu Carrinho</h2>

    <div id="lista-carrinho" class="lista-carrinho">
        
    <img src="${item.imagem}" class="img-produto">
    </div>
   
    <aside class="resumo-carrinho">
        <h3>Resumo</h3>

        <p class="texto-total">
            Total: <span id="total-carrinho">R$ 0,00</span>
        </p>

        <button class="btn-finalizar" id="btn-finalizar">Finalizar Compra</button>
    </aside>

</main>

<script src="js/carrinho.js"></script>

</body>
</html>