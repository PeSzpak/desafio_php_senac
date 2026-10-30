<?php
// [16] sessão iniciada antes de exibir HTML.
session_start();
// [17] null quando não há aluno cadastrado.
$aluno = $_SESSION["aluno"] ?? null;
// [18] flash message: lê e apaga só a mensagem, mantendo o aluno.
$mensagem = $_SESSION["mensagem"] ?? "";
unset($_SESSION["mensagem"]);
// [19] cabeçalho compartilhado.
include "includes/cabecalho.php";
?>
<h2>Resultado do cadastro</h2>
<?php if ($mensagem !== ""): ?>
    <p><?= htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8") ?></p>
<?php endif; ?>
<?php if ($aluno !== null): ?>
    <p>Nome: <?= htmlspecialchars($aluno["nome"], ENT_QUOTES, "UTF-8") ?></p>
    <p>E-mail: <?= htmlspecialchars($aluno["email"], ENT_QUOTES, "UTF-8") ?></p>
    <p>Idade: <?= (int) $aluno["idade"] ?></p>
<?php else: ?>
    <p>Nenhum aluno cadastrado nesta sessão.</p>
<?php endif; ?>
<p><a href="cadastro.php">Novo cadastro</a> | <a href="logout.php">Encerrar sessão</a></p>
<?php
// [20] rodapé compartilhado.
include "includes/rodape.php";
?>
