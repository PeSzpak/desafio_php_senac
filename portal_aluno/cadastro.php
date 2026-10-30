<?php
session_start();
require_once "includes/funcoes.php";

// Erro e dados da tentativa anterior são lidos uma vez e removidos da sessão.
$erro = $_SESSION["erro"] ?? "";
$dados = $_SESSION["dados_anteriores"] ?? ["nome" => "", "email" => "", "idade" => ""];
unset($_SESSION["erro"], $_SESSION["dados_anteriores"]);

include "includes/cabecalho.php";
?>
<section class="cartao">
    <h2>Cadastro de aluno</h2>
    <?php if ($erro !== ""): ?>
        <p class="alerta erro"><?= escapar($erro) ?></p>
    <?php endif; ?>
    <form method="POST" action="processar_cadastro.php">
        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text" value="<?= escapar($dados["nome"]) ?>">

        <label for="email">E-mail</label>
        <input id="email" name="email" type="text" value="<?= escapar($dados["email"]) ?>">

        <label for="idade">Idade</label>
        <input id="idade" name="idade" type="number" value="<?= escapar($dados["idade"]) ?>">

        <div class="acoes">
            <button class="botao" type="submit">Salvar cadastro</button>
            <a class="botao secundario" href="index.php">Voltar</a>
        </div>
    </form>
</section>
<?php include "includes/rodape.php"; ?>
