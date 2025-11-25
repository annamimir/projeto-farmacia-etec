<?php
session_start();

$pagamento = $_SESSION['pagamento'] ?? null;
$entrega   = $_SESSION['entrega'] ?? null;
$total     = $_SESSION['total_compra'] ?? 0;

if (!$pagamento || !$entrega) {
    header("Location: finalizar_pagamento.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pagamento</title>
</head>
<body>

<h2>Pagamento</h2>

<p><b>Total:</b> R$ <?= $total ?></p>
<p><b>Forma de Pagamento:</b> <?= ucfirst($pagamento) ?></p>
<p><b>Entrega:</b> <?= ucfirst($entrega) ?></p>

<hr>

<?php if ($pagamento === "pix"): ?>

    <h3>Escaneie o QR Code</h3>
    <img src="IMG/qrcode.png" width="300">

    <form action="confirmar_pagamento.php" method="POST">
        <button type="submit">Confirmar Pagamento PIX</button>
    </form>

<?php elseif ($pagamento === "credito" || $pagamento === "debito"): ?>

    <h3>Dados do Cartão</h3>

    <form action="confirmar_pagamento.php" method="POST">
        <input type="text" placeholder="Número do cartão" required><br>
        <input type="text" placeholder="Validade" required><br>
        <input type="text" placeholder="CVV" required><br><br>

        <button type="submit">Pagar</button>
    </form>

<?php endif; ?>

</body>
</html>
