<?php
// banco de dados
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>

    <link rel="stylesheet" href="CSS/login.css">
</head>
<body>

<header class="top-header">
    <img src="logo.png" class="logo" alt="Logo">
</header>

<div class="login-wrapper">
    <h2>Criar conta</h2>
    <p class="subtitle">Preencha suas informações para continuar</p>

    <form method="POST" action="">
        
        <div class="form-group">
            <label for="nome">Nome completo</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail ou CPF</label>
            <input type="text" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirmar senha</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
        </div>

        <button type="submit" class="login-btn">Cadastrar</button>

        <p class="signup">
            Já tem uma conta? <a href="login.php">Entrar</a>
        </p>
    </form>
</div>

</body>
</html>
