<?php
session_start();
require_once "includes/funcoes.php";

$aluno = $_SESSION["aluno"] ?? null;
// Só a mensagem é removida: o aluno continua na sessão.
$mensagem = $_SESSION["mensagem"] ?? "";
unset($_SESSION["mensagem"]);

include "includes/cabecalho.php";
?>
<section class="cartao">
    <h2>Meu cadastro</h2>
    <?php if ($mensagem !== ""): ?>
        <p class="alerta sucesso"><?= escapar($mensagem) ?></p>
    <?php endif; ?>
    <?php if ($aluno !== null): ?>
        <dl>
            <dt>Nome</dt>
            <dd><?= escapar($aluno["nome"]) ?></dd>
            <dt>E-mail</dt>
            <dd><?= escapar($aluno["email"]) ?></dd>
            <dt>Idade</dt>
            <dd><?= escapar($aluno["idade"]) ?></dd>
        </dl>
    <?php else: ?>
        <p>Nenhum aluno cadastrado nesta sessão.</p>
    <?php endif; ?>
    <div class="acoes">
        <a class="botao" href="cadastro.php">Novo cadastro</a>
        <a class="botao secundario" href="logout.php">Encerrar sessão</a>
    </div>
</section>
<?php include "includes/rodape.php"; ?>
