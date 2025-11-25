<?php
session_start();

/* Apenas exemplo — substitua pelos dados reais */
$numeroPedido   = $_SESSION["numero_pedido"] ?? rand(10000, 99999);
$pagamento      = $_SESSION["pagamento"] ?? "Não informado";
$entrega        = $_SESSION["entrega"] ?? "Não informado";
$total          = $_SESSION["total_compra"] ?? "0,00";

/* Status do pedido (exemplo)
   Você pode mudar dinamicamente conforme o banco:
   1 = Pedido recebido
   2 = Em preparação
   3 = Saiu para entrega
   4 = Entregue
*/
$status = $_SESSION["status_pedido"] ?? 1;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Acompanhar Pedido</title>
    <link rel="stylesheet" href="CSS/acompanhar_pedido.css">
</head>
<body>

<div class="container">

    <h2>Acompanhar Pedido</h2>

    <div class="pedido-info">
        <p><strong>Número do Pedido:</strong> #<?= $numeroPedido ?></p>
        <p><strong>Total:</strong> R$ <?= $total ?></p>
        <p><strong>Forma de Pagamento:</strong> <?= ucfirst($pagamento) ?></p>
        <p><strong>Entrega:</strong> <?= $entrega === "delivery" ? "Entrega em domicílio" : "Retirar na loja" ?></p>
    </div>

    <h3>Status do Pedido</h3>

    <div class="status-container">
        <div class="step <?= $status >= 1 ? "active" : "" ?>">
            <span>Pedido Recebido</span>
        </div>

        <div class="step <?= $status >= 2 ? "active" : "" ?>">
            <span>Em Preparação</span>
        </div>

        <div class="step <?= $status >= 3 ? "active" : "" ?>">
            <span>Saiu para Entrega</span>
        </div>

        <div class="step <?= $status >= 4 ? "active" : "" ?>">
            <span>Entregue</span>
        </div>
    </div>

    <div class="barra-progresso">
        <div class="progresso" style="width: <?= ($status - 1) * 33 ?>%;"></div>
    </div>

    <p class="descricao">
        <?php if ($status == 1): ?>
            Seu pedido foi recebido e logo começaremos a preparar.
        <?php elseif ($status == 2): ?>
            Seu pedido está sendo preparado com carinho!
        <?php elseif ($status == 3): ?>
            Seu pedido saiu para entrega. Fique atento!
        <?php elseif ($status == 4): ?>
            Pedido entregue. Obrigado pela preferência!
        <?php endif; ?>
    </p>

</div>

</body>
</html>
