<?php
session_start();
require_once "includes/funcoes.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastro.php");
    exit;
}

// filter_input devolve false para valor inválido e null para campo ausente.
$nome = limparTexto(filter_input(INPUT_POST, "nome") ?? "");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_POST, "idade", FILTER_VALIDATE_INT);

$erro = "";
if ($nome === "") {
    $erro = "O nome é obrigatório.";
} elseif (!validarEmail($email)) {
    $erro = "Informe um e-mail válido.";
} elseif (!is_int($idade) || $idade <= 0) {
    $erro = "A idade deve ser um número inteiro maior que zero.";
}

if ($erro !== "") {
    $_SESSION["erro"] = $erro;
    // Valores brutos, para o usuário corrigir exatamente o que digitou.
    $_SESSION["dados_anteriores"] = [
        "nome" => $nome,
        "email" => $_POST["email"] ?? "",
        "idade" => $_POST["idade"] ?? "",
    ];
    header("Location: cadastro.php");
    exit;
}

$_SESSION["aluno"] = ["nome" => $nome, "email" => $email, "idade" => $idade];
$_SESSION["mensagem"] = "Cadastro realizado com sucesso!";
header("Location: resultado.php");
exit;
