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
    <h1>Farmácia Modelo</h1>
    <input type="checkbox" id="check">
    <label for="check" class="botao">&#9776;</label>

    <lateral class="menu-lateral">
      <ul>
          <li>
              <input type="checkbox" id="check">
              <label for="check" class="botao">&#10006;</label>
          </li>
          <li><a href="Medicamentos.html"> Medicamentos </a></li>
          <li><a href="Beleza.html"> Beleza </a></li>
          <li><a href="Promoções.html"> Promoções </a></li>
          <li><a href="ClubeDePontos.html"> Clube de Pontos </a></li>
      </ul>

    </lateral>
 
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
            <img src="IMG/Cimegripe.png" alt="Nome do Produto" class="produto-img">
        </div>

        <!-- INFORMAÇÕES DO PRODUTO -->
        <div class="col-md-7">
            <h2>Cimegripe - 20 Cápsulas</h2>

            <p class="preco">R$ 14,99</p>

            <p>
                O Cimegripe é indicado para o alívio dos sintomas da gripe e resfriado,
                como dor de cabeça, febre, dor no corpo, dor de garganta e congestão nasal.
            </p>

            <ul>
                <li>Marca: Cimed</li>
                <li>Categoria: Antigripais</li>
                <li>Disponível na loja e para entrega</li>
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

            <div class="col-md-3">
                <div class="card-prod">
                    <img src="https://via.placeholder.com/200" class="img-fluid" alt="">
                    <h6 class="mt-2">Naldecon Dia – 20 Comprimidos</h6>
                    <p class="preco">R$ 19,90</p>
                    <a href="#" class="btn btn-outline-success w-100">Ver Produto</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-prod">
                    <img src="https://via.placeholder.com/200" class="img-fluid" alt="">
                    <h6 class="mt-2">Benegripe Multi – 12 Cápsulas</h6>
                    <p class="preco">R$ 16,50</p>
                    <a href="#" class="btn btn-outline-success w-100">Ver Produto</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-prod">
                    <img src="https://via.placeholder.com/200" class="img-fluid" alt="">
                    <h6 class="mt-2">Resfenol – 20 Cápsulas</h6>
                    <p class="preco">R$ 12,90</p>
                    <a href="#" class="btn btn-outline-success w-100">Ver Produto</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-prod">
                    <img src="https://via.placeholder.com/200" class="img-fluid" alt="">
                    <h6 class="mt-2">Gripenet – 12 Cápsulas</h6>
                    <p class="preco">R$ 10,99</p>
                    <a href="#" class="btn btn-outline-success w-100">Ver Produto</a>
                </div>
            </div>

        </div>
    </section>

</main>

<footer class="text-center mt-5 p-3 bg-light">
    <p>&copy; 2025 Farmácia Modelo. Todos os direitos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
