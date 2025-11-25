<?php
session_start();

$formaPagamento = $_POST['pagamento'] ?? '';
$formaEntrega   = $_POST['entrega'] ?? '';

$_SESSION['pagamento'] = $formaPagamento;
$_SESSION['entrega']   = $formaEntrega;

header("Location: pedido_confirmado.php");
exit;
