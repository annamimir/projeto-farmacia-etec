<?php
session_start();

$pagamento = $_SESSION['pagamento'] ?? null;
$entrega   = $_SESSION['entrega'] ?? null;
$status    = $_SESSION['status_pedido'] ?? "Aguardando pagamento";
$total     = $_SESSION['total_compra'] ?? 0;
$endereco  = $_SESSION['endereco_loja'] ?? "Loja não encontrada";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Acompanhar Pedido</title>
<link rel="stylesheet" href="CSS/pagamento.css">
</head>
<body>

<div class="container">

    <h2>Acompanhar Pedido</h2>

    <div class="box-info">
        <p><b>Total:</b> R$ <?= $total ?></p>
        <p><b>Pagamento:</b> <?= ucfirst($pagamento) ?></p>
        <p><b>Entrega:</b> <?= ucfirst($entrega) ?></p>
        <p><b>Status:</b> <?= $status ?></p>

        <?php if ($entrega === "retirada"): ?>
            <p><b>Endereço da Loja:</b> <?= $endereco ?></p>
        <?php endif; ?>
    </div>

    <hr><br>

    <?php if ($pagamento === "pix" && $status !== "Pagamento confirmado"): ?>

        <h3>Escaneie o QR Code para pagar</h3>
        <img src="IMG/qrcode.png" width="200">

        <a href="confirmar_pagamento.php" class="btn">Confirmar Pagamento</a>

    <?php endif; ?>

</div>

</body>
</html>
