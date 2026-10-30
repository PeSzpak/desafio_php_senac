<?php
session_start();
include "includes/cabecalho.php";
?>
<section class="cartao">
    <h2>Bem-vindo!</h2>
    <p>Faça seu cadastro e consulte suas informações durante a navegação.</p>
    <div class="acoes">
        <a class="botao" href="cadastro.php">Cadastrar aluno</a>
        <a class="botao secundario" href="resultado.php">Consultar meu cadastro</a>
        <a class="botao secundario" href="logout.php">Sair</a>
    </div>
</section>
<?php include "includes/rodape.php"; ?>
