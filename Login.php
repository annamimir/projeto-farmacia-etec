<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Centralizado</title>
  <link rel="stylesheet" href="CSS/login.css">
</head>
<body>

  <header>
  <div class="login-container">
    <div class="login-header">
      <h1>Login</h1>
    </div>
    </header>
<p>Entre com suas credenciais para acessar sua conta</p>
    <form id="loginForm">
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Seu endereço de e-mail" required>
        <div class="error-message" id="emailError">Por favor, insira um e-mail válido</div>
      </div>
      
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" placeholder="Sua senha" required>
        <div class="error-message" id="passwordError">A senha deve ter pelo menos 6 caracteres</div>
      </div>
      
      <div class="form-options">
        <div class="remember-me">
          <input type="checkbox" id="remember" name="remember">
          <label for="remember">Lembrar-me</label>
        </div>
      </div>
      
      <button type="submit" class="login-button">Entrar</button>
    </form>
    
    <div class="signup-link">
      Não tem uma conta? <a href="registrar.html">Cadastre-se</a>
    </div>
  </div>


<script src="js/login.js"></script>



</body>
</html>
