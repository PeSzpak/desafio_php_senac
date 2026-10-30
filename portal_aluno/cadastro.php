<?php
// [04] sessão iniciada antes de qualquer saída HTML.
session_start();
$nome = "";
$email = "";
$idade = "";
$mensagem = "";

// [05] mensagem de erro exibida uma única vez.
if (isset($_SESSION["erro"])) {
    $mensagem = $_SESSION["erro"];
    unset($_SESSION["erro"]);
}

// [06] repreenche os campos com a tentativa anterior.
if (isset($_SESSION["dados_anteriores"])) {
    $nome = $_SESSION["dados_anteriores"]["nome"];
    $email = $_SESSION["dados_anteriores"]["email"];
    $idade = $_SESSION["dados_anteriores"]["idade"];
    unset($_SESSION["dados_anteriores"]);
}

// [07] cabeçalho compartilhado.
include "includes/cabecalho.php";
?>
<h2>Cadastro de aluno</h2>
<?php if ($mensagem !== ""): ?>
    <p><?= htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8") ?></p>
<?php endif; ?>
<form method="POST" action="processar_cadastro.php">
    <label for="nome">Nome:</label>
    <input id="nome" name="nome" type="text" value="<?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>">
    <br><br>
    <label for="email">E-mail:</label>
    <input id="email" name="email" type="text" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
    <br><br>
    <label for="idade">Idade:</label>
    <input id="idade" name="idade" type="number" value="<?= htmlspecialchars((string) $idade, ENT_QUOTES, 'UTF-8') ?>">
    <br><br>
    <button type="submit">Salvar cadastro</button>
</form>
<p><a href="index.php">Voltar</a></p>
<?php
// [08] rodapé compartilhado.
include "includes/rodape.php";
?>
