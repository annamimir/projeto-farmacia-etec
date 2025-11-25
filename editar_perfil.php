<?php
session_start();

// 🔒 Impede acesso sem login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// 🔗 Conexão com o banco
require "conexao.php";

$id = $_SESSION['usuario_id'];

// 🔵 Carrega dados do usuário logado
$sql = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$sql->bind_param("i", $id);
$sql->execute();
$result = $sql->get_result();
$usuario = $result->fetch_assoc();

/*  
As variáveis abaixo servem apenas para preencher o formulário  
com os dados existentes.
*/
$nome       = $usuario['nome'];
$sobrenome  = $usuario['sobrenome'];
$email      = $usuario['email'];
$telefone   = $usuario['telefone'];
$cpf        = $usuario['cpf'];
$nascimento = $usuario['nascimento'];
$genero     = $usuario['genero'];

$cep        = $usuario['cep'];
$endereco   = $usuario['endereco'];
$numero     = $usuario['numero'];
$bairro     = $usuario['bairro'];
$cidade     = $usuario['cidade'];
$estado     = $usuario['estado'];

$mensagem = "";

// 🔵 Quando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Função simples para limpar campos
    function limpar($v) {
        return trim(filter_var($v, FILTER_SANITIZE_STRING));
    }

    // Coleta dados atualizados
    $novoNome        = limpar($_POST['nome']);
    $novoSobrenome   = limpar($_POST['sobrenome']);
    $novoEmail       = limpar($_POST['email']);
    $novoTelefone    = limpar($_POST['telefone']);
    $novoCpf         = limpar($_POST['cpf']);
    $novoNascimento  = limpar($_POST['nascimento']);
    $novoGenero      = limpar($_POST['genero']);

    $novoCep         = limpar($_POST['cep']);
    $novoEndereco    = limpar($_POST['endereco']);
    $novoNumero      = limpar($_POST['numero']);
    $novoBairro      = limpar($_POST['bairro']);
    $novoCidade      = limpar($_POST['cidade']);
    $novoEstado      = limpar($_POST['estado']);

    // 🔵 Atualiza tudo no banco
    $update = $conn->prepare("
        UPDATE usuarios SET
            nome = ?, sobrenome = ?, email = ?, telefone = ?, cpf = ?, nascimento = ?, genero = ?,
            cep = ?, endereco = ?, numero = ?, bairro = ?, cidade = ?, estado = ?
        WHERE id = ?
    ");

    $update->bind_param(
        "sssssssssssssi",
        $novoNome, $novoSobrenome, $novoEmail, $novoTelefone, $novoCpf, $novoNascimento, $novoGenero,
        $novoCep, $novoEndereco, $novoNumero, $novoBairro, $novoCidade, $novoEstado,
        $id
    );

    $update->execute();

    // Atualiza sessão com dados atualizados
    $_SESSION["usuario_nome"] = $novoNome;
    $_SESSION["usuario_email"] = $novoEmail;

    $mensagem = "Informações atualizadas com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Perfil</title>
    <link rel="stylesheet" href="CSS/editar_perfil.css">

    <script>
        /* --------------------------
           MÁSCARAS
        -------------------------- */

        function maskCPF(input) {
            input.value = input.value.replace(/\D/g, "")
                .replace(/(\d{3})(\d)/, "$1.$2")
                .replace(/(\d{3})(\d)/, "$1.$2")
                .replace(/(\d{3})(\d{1,2})$/, "$1-$2");
        }

        function maskTelefone(input) {
            input.value = input.value.replace(/\D/g, "")
                .replace(/^(\d{2})(\d)/, "($1) $2")
                .replace(/(\d{5})(\d{1,4})$/, "$1-$2");
        }

        function maskCEP(input) {
            input.value = input.value.replace(/\D/g, "")
                .replace(/(\d{5})(\d)/, "$1-$2");
        }

        /* --------------------------
           AUTO-PREENCHER ENDEREÇO VIA CEP
        -------------------------- */
        async function buscarCEP(input) {
            const cep = input.value.replace(/\D/g, "");

            if (cep.length !== 8) return;

            const url = `https://viacep.com.br/ws/${cep}/json/`;

            const res = await fetch(url);
            const dados = await res.json();

            if (!dados.erro) {
                document.querySelector("[name='endereco']").value = dados.logradouro;
                document.querySelector("[name='bairro']").value = dados.bairro;
                document.querySelector("[name='cidade']").value = dados.localidade;
                document.querySelector("[name='estado']").value = dados.uf;
            }
        }

        /* --------------------------
           VALIDAÇÃO COMPLETA
        -------------------------- */
        function validarFormulario() {
            let campos = document.querySelectorAll("input[required]");
            for (let c of campos) {
                if (c.value.trim() === "") {
                    alert("Preencha todos os campos obrigatórios.");
                    return false;
                }
            }

            let cpf = document.querySelector("[name='cpf']").value;
            if (cpf.length !== 14) {
                alert("CPF inválido.");
                return false;
            }

            let tel = document.querySelector("[name='telefone']").value;
            if (tel.length < 14) {
                alert("Telefone inválido.");
                return false;
            }

            let cep = document.querySelector("[name='cep']").value;
            if (cep.length !== 9) {
                alert("CEP inválido.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>

<div class="container-perfil">

    <h2>Gerenciar Perfil</h2>

    <?php if (!empty($mensagem)): ?>
    <p class="msg-sucesso"><?= $mensagem ?></p>
    <?php endif; ?>

    <form method="POST" onsubmit="return validarFormulario();" class="form-perfil">

        <div class="linha">
            <div class="campo">
                <label>Nome*</label>
                <input type="text" name="nome" value="<?= $nome ?>" required>
            </div>

            <div class="campo">
                <label>Sobrenome*</label>
                <input type="text" name="sobrenome" value="<?= $sobrenome ?>" required>
            </div>
        </div>

        <div class="linha">
            <div class="campo">
                <label>Email*</label>
                <input type="email" name="email" value="<?= $email ?>" required>
            </div>

            <div class="campo">
                <label>Telefone*</label>
                <input type="text" name="telefone" oninput="maskTelefone(this)" value="<?= $telefone ?>" required>
            </div>
        </div>

        <div class="linha">
            <div class="campo">
                <label>CPF*</label>
                <input type="text" name="cpf" oninput="maskCPF(this)" value="<?= $cpf ?>" required>
            </div>

            <div class="campo">
                <label>Nascimento*</label>
                <input type="date" name="nascimento" value="<?= $nascimento ?>" required>
            </div>
        </div>

        <div class="linha">
            <div class="campo">
                <label>Gênero*</label>
                <select name="genero" required>
                    <option value="Masculino" <?= $genero === "Masculino" ? "selected" : "" ?>>Masculino</option>
                    <option value="Feminino" <?= $genero === "Feminino" ? "selected" : "" ?>>Feminino</option>
                    <option value="Outro" <?= $genero === "Outro" ? "selected" : "" ?>>Outro</option>
                </select>
            </div>
        </div>

        <h3>Endereço</h3>

        <div class="linha">
            <div class="campo">
                <label>CEP*</label>
                <input type="text" name="cep" 
                       oninput="maskCEP(this)" 
                       onblur="buscarCEP(this)"
                       value="<?= $cep ?>" required>
            </div>

            <div class="campo">
                <label>Endereço*</label>
                <input type="text" name="endereco" value="<?= $endereco ?>" required>
            </div>
        </div>

        <div class="linha">
            <div class="campo">
                <label>Número*</label>
                <input type="text" name="numero" value="<?= $numero ?>" required>
            </div>

            <div class="campo">
                <label>Bairro*</label>
                <input type="text" name="bairro" value="<?= $bairro ?>" required>
            </div>
        </div>

        <div class="linha">
            <div class="campo">
                <label>Cidade*</label>
                <input type="text" name="cidade" value="<?= $cidade ?>" required>
            </div>

            <div class="campo">
                <label>Estado*</label>
                <input type="text" name="estado" value="<?= $estado ?>" required>
            </div>
        </div>

        <button class="btn-salvar" type="submit">Salvar</button>
    </form>
</div>

</body>
</html>
