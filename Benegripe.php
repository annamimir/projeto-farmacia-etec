<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto | Farmácia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/estilo.css">

    <style>
    </style>
</head>

<body>

<header>
    <a href="index.php"> <h1>Asclephium</h1></a>
    <input type="text" placeholder="Pesquisar produtos..." class="form-control w-75 mx-auto">
</header>
<nav>
        <a href="#promocoes">promoçoes</a>
        <a href="#produtos">produtos</a>
        <a href="#servicos">serviços</a>
        <a href="#contato">contato</a>
    </nav>
<main class="container mt-5">

    <!-- ==============================
         SEÇÃO PRINCIPAL DO PRODUTO
    ==================================== -->
    <div class="row align-items-center">

        <!-- IMAGEM DO PRODUTO -->
        <div class="col-md-5 text-center">
            <img src="IMG/Benegrip.png" alt="Nome do Produto" class="produto-img">
        </div>

        <!-- INFORMAÇÕES DO PRODUTO -->
        <div class="col-md-7">
         <h2>Benegripe Multi – 12 Cápsulas</h2>

        <p class="preco">R$ 16,50</p>

    <p>
    O Benegripe Multi é indicado para o alívio dos sintomas da gripe, oferecendo ação
    analgésica e descongestionante. Auxilia na redução da febre, dores musculares,
    congestão nasal e mal-estar gripal.
    </p>

    <ul>
    <li>Marca: Hypera Pharma</li>
    <li>Categoria: Antigripais</li>
    </ul>

            <button class="btn btn-success btn-lg mt-3">Adicionar ao Carrinho</button>
        </div>
    </div>

    <hr class="my-5">

    <!-- ==============================
         PRODUTOS RELACIONADOS
    ==================================== -->
    <section>
        <h3>Produtos Relacionados</h3>

        <div class="row mt-4">

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
                    <h6 class="mt-2">Cimegripe – 12 Cápsulas</h6>
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

<footer class="text-center mt-5 p-3 bg-light">
    <p> 2025 Asclephium.</p>
</footer>

</body>
</html>
