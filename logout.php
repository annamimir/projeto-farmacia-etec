<?php
session_start();

// Se existir sessão, destrói
session_unset();
session_destroy();

// Redireciona para a página de login
header("Location: index.php");
exit;