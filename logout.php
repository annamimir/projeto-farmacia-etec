<?php
// Inicia a sessão para poder manipulá-la
session_start();

// Remove todas as variáveis da sessão
session_unset();

// Destroi completamente a sessão
session_destroy();

// Redireciona o usuário para a página inicial (login)
header("Location: index.php");
exit;
?>
