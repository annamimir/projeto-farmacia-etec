<?php
session_start();

/* Exemplo: você pode puxar o total da compra da sessão */
$total = $_SESSION['total_compra'] ?? "0,00";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Finalizar Pagamento</title>
    <link rel="stylesheet" href="CSS/finalizar_pagamento.css">
</head>
<body>

<div class="container">

    <h2>Finalizar Pagamento</h2>

    <form action="processar_pagamento.php" method="POST" class="form">

        <h3>Forma de Pagamento</h3>

        <div class="opcoes">

            <label class="opcao">
                <input type="radio" name="pagamento" value="credito" required>
                <span>Cartão de Crédito</span>
            </label>

            <label class="opcao">
                <input type="radio" name="pagamento" value="debito" required>
                <span>Cartão de Débito</span>
            </label>

            <label class="opcao">
                <input type="radio" name="pagamento" value="pix" required>
                <span>PIX</span>
            </label>

        </div>

        <h3>Entrega</h3>

        <div class="opcoes">

            <label class="opcao">
                <input type="radio" name="entrega" value="delivery" required>
                <span>Entrega em domicílio</span>
            </label>

            <label class="opcao">
                <input type="radio" name="entrega" value="retirada" required>
                <span>Retirar na Loja</span>
            </label>

        </div>

        <div class="total">
            <p><b>Total da compra:</b> R$ <?= $total ?></p>
        </div>

        <button type="submit" class="btn-finalizar">Confirmar Pedido</button>

    </form>

</div>

</body>
</html>