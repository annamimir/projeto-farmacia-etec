<?php
session_start();

$_SESSION['status_pedido'] = "Pagamento confirmado";

header("Location: acompanhar_pedido.php");
exit;
?>
