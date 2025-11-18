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
    <nav>
        <a href="promocoes.php">Promoções</a>
        <a href="produtos.php">Produtos</a>
        <a href="serviços.php">Serviços teste</a>
        <a href="contato.php">Contato</a>
    </nav>
    <main>
        <section id="promocoes">
            <h2>promocoes</h2>
            <div class="cards">
      <div class="card">
        <a href="modelpagprod.php">fralda de bebe</a>
        <br><br>
      </div>
      <div class="card">
        <a href="link aqui">fralda de velhos</a>
       <br><br>
      </div>
  
  
      </div>
    </div>
        </section>
        
        <!-- Carrossel -->

        <section id="carrossel">
            <h2>Destaques da Semana</h2>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="IMG/Cimegripe.png" class="carrossel" alt="Medicamentos em Oferta">
                        
                        <div class="Titulocarrossel">
                            <h5>Medicamentos em Oferta</h5>
                            <p>Descontos especiais em remédios para resfriados.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/800x400/28a745/ffffff?text=Produtos+de+Higiene" class="d-block w-100" alt="Produtos de Higiene">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Produtos de Higiene</h5>
                            <p>Novas linhas de cuidados pessoais.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/800x400/dc3545/ffffff?text=Serviços+Especializados" class="d-block w-100" alt="Serviços Especializados">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Serviços Especializados</h5>
                            <p>Consultoria e vacinação disponíveis.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
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
        <p>&copy; 2023 Farmácia Saúde & Bem-Estar. Todos os direitos reservados.</p>
        <h2>Contato</h2>
            <p>Endereço: Rua da Saúde, 123, Centro, Cidade - Estado</p>
            <p>Telefone: (11) 1234-5678</p>
            <p>Email: contato@farmaciasaude.com</p>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</body>
</html>