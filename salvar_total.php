<?php
session_start();
if (isset($_GET['total'])) {
    $_SESSION['total_compra'] = $_GET['total'];
}

header("Location: finalizar_pagamento.php");
exit;
?>
