<?php
session_start();

if (!isset($_POST['pagamento']) || !isset($_POST['entrega'])) {
    header("Location: finalizar_pagamento.php");
    exit;
}

$_SESSION['pagamento'] = $_POST['pagamento'];
$_SESSION['entrega']   = $_POST['entrega'];

// Status inicial
$_SESSION['status_pedido'] = "Aguardando pagamento";

// Endereço loja caso seja retirada
$_SESSION['endereco_loja'] = "Rua das Flores, 129 - Centro, São Paulo - SP";

header("Location: pagamento.php");
exit;
?>
