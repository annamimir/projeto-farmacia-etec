<?php
session_start();
require_once "conexao.php"; // ← precisa SIM

// se quiser impedir acesso sem login:
if (!isset($_SESSION['usuario_id'])) {
    header("Location: Login.php");
    exit;
}

$total = $_SESSION['total_compra'] ?? 0;
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